<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
        // Membuat 10 User secara manual dengan username user1-user10
        // for ($i = 1; $i <= 10; $i++) {
        //     User::create([
        //         'name' => 'User ' . $i,
        //         'username' => 'user' . $i,
        //         'email' => 'user' . $i . '@example.com',
        //         'password' => bcrypt('password'),
        //     ]);
        //}

        // Membuat Category secara otomatis
        Category::factory(2)->create();

        // Membuat Post secara otomatis (akan otomatis assign ke user dan category yang ada)
        Post::factory(10)->recycle(User::all())->recycle(Category::all())->create();

        User::factory(5)->create();
        
        // Seed features for About page if table exists
        if (class_exists(\App\Models\Feature::class)) {
            \App\Models\Feature::updateOrCreate(['key' => 'ai'], ['title' => 'AI & ML', 'description' => 'Discover smart systems and models that power modern apps.']);
            \App\Models\Feature::updateOrCreate(['key' => 'cloud'], ['title' => 'Cloud & DevOps', 'description' => 'Scalable cloud architectures and continuous delivery best practices.']);
            \App\Models\Feature::updateOrCreate(['key' => 'shield'], ['title' => 'Security', 'description' => 'Secure design patterns and threat-resistant solutions.']);
        }

        // Seed categories with images
        if (class_exists(\App\Models\Category::class)) {
            \App\Models\Category::updateOrCreate(['slug' => 'ai-ml'], ['name' => 'AI & ML', 'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=1200&h=800&fit=crop', 'description' => 'Topik tentang kecerdasan buatan dan pembelajaran mesin.']);
            \App\Models\Category::updateOrCreate(['slug' => 'cloud-devops'], ['name' => 'Cloud & DevOps', 'image' => 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?w=1200&h=800&fit=crop', 'description' => 'Topik mengenai cloud computing dan praktik DevOps.']);
            \App\Models\Category::updateOrCreate(['slug' => 'security'], ['name' => 'Security', 'image' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?w=1200&h=800&fit=crop', 'description' => 'Keamanan siber, best practices, dan proteksi sistem.']);
            \App\Models\Category::updateOrCreate(['slug' => 'web-development'], ['name' => 'Web Development', 'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&h=800&fit=crop', 'description' => 'Pembuatan website, framework, dan best practices web development.']);
            \App\Models\Category::updateOrCreate(['slug' => 'mobile'], ['name' => 'Mobile', 'image' => 'https://images.unsplash.com/photo-1518779578993-ec3579fee39f?w=1200&h=800&fit=crop', 'description' => 'Pengembangan aplikasi mobile untuk Android & iOS.']);
        }

    }
}
