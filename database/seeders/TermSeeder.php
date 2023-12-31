<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'name' => 'first'
            ],
            [
                'name' => 'second'
            ],
            [
                'name' => 'third'
            ],
        ];

        foreach ($values as $value) {
            Term::create($value);
        }
    }
}
