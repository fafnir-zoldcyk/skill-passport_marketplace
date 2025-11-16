<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'dian',
            'toko' => 'Bshop',
            'username' => 'dain1',
            'password' => bcrypt('123456'),
            'role' => 'Admin'
        ]);

        
    }
}
