<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maintenanceRequests = [
            ['description' => 'Water pipe leakage causing flooding in the area', 'phone' => '0974845678'],
            ['description' => 'No water supply for the past 3 days', 'phone' => '0921445679'],
            ['description' => 'Low water pressure in residential taps', 'phone' => '0932145680'],
            ['description' => 'Contaminated water coming from the taps', 'phone' => '0912345681'],
            ['description' => 'Broken water meter needs replacement', 'phone' => '0912345682'],
            ['description' => 'Burst pipe causing a severe water outage', 'phone' => '0912345683'],
            ['description' => 'Tap water smells unusual and is discolored', 'phone' => '0912345684'],
            ['description' => 'No water supply during the evenings', 'phone' => '0912345685'],
            ['description' => 'Underground water leak visible on the road', 'phone' => '0912345686'],
            ['description' => 'Water tank cleaning required urgently', 'phone' => '0912345687'],
            ['description' => 'Broken pipe causing loss of water pressure', 'phone' => '0912345688'],
            ['description' => 'Water not reaching the overhead tank', 'phone' => '0912345689'],
            ['description' => 'Irregular water supply timings', 'phone' => '0912345690'],
            ['description' => 'Dripping taps despite being turned off', 'phone' => '0912345691'],
            ['description' => 'Water pressure too low to operate appliances', 'phone' => '0912345692'],
            ['description' => 'Contaminated water causing health concerns', 'phone' => '0912345693'],
            ['description' => 'Damaged pipe creating a puddle on the street', 'phone' => '0912345694'],
            ['description' => 'Tap water unavailable since last week', 'phone' => '0912345695'],
            ['description' => 'Water bill shows excessive usage due to leaks', 'phone' => '0912345696'],
            ['description' => 'Difficulty accessing clean water', 'phone' => '0912345697'],
            ['description' => 'Water meter malfunctioning', 'phone' => '0912345698'],
            ['description' => 'No water supply to the overhead tank', 'phone' => '0912345699'],
            ['description' => 'Damaged pipeline under the sidewalk', 'phone' => '0912345700'],
            ['description' => 'Brownish water coming from taps', 'phone' => '0912345701'],
            ['description' => 'Irregular water billing', 'phone' => '0912345702'],
            ['description' => 'Industrial area experiencing no water supply', 'phone' => '0912345703'],
            ['description' => 'Burst pipe flooding the street', 'phone' => '0912345704'],
            ['description' => 'Low water flow during peak hours', 'phone' => '0912345705'],
            ['description' => 'Water pressure inconsistent throughout the day', 'phone' => '0912345706'],
            ['description' => 'Sudden stoppage of water supply', 'phone' => '0912345707'],
        ];

        foreach ($maintenanceRequests as $maintenance) {
            Maintenance::factory()->create([
                'phone_number' => $maintenance['phone'],
                'description' => $maintenance['description'],
            ]);
        }
    }
}
