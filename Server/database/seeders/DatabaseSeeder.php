<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // Disable foreign key checks

        $this->call([
            UserSeeder::class,
            VacancySeeder::class,
            MaintenanceSeeder::class,
            FeedbackSeeder::class,
            // Add any other seeders here
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1'); // Enable foreign key checks
    }
}
