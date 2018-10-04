<?php

use Faker\Generator as Faker;

$factory->define(App\ChatRoomMessage::class, function (Faker $faker) {
    return [
        'chat_room_id' => 1,
        'message' => $faker->text(200),
        'user_id' => $faker->numberBetween(1, 10),
    ];
});
