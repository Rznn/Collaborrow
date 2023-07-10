<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Units;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'Fakultas Teknologi Informasi dan Sains Data', 'unit_address' => 'Wilayah Timur UNS', 'slug' => 'FATISDA' ],
            ['id' => 2, 'name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'unit_address' => 'Wilayah Timur UNS', 'slug' => 'FMIPA' ],
            ['id' => 3, 'name' => 'Unit Pelaksana Teknis Teknologi Informasi dan Komunikasi', 'unit_address' => 'Wilayah Timur UNS', 'slug' => 'UPT-TIK'],
            ['id' => 4, 'name' => 'Fakultas Keolahragaan', 'unit_address' => 'Manahan Surakarta', 'slug' => 'FKOR'],
            ['id' => 5, 'name' => 'Fakultas Seni Rupa dan Desain', 'unit_address' => 'Wilayah Barat UNS', 'slug' => 'FSRD' ],
            ['id' => 6, 'name' => 'Fakultas Ilmu Budaya', 'unit_address' => 'Wilayah Barat UNS', 'slug' => 'FIB' ],
            ['id' => 7, 'name' => 'Fakultas Hukum', 'unit_address' => 'Wilayah Barat Laut UNS', 'slug' => 'FH' ],
            ['id' => 8, 'name' => 'Fakultas Ekonomi dan Bisnis', 'unit_address' => 'Wilayah Barat Laut UNS', 'slug' => 'FEB' ],
            ['id' => 9, 'name' => 'Fakultas Kedokteran', 'unit_address' => 'Wilayah Timur Laut UNS', 'slug' => 'FK' ],
            ['id' => 10, 'name' => 'Fakultas Pertanian', 'unit_address' => 'Wilayah Tenggara UNS', 'slug' => 'FP' ],
        ];

        foreach ($data as $value) {
            Units::create($value);
        }
    }
}
