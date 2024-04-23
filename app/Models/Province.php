<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'Provincia'; 

    protected $fillable = [
        'nombre_provincia', 'capital_provincia', 'descripcion_provincia', 
        'poblacion_provincia', 'superficie_provincia', 'latitud_provincia', 
        'longitud_provincia', 'id_region'
    ];
    
    public $timestamps = false;  

    // Relación Muchos a Uno con Region
    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region', 'id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'province_id');
    }

}
