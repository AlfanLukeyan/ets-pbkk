<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create(['name' => 'John Doe']);
        Patient::create(['name' => 'Peter Parker']);
        Patient::create(['name' => 'Billy Smith']);
        Patient::create(['name' => 'Jane Hopper']);
        Patient::create(['name' => 'Robert Snow']);

    }
}
