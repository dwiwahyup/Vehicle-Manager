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
            'name' => 'Fadhil Alkautsar',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'admin',
            'slug' => 'admin',
        ]);

        User::create([
            'name' => 'Firman Dandi',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'manager',
            'slug' => 'manager',
        ]);

        User::create([
            'name' => 'Rizky Fauzi',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'staff',
            'slug' => 'staff',
        ]);
    }
}
