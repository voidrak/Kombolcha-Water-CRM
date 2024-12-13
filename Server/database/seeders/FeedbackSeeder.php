<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $feedbackMessages = [
            'The billing system often shows inflated numbers',
            'The addition of online payment options has made life so much easier.',
            'Maintenance requests are handled efficiently most of the time.',
            'The website is hard to navigate for older users.',
            'The water quality has improved significantly over the past year.',
            'There’s no follow-up after submitting a complaint.',
            'Can you introduce an SMS system for maintenance updates?',
            'Your team does a great job of keeping the pipelines running smoothly.',
            'The water quality is inconsistent; sometimes it\'s cloudy.',
            'Regular inspections of water tanks might reduce sudden issues.',
            'I love how you are addressing customer concerns proactively.',
            'The water quality has improved, but it sometimes smells strange in the mornings.',
            'The team works tirelessly to provide consistent service, and it shows.',
            'I appreciate the recent transparency in billing.',
            'The website is user-friendly and makes it simple to report issues.',
            'Thank you for your quick response to my maintenance request last week.',
            'The customer service team is always polite and helpful.',
            'Customer service is responsive, but the call wait times are a bit long.',
            'The recent upgrades to the pipeline system have made a noticeable difference.',
            'Tap water is unavailable since last week.',
            'Water tanks are not cleaned regularly, which leads to contamination.',
            'Your efforts during the drought last year were commendable.',
            'Provide real-time updates on pipeline repairs on the website.',
            'The billing system is efficient, but it would be great to add a reminder service for upcoming bills.',
            'Keep up the great work; your dedication is appreciated by everyone in Kombolcha.',
        ];

        foreach ($feedbackMessages as $message) {
            Feedback::factory()->create([
                'message' => $message,
                'submitted_by' => User::factory()->create()->id, // Create a new user for each feedback
            ]);
        }
    }
}
