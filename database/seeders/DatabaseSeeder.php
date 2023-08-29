<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        // seeding admin Data
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' =>'Abdelrahman Ramadan',
            'email' =>'abdelrahman@admin.com',
            'password' => Hash::make('123456789'),
        ]);    
    }
}
