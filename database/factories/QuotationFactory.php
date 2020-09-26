<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quotation;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {

    return [
        'reference_no' => $faker->bankAccountNumber,
        'item' => $faker->numberBetween(1, 5),
        'total_qty' => $faker->randomDigitNotNull,
        'total_discount' => $faker->randomDigitNotNull,
        'total_tax' => $faker->randomDigitNotNull,
        'total_price' => $faker->randomDigitNotNull,
        'order_tax' => $faker->randomDigitNotNull,
        'order_tax_rate' => $faker->randomDigitNotNull,
        'grand_total' => $faker->randomDigitNotNull,
        'quotation_status' => $faker->numberBetween(1,3),
        'document' => $faker->word,
        'note' => $faker->text,
        'user_id' => random_int(1,2),
        'supplier_id' => random_int(1,2),
        'customer_id' => random_int(1,2),
        'department_id' => random_int(1,2),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
