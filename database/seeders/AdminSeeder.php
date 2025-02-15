<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'role'     => 'superadmin',
            'name'     => 'Admin User',
            'email'    => 'admin@news.com',
            'password' => bcrypt('password'),
        ]);

         Admin::create([
            'role'     => 'content manager',
            'name'     => 'Content User',
            'email'    => 'content@news.com',
            'password' => bcrypt('password'),
        ]);
    }
}
