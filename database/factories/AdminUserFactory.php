<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminUser;
use Faker\Generator as Faker;

$factory->define(AdminUser::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
