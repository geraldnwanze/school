<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from' => '2023',
            'to' => '2024',
            'status' => StatusEnum::ACTIVE->value
        ];
    }
}
