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
            [
                'title' => 'Water Treatment Plant Operator',
                'location' => 'Kombolcha',
                'description' => 'Operates and maintains water treatment plant equipment. Requires a Diploma in Water Treatment Technology. Any gender can apply.'
            ],
            [
                'title' => 'Pipeline Maintenance Technician',
                'location' => 'Dessie',
                'description' => 'Repairs and maintains water pipelines. Requires a Certificate in Plumbing or related field. Male applicants preferred.'
            ],
            [
                'title' => 'Administrative Assistant',
                'location' => 'Bati',
                'description' => 'Provides administrative support to the office. Requires a Diploma in Secretarial Science or related field. Female applicants preferred.'
            ],
            [
                'title' => 'Hydraulic Engineer',
                'location' => 'Hayik',
                'description' => 'Designs and oversees hydraulic systems. Requires a Bachelor\'s Degree in Hydraulic Engineering. Any gender can apply.'
            ],
            [
                'title' => 'Customer Service Representative',
                'location' => 'Kombolcha',
                'description' => 'Handles customer inquiries and complaints. Requires a Diploma in Customer Service or related field. Any gender can apply.'
            ],
            [
                'title' => 'Water Quality Analyst',
                'location' => 'Dessie',
                'description' => 'Analyzes water samples to ensure quality standards. Requires a Bachelor\'s Degree in Chemistry or related field. Any gender can apply.'
            ],
            [
                'title' => 'Electrician (Pump Maintenance)',
                'location' => 'Bati',
                'description' => 'Maintains and repairs electrical systems for water pumps. Requires a Certificate in Electrical Engineering. Male applicants preferred.'
            ],
            [
                'title' => 'Environmental Specialist',
                'location' => 'Hayik',
                'description' => 'Ensures environmental compliance in water operations. Requires a Bachelor\'s Degree in Environmental Science. Any gender can apply.'
            ],
            [
                'title' => 'Meter Reader',
                'location' => 'Kombolcha',
                'description' => 'Reads and records water meter data. Requires a High School Diploma. Any gender can apply.'
            ],
            [
                'title' => 'IT Support Specialist',
                'location' => 'Dessie',
                'description' => 'Provides technical support for IT systems. Requires a Diploma in Information Technology. Any gender can apply.'
            ],
            // New Vacancies
            [
                'title' => 'Logistics Coordinator',
                'location' => 'Hayik',
                'description' => 'Coordinates logistics for water operations. Requires a Bachelor\'s Degree in Logistics or related field. Any gender can apply.'
            ],
            [
                'title' => 'Procurement Officer',
                'location' => 'Kombolcha',
                'description' => 'Manages procurement processes for the organization. Requires a Bachelor\'s Degree in Procurement or related field. Any gender can apply.'
            ],
            [
                'title' => 'Security Guard',
                'location' => 'Dessie',
                'description' => 'Provides security for water facilities. Requires a High School Diploma. Male applicants preferred.'
            ],
            [
                'title' => 'Inventory Manager',
                'location' => 'Bati',
                'description' => 'Manages inventory of water-related supplies. Requires a Diploma in Inventory Management or related field. Any gender can apply.'
            ],
            [
                'title' => 'Field Technician',
                'location' => 'Kombolcha',
                'description' => 'Provides technical support in the field. Requires a Certificate in a technical field. Any gender can apply.'
            ],
            [
                'title' => 'Public Relations Officer',
                'location' => 'Hayik',
                'description' => 'Manages public relations for the organization. Requires a Bachelor\'s Degree in Public Relations or related field. Any gender can apply.'
            ],
            [
                'title' => 'Civil Engineer',
                'location' => 'Dessie',
                'description' => 'Designs and oversees civil engineering projects. Requires a Bachelor\'s Degree in Civil Engineering. Any gender can apply.'
            ],
            [
                'title' => 'Finance Officer',
                'location' => 'Kombolcha',
                'description' => 'Manages financial operations for the organization. Requires a Bachelor\'s Degree in Finance or related field. Any gender can apply.'
            ],
            [
                'title' => 'Surveyor',
                'location' => 'Bati',
                'description' => 'Conducts surveys for water projects. Requires a Diploma in Surveying or related field. Any gender can apply.'
            ],
            [
                'title' => 'Data Entry Clerk',
                'location' => 'Hayik',
                'description' => 'Enters data into the organization\'s systems. Requires a High School Diploma. Any gender can apply.'
            ],
        ];



        foreach ($vacancies as $vacancy) {
            Vacancy::factory()->create([
                'title' => $vacancy['title'],
                'location' => $vacancy['location'],
                'type' => fake()->randomElement(['Part Time', 'Full Time']),
                'description' => $vacancy['description'],
            ]);
        }
    }
}
