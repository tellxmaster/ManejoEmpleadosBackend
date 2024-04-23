<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Lista de nombres de regiones
        $region_names = ['Sierra', 'Costa', 'Galápagos','Oriente'];

        foreach ($region_names as $name) {
            DB::table('Region')->insert([
                'nombre' => $name
            ]);
        }
    }
}
