<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create(['name' => 'Sarah Connor']);
        Doctor::create(['name' => 'Ricard Milos']);
        Doctor::create(['name' => 'Miles Dyson']);
    }
}
