<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;



class EmployeesTableSeeder extends Seeder
{
    private $codeCounter = 1;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('Empleado')->insert([
                'code' => $this->generateSequentialCode(),
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'idNumber' => $faker->unique()->numerify('##########'),
                'province_id' => $faker->numberBetween(1, 9),
                'birthDate' => $faker->date($format = 'Y-m-d', $max = '2002-12-31'),
                'email' => $faker->unique()->safeEmail,
                'personalObservations' => $faker->text($maxNbChars = 200),
                'photo' => $faker->imageUrl($width = 640, $height = 480, 'people'),
                'startDate' => $faker->date($format = 'Y-m-d', $max = 'today'),
                'position' => $faker->jobTitle,
                'department' => $faker->word,
                'employmentProvince' => $faker->state,
                'partTime' => $faker->boolean($chanceOfGettingTrue = 50),
                'employmentObservations' => $faker->text($maxNbChars = 200),
                'status' => $faker->numberBetween(1, 9),
                'salary' => $faker->randomFloat(2, 1000, 5000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Generate a sequential code that increments with each call.
     *
     * @return string Formatted sequential code.
     */
    function generateSequentialCode() {
        $code = str_pad($this->codeCounter, 6, '0', STR_PAD_LEFT);
        $this->codeCounter++;  // Increment the counter for the next code
        return $code;
    }
    
}
