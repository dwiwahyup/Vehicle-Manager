<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'roles' => 'admin',
            'slug' => 'admin',
        ]);

        User::create([
            'name' => 'leader',
            'email' => 'leader@gmail.com',
            'password' => Hash::make('leader123'),
            'roles' => 'leader',
            'slug' => 'leader',
        ]);

        User::create([
            'name' => 'driver',
            'email' => 'driver@gmail.com',
            'password' => Hash::make('driver123'),
            'roles' => 'driver',
            'slug' => 'driver',
        ]);
    }
}
