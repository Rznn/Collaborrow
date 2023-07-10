<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'Office', 'slug' => 'office'],
            ['id' => 2, 'name' => 'Sport', 'slug' => 'sport'],
            ['id' => 3, 'name' => 'Science', 'slug' => 'science'],
            ['id' => 4, 'name' => 'Electronic', 'slug' => 'electronic'],
            ['id' => 5, 'name' => 'Music', 'slug' => 'music'],
            ['id' => 6, 'name' => 'Furniture', 'slug' => 'furniture'],
            ['id' => 7, 'name' => 'Kitchen', 'slug' => 'kitchen'],
            ['id' => 8, 'name' => 'Transportation', 'slug' => 'transportation'],
        ];

        foreach ($data as $value) {
            Categories::create($value);
        }
    }
}
