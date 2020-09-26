<?php

/** @var Factory $factory */

use App\Models\Categorie;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Categorie::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'logo' => 'logo.png',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
