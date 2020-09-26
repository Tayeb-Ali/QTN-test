<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'image' => 'supplier.png',
        'company_name' => $faker->company,
        'vat_number' => $faker->numberBetween(123, 12113),
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
