<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the specific users
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'), // Hash the password
            'role' => 'admin',
            'woreda' => 'Kombolcha',
            'kebele' => 1,
            'house_number' => 1,
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test_user@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'), // Hash the password
            'role' => 'user',
            'woreda' => 'Kombolcha',
            'kebele' => 1,
            'house_number' => 2,
        ]);

        User::create([
            'name' => 'Coordinator',
            'email' => 'coodinator@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'), // Hash the password
            'role' => 'coordinator',
            'woreda' => 'Kombolcha',
            'kebele' => 1,
            'house_number' => 3,
        ]);

        User::create([
            'name' => 'Customer Service Expert',
            'email' => 'customerserviceexpert@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'), // Hash the password
            'role' => 'customer_service',
            'woreda' => 'Kombolcha',
            'kebele' => 1,
            'house_number' => 4,
        ]);

        User::create([
            'name' => 'Bill Officer',
            'email' => 'billofficer@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'), // Hash the password
            'role' => 'bill_officer',
            'woreda' => 'Kombolcha',
            'kebele' => 1,
            'house_number' => 5,
        ]);

        // Create additional users using the factory
        User::factory()->count(30)->create();
    }
}
