<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@vitamin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Create operator user
        User::updateOrCreate(
            ['email' => 'operator@vitamin.com'],
            [
                'name' => 'Operator',
                'password' => Hash::make('password'),
                'role' => 'operator',
            ]
        );

        // Call other seeders
        $this->call([
            SiteSettingSeeder::class,
            VitaminCategorySeeder::class,
            VitaminSeeder::class,
            ArticleSeeder::class,
        ]);

        $this->command->info('✓ Database seeded successfully!');
        $this->command->info('✓ Admin Login: admin@vitamin.com / password');
        $this->command->info('✓ Operator Login: operator@vitamin.com / password');
    }
}
