<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ScholarshipSeeder::class);
        $this->call(RequirementSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
