<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class,5)->create();
        User::insert([
            [
                'name'         => 'Andhika Kartika Rahayu',
                'email'        => 'ankarayu@gmail.com',
                'password'     => '6',
                'nim'          => 'G64150004',
                'department'   => 'Ilmu Komputer',
                'faculty'      => 'FMIPA',
                'gda'          => '3.75',
                'semester'     => '6',
                'program'      => 'S1',
                'telephon'     => '085888071478'

            ],
            [
                'name'         => 'Wingatun Tartiana Sapta',
                'email'        => 'win.tartiana@gmail.com',
                'password'     => '6',
                'nim'          => 'G64150050',
                'department'   => 'Ilmu Komputer',
                'faculty'      => 'FMIPA',
                'gda'          => '3.5',
                'semester'     => '6',
                'program'      => 'S1',
                'telephon'     => '085888244344'
            ],
            
        ]);
    }
}
