<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'email'     => $faker->unique()->safeEmail,
        'password'  =>\Illuminate\Support\Facades\Hash::make('admins'),
        'remember_token' => str_random(10),
    ];
});