<?php

use Faker\Generator as Faker;

$factory->define(App\ChatRoom::class, function (Faker $faker) {
    return [
        'name' => 'Fun Club',
        'user_id' => 1,
    ];
});
