<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Booking;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create 50 activities
        Activity::factory()->count(50)->create();

        // Create 100 bookings
        Booking::factory()->count(100)->create();

        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
