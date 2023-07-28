<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'jss 1'],
            ['name' => 'jss 2'],
            ['name' => 'jss 3'],
            ['name' => 'sss 1'],
            ['name' => 'sss 2'],
            ['name' => 'sss 3'],
        ];
        for ($i=0; $i < count($data); $i++) {
            Classroom::create($data[$i]);
        }
    }
}
