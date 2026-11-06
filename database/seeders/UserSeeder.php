<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun Utama Ilham Pangestu
        User::updateOrCreate(
            ['email' => 'ilhampangestu612@gmail.com'],
            [
                'name'     => 'Ilham Pangestu',
                'password' => Hash::make('Admin123'),
            ]
        );

        // Akun Demo Bawaan
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );
    }
}
