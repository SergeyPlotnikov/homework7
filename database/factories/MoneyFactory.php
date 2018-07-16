<?php

use Faker\Generator as Faker;

$factory->define(App\Entity\Money::class, function (Faker $faker) {
    return [
        'currency_id' => function (array $data) {
            return $data['currency_id'];
        },
        'amount' => $faker->numberBetween(50, 1000),
        'wallet_id' => function (array $data) {
            return $data['wallet_id'];
        }
    ];
});
