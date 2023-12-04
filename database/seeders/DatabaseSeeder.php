<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        Role::insert([
            [
                "nama_role" => "admin"
            ],
            [
                "nama_role" => "pegawai"
            ]
        ]);

        User::create([
            "id_role" => 1,
            "nama" => 'admin',
            "nama_usaha" => 'kue kering',
            "email" => 'admin@gmail.com',
            "password" =>'admin123',
        ]);

        User::create([
            "id_role" => 2,
            "nama" => 'pegawai',
            "nama_usaha" => 'kue kering',
            "email" => 'pegawai@gmail.com',
            "password" =>'pegawai123',
        ]);
    }
}
