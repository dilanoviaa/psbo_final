<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Admin::class,5)->create();
        Admin::insert([
            'name'      => 'Jovano Akbarudin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admins'),
            'jobPosition'=> 'Kemahasiswaan',
            'address'   => 'Cibinong, Bogor',
            'avatar'    => 'avatar/admins/0J5bt0fMpbQ9hXVYCcz9X1HS8VnPfBsRaAuuYybj.jpeg',
            'remember_token' => str_random(10),
        ]);
    }
}
