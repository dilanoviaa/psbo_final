<?php

use Illuminate\Database\Seeder;
use App\requirement;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Requirement::insert([
            [
                'scholarship_id'    => '1',
                'gda'               => '3.00',
                'semester'          => '1-6',
                'deadline'          => '2018-12-20',
                'faculty'           => 'Semua Fakultas',
                'program'           => 'S1',
            ],
            [
                'scholarship_id'    => '2',
                'gda'               => '3.00',
                'semester'          => '1-6',
                'deadline'          => '2018-12-10',
                'faculty'           => 'Semua Fakultas',
                'program'           => 'S1',
            ],
            
        ]);
    }
}
