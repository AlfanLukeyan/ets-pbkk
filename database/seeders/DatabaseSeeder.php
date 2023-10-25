<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\MedicalRecord;
use Illuminate\Database\Seeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\PatientSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        MedicalRecord::factory(10)->create();

        $this->call([
            DoctorSeeder::class,
            PatientSeeder::class,
        ]);
    }
}
