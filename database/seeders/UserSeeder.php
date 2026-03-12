<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pml.local'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'ref1@pml.local'],
            [
                'name' => 'Referee 1',
                'password' => Hash::make('password'),
                'role' => 'ref1',
            ]
        );

        User::updateOrCreate(
            ['email' => 'ref2@pml.local'],
            [
                'name' => 'Referee 2',
                'password' => Hash::make('password'),
                'role' => 'ref2',
            ]
        );
    }
}