<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'role_id' => 1, 'name' => 'Administrator', 'email' => 'admin@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '085890227652', 'address' => 'Gedung Rektorat Universitas Sebelas Maret', 'slug' => 'administrator'],
            ['id' => 2, 'role_id' => 2, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '085290537895', 'address' => 'Manahan Banjarsari, Surakarta', 'slug' => 'john-doe'],
            ['id' => 3, 'role_id' => 2, 'name' => 'Eric Cahyadi', 'email' => 'eric@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '081296018954', 'address' => 'Jebres Jebres, Surakarta', 'slug' => 'eric-cahyadi'],
            ['id' => 4, 'role_id' => 2, 'name' => 'Valda Umaira', 'email' => 'valda@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '081278595202', 'address' => 'Purwosari Laweyan, Surakarta', 'slug' => 'valda-umaira'],
            ['id' => 5, 'role_id' => 2, 'name' => 'Irzan Imtinan', 'email' => 'imtinan@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '085779437801', 'address' => 'Jebres Jebres, Surakarta', 'slug' => 'irzan-imtinan'],
            ['id' => 6, 'role_id' => 3, 'name' => 'Cahyo Nugroho', 'email' => 'cahyo@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '085825619462', 'address' => 'Jl. Kartika, Jebres, Surakarta', 'slug' => 'cahyo-nugroho'],
            ['id' => 7, 'role_id' => 3, 'name' => 'Keysa Wibowo', 'email' => 'keysa@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '081393567823', 'address' => 'Jl. Ngoresan, Jebres, Surakarta', 'slug' => 'keysa-wibowo'],
            ['id' => 8, 'role_id' => 3, 'name' => 'Rayhan Guston', 'email' => 'rayhan@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '081234567890', 'address' => 'Jl. Kartika, Jebres, Surakarta', 'slug' => 'rayhan-guston'],
            ['id' => 9, 'role_id' => 3, 'name' => 'Permata Putri', 'email' => 'permata@gmail.com', 'password' => '$2y$10$zsbKxicZT/L1U6e5NKXuMeof63oYcqQmjmWJhTCWvqVNkkYcfLFpq', 'no_telp' => '085309523472', 'address' => 'Jl. Surya, Jebres, Surakarta', 'slug' => 'permata-putri'],
        ];

        foreach ($data as $value) {
            User::create($value);
        }
    }
}
