<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\Announcement;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $this->call(AdminUserSeeder::class);

        // Create test user
        User::create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => Hash::make('test123'),
            'role'     => 'user',
        ]);

        // Add 5 dummy services
        Service::insert([
            ['title' => 'Welding NC II', 'description' => 'Learn advanced welding techniques'],
            ['title' => 'Cookery NC II', 'description' => 'Professional cookery training'],
            ['title' => 'Bread and Pastry Production NC II', 'description' => 'Bakery and pastry skills'],
            ['title' => 'Electrical Installation & Maintenance NC II', 'description' => 'Electrical installation and maintenance'],
            ['title' => 'Computer Systems Servicing NC II', 'description' => 'Computer troubleshooting and servicing'],
        ]);

        // Add 3 dummy announcements
        Announcement::insert([
            ['title' => 'New Scholarship Program Open', 'content' => 'Apply now for the new TESDA scholarship!', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Upcoming Competency Assessment', 'content' => 'Competency assessment schedule released.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Holiday Advisory', 'content' => 'No classes and assessments on national holiday.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Add dummy schedules
  Schedule::insert([
    [
        'title' => 'Welding NC II - Batch 1',
        'date'  => now()->addDays(7),
        'time'  => '08:00 AM', // add dummy time
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'title' => 'Cookery NC II - Morning Class',
        'date'  => now()->addDays(10),
        'time'  => '09:00 AM',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'title' => 'Bread & Pastry Production - Weekend',
        'date'  => now()->addDays(14),
        'time'  => '01:00 PM',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

}
}