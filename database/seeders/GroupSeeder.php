<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Runs the database seeds 10 times.
     */
    public function run()
    {
        Group::factory(10)->create();
    }
}
