<?php

use Faker\Generator as Faker;

$factory->define(\App\Entity\Currency::class, function (Faker $faker, array $attributes) {
    return [
        'name' => $attributes['name']
    ];
});
