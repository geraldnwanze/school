<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\SchoolFee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = Classroom::all();

        for ($i=0; $i < $classes->count(); $i++) {
            SchoolFee::create([
                'classroom_id' => $classes[$i]->id,
                'school_fee_attribute_id' => 1,
                'amount' => 31000,
                'session_id' => 2,
                'term_id' => 1
            ]);
        }

    }
}
