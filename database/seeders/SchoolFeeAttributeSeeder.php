<?php

namespace Database\Seeders;

use App\Models\SchoolFeeAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolFeeAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'name' => 'tuition'
            ],
            [
                'name' => 'books'
            ],
            [
                'name' => 'lesson'
            ],
            [
                'name' => 'xmas'
            ],
            [
                'name' => 'bus fare'
            ],
        ];
        for ($i=0; $i < count($values); $i++) {
            SchoolFeeAttribute::create($values[$i]);
        }
    }
}
