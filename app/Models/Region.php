<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'Region'; 

    protected $fillable = ['nombre'];

    public $timestamps = false; 
    
    // Relación Uno a Muchos con Province
    public function provinces()
    {
        return $this->hasMany(Province::class, 'id_region', 'id');
    }
}
