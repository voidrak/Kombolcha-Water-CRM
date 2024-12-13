<?php

namespace Database\Seeders;

use App\Models\Vacancy;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $vacancies = [
            ['title' => 'Water Treatment Plant Operator', 'location' => 'Kombolcha'],
            ['title' => 'Pipeline Maintenance Technician', 'location' => 'Dessie'],
            ['title' => 'Administrative Assistant', 'location' => 'Bati'],
            ['title' => 'Hydraulic Engineer', 'location' => 'Hayik'],
            ['title' => 'Customer Service Representative', 'location' => 'Kombolcha'],
            ['title' => 'Water Quality Analyst', 'location' => 'Dessie'],
            ['title' => 'Electrician (Pump Maintenance)', 'location' => 'Bati'],
            ['title' => 'Environmental Specialist', 'location' => 'Hayik'],
            ['title' => 'Meter Reader', 'location' => 'Kombolcha'],
            ['title' => 'IT Support Specialist', 'location' => 'Dessie'],
            // New Vacancies
            ['title' => 'Logistics Coordinator', 'location' => 'Hayik'],
            ['title' => 'Procurement Officer', 'location' => 'Kombolcha'],
            ['title' => 'Security Guard', 'location' => 'Dessie'],
            ['title' => 'Inventory Manager', 'location' => 'Bati'],
            ['title' => 'Field Technician', 'location' => 'Kombolcha'],
            ['title' => 'Public Relations Officer', 'location' => 'Hayik'],
            ['title' => 'Civil Engineer', 'location' => 'Dessie'],
            ['title' => 'Finance Officer', 'location' => 'Kombolcha'],
            ['title' => 'Surveyor', 'location' => 'Bati'],
            ['title' => 'Data Entry Clerk', 'location' => 'Hayik'],
        ];



        foreach ($vacancies as $vacancy) {
            Vacancy::factory()->create([
                'title' => $vacancy['title'],
                'location' => $vacancy['location'],
                'type' => fake()->randomElement(['Part Time', 'Full Time']),
            ]);
        }
    }
}
