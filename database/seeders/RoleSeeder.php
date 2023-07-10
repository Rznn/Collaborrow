<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'Administrator'],
            ['id' => 2, 'name' => 'Admin Unit'],
            ['id' => 3, 'name' => 'Client']
        ];

        foreach ($data as $value) {
            Roles::create($value);
        }
    }

}
