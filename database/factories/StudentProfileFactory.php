<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentProfile>
 */
class StudentProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => 1,
            'classroom_id' => 1,
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'other_names' => fake()->name(),
            'gender' => GenderEnum::MALE->value,
            'dob' => fake()->date(),
            'residential_address' => fake()->streetAddress(),
            'permanent_address' => fake()->address(),
            'fathers_name' => fake()->name(),
            'fathers_phone' => fake()->phoneNumber()
        ];
    }
}
