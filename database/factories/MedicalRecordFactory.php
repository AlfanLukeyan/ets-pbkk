<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => $this->faker->numberBetween(1, 5),
            'doctor_id' => $this->faker->numberBetween(1, 3),
            'diagnosis' => $this->faker->sentence(10),
            'temperature' => $this->faker->randomFloat(1, 35, 45.5),
            'image' => 'prescriptions/' . $this->faker->image('public/storage/prescriptions', 640, 480, null, false),
        ];
    }
}
