<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        factory(App\ChatRoom::class, 1)->create();
        factory(App\UserDetail::class, 9)->create();
        factory(App\ChatRoomMessage::class, 10)->create();
        factory(App\ChatRoomDetail::class, 4)->create();
    }
}
