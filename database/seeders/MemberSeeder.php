<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Group;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Member::factory()
        ->times(3)
        ->create();

        foreach(Group::all() as $group)
        {
            $members = Member::inRandomOrder()->take(rand(1,3))->pluck('id');
            $group->members()->attach($members);
        }
    }
}
