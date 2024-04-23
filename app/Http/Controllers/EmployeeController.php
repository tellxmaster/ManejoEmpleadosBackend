<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{

    public function list()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function show( $id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }

    public function store(Request $request)
    {

        try {
            $lastCode = Employee::max('code');
            $nextCode = str_pad($lastCode + 1, 6, '0', STR_PAD_LEFT);
    
            $employeeData = [
                'code' => $nextCode,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'idNumber' => $request->idNumber,
                'province_id' => $request->province_id,
                'birthDate' => $request->birthDate,
                'email' => $request->email,
                'personalObservations' => $request->personalObservations,
                'startDate' => $request->startDate,
                'position' => $request->position,
                'department' => $request->department,
                'employmentProvince' => $request->employmentProvince,
                'partTime' => $request->partTime,
                'employmentObservations' => $request->employmentObservations,
            ];
    
            // Comprobar si un archivo fue subido y está asociado al campo 'photo'
            if ($request->hasFile('photo')) {
                if ($request->file('photo')->isValid()) {
                    // Almacenar el archivo en una ubicación pública y obtener la ruta
                    $filePath = $request->photo->store('public/employees_photos');
                    // Añadir la ruta del archivo al array de datos del empleado
                    $employeeData['photo'] = $filePath;
                }
            }
    
            $employee = new Employee($employeeData);
            $employee->save();
    
            return response()->json($employee, 201);
        } catch (\Throwable $th) {
            // Obtener el mensaje de error
            $errorMessage = $th->getMessage();
            return response()->json(['error' => $errorMessage], 500);
        }
        
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $validData = $request->all();  

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $filePath = $request->photo->store('public/employees_photos');
            // Añadir la ruta del archivo al array de datos del empleado
            $validData['photo'] = $filePath;
        }

        foreach ($validData as $key => $value) {
            if ($employee->$key === $value) {
                unset($validData[$key]);
            }
        }
        
        // Verificar si quedan datos para actualizar
        if (!empty($validData)) {
            $employee->update($validData);
        }

        return response()->json($employee);
    }



    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json('Empleado eliminado correctamente');
    }


}