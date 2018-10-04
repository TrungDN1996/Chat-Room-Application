<?php

use Faker\Generator as Faker;

$factory->define(App\ChatRoomDetail::class, function (Faker $faker) {
	// $user_id = App\User::select('id')->get()->toArray();
    return [
        'chat_room_id' => 1,
        'user_id' => $faker->numberBetween(2,10),
    ];
});
