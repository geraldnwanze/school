<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'english'],
            ['name' => 'mathematics'],
            ['name' => 'igbo'],
            ['name' => 'chemistry'],
            ['name' => 'physics'],
            ['name' => 'biology'],
            ['name' => 'literature'],
            ['name' => 'agriculture'],
            ['name' => 'geography'],
            ['name' => 'social studies'],
            ['name' => 'basic science'],
            ['name' => 'basic tech'],
            ['name' => 'fine art'],
            ['name' => 'computer'],
            ['name' => 'further mathematics'],
            ['name' => 'economics'],
            ['name' => 'crs'],
        ];

        for ($i=0; $i < count($data); $i++) {
            Subject::create($data[$i]);
        }
    }
}
