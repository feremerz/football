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
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class,5)->create();

        factory(\App\Team::class,20)->create()->each(function ($team){
           factory(\App\Player::class,22)->make()->each(function ($player) use ($team){
               $team->players()->save($player);
           });
        });
    }
}
