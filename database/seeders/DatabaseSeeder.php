<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Role::create([
            'role' => 'admin',
            'has_approved' => 1
        ]);
        \App\Models\User::create([
            'role_id' => 1,
            'name' => 'alfandy',
            'email' => 'alfandy@testing.com',
            'password' => Hash::make(12345678),
           
        ]);
    }
}
