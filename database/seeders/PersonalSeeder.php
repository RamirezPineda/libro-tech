<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        Personal::create(['id' => 1, 'profesion' => 'Contador']);

        Personal::create(['id' => 3, 'profesion' => 'Contador']);
    }
}
