<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'from' => '2022',
                'to' => '2023',
                'status' => StatusEnum::INACTIVE->value
            ],
            [
                'from' => '2023',
                'to' => '2024',
                'status' => StatusEnum::ACTIVE->value
            ],
        ];

        foreach ($values as $value) {
            Session::create($value);
        }
    }
}
