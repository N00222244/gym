<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gym;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        Gym::factory()
        ->times(3)
        ->hasGroups(4)
        ->create();
    }
}
