<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        // Create Guest User
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@email.com',
            'password' => Hash::make('54321'),
            'role' => 'guest',
        ]);

        // Create About Data
        About::create([
            'name' => 'Syarifatul Azkiya Alganjari',
            'nim' => '241011701321',
            'description' => 'Mahasiswa yang antusias dalam pengembangan web dan teknologi. Senang menciptakan pengalaman digital yang bermakna dan estetik.',
            'photo' => null,
        ]);

        // Create Sample Seminars
        \App\Models\Seminar::factory(5)->create();
    }
}