<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user — skip if already exists
        if (!User::where('email', 'admin@sunconengineers.com')->exists()) {
            User::create([
                'name'     => 'Suncon Admin',
                'email'    => 'admin@sunconengineers.com',
                'password' => Hash::make('Suncon@Admin2025!'),
            ]);
        }

        // Settings defaults (uses firstOrCreate — safe to re-run)
        $this->call(SettingsSeeder::class);

        // Main content — only seed if tables are empty
        if (\App\Models\Project::count() === 0) {
            $this->call(SunconSeeder::class);
        }

        // Real company data: overwrites settings with production values,
        // updates service descriptions, adds team member, resets stats
        $this->call(RealContentSeeder::class);
    }
}
