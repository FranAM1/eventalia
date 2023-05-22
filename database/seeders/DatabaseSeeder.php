<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'password' => bcrypt('admin'),
            'role_id' => 1,
       ]);

       User::create([
            'name' => 'test',
            'email' => 'test@test',
            'password' => bcrypt('test'),
       ]);
    }
}
