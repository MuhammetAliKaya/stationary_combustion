<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Facilty;
use App\Models\Fuel;
use App\Models\Unit;
use App\Models\Year;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Facilty::factory(10)->create();
        Fuel::factory(10)->create();
        Unit::factory(10)->create();
        Year::insert([
            [
                'year' => 2022
            ],
            [
                'year' => 2021
            ],
            [
                'year' => 2020
            ],
            [
                'year' => 2019
            ],
        ]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}