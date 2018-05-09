<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        //     'image' => str_random(10).'.jpg',
        //     'remember_token' => str_random(10),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);

        // factory(App\User::class, 5)
        //     ->create()
        //     ->each(function ($u) {
        //     $u->posts()->save(factory(App\Post::class)->make());
        // });
    }
}
