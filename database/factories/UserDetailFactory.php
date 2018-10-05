<?php

use Faker\Generator as Faker;

$factory->define(App\UserDetail::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'related_user_id' => $faker->numberBetween(2, 10),
    ];
});
