<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Reply;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ProvincesCitiesSeeder::class,
            CategorySeeder::class,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 1,
       ]);

        User::create([
            'name' => 'test',
            'email' => 'test@test',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        Event::factory(12)->create([
            'image' => 'default.jpg'
        ]);

        Comment::factory(20)->create();

        Reply::factory(20)->create();
        

        
        
    }
}
