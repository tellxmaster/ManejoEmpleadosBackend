<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'Empleado';  

    protected $fillable = [
        'firstName', 'lastName', 'idNumber', 'province_id', 'birthDate',
        'email', 'personalObservations', 'photo', 'startDate', 
        'position', 'department', 'employmentProvince', 'partTime', 
        'employmentObservations', 'code', 'status', 'salary'
    ];

    protected $casts = [
        'birthDate' => 'date',
        'startDate' => 'date',
        'partTime' => 'boolean'
    ];

    public function getBirthDateAttribute($value)
    {
        return $this->asDate($value)->toDateString();  
    }

    public function getStartDateAttribute($value)
    {
        return $this->asDate($value)->toDateString();  
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

}
