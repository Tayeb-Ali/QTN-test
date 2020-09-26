<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'logo' => 'product.png',
        'status' => $faker->randomDigitNotNull,
        'price' => $faker->randomDigitNotNull,
        'cost' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull,
        'category_id' => random_int(1,3),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
