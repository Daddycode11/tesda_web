<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\Announcement;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ----------------------------
        // 1️⃣ Admin user
        // ----------------------------
        $this->call(AdminUserSeeder::class);

        // ----------------------------
        // 2️⃣ Test user safely
        // ----------------------------
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('test123'),
                'role' => 'user',
            ]
        );

        // ----------------------------
        // 3️⃣ Services safely
        // ----------------------------
        $services = [
            ['title' => 'Welding NC II', 'description' => 'Learn advanced welding techniques'],
            ['title' => 'Cookery NC II', 'description' => 'Professional cookery training'],
            ['title' => 'Bread and Pastry Production NC II', 'description' => 'Bakery and pastry skills'],
            ['title' => 'Electrical Installation & Maintenance NC II', 'description' => 'Electrical installation and maintenance'],
            ['title' => 'Computer Systems Servicing NC II', 'description' => 'Computer troubleshooting and servicing'],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                ['description' => $service['description']]
            );
        }

        // ----------------------------
        // 4️⃣ Announcements safely
        // ----------------------------
        $announcements = [
            ['title' => 'New Scholarship Program Open', 'content' => 'Apply now for the new TESDA scholarship!'],
            ['title' => 'Upcoming Competency Assessment', 'content' => 'Competency assessment schedule released.'],
            ['title' => 'Holiday Advisory', 'content' => 'No classes and assessments on national holiday.'],
        ];

        foreach ($announcements as $announcement) {
            Announcement::updateOrCreate(
                ['title' => $announcement['title']],
                [
                    'content' => $announcement['content'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // ----------------------------
        // 5️⃣ Schedules safely
        // ----------------------------
        $schedules = [
            [
                'title' => 'Welding NC II - Batch 1',
                'date' => now()->addDays(7),
                'time' => Carbon::parse('08:00 AM')->format('H:i:s'), // 24-hour format
            ],
            [
                'title' => 'Cookery NC II - Morning Class',
                'date' => now()->addDays(10),
                'time' => Carbon::parse('09:00 AM')->format('H:i:s'),
            ],
            [
                'title' => 'Bread & Pastry Production - Weekend',
                'date' => now()->addDays(14),
                'time' => Carbon::parse('01:00 PM')->format('H:i:s'),
            ],
        ];

        foreach ($schedules as $schedule) {
            Schedule::updateOrCreate(
                ['title' => $schedule['title']],
                [
                    'date' => $schedule['date'],
                    'time' => $schedule['time'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
