<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@apigharjagga.com.np',
        ]);

        $this->call([
            SiteSettingSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            CareerSeeder::class,
            PostSeeder::class,
            GalleryItemSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
