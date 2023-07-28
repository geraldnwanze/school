<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SessionSeeder::class,
            // TermSeeder::class,
            ClassroomSeeder::class,
            StudentSeeder::class,
            StudentProfileSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
