<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);



        // This calls hasgroups()  and seeds the groups table too rather then user the line of code below
        $this->call(GymSeeder::class);

        //creates members and gets groups
        $this->call(MemberSeeder::class);
       // Group::factory()->count(50)->create();
        //$this->call(RoleSeeder::class);
        //$this->call(UserSeeder::class);
    }
}
