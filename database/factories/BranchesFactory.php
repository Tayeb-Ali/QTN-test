<?php

/** @var Factory $factory */

use App\Models\Branches;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Branches::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'manager_id' => $faker->numberBetween(1, 2),
        'address' => $faker->address,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
