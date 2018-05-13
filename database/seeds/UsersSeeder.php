<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_en = Faker::create();
        $faker_ar = Faker::create('ar_SA');

        for ($i=0; $i < 10 ; $i++) { 
            \DB::table('users')->insert([
                'name'=> $faker_en->name,
                'email'=>$faker_en->email,
                'password'=>bcrypt('1111111111'),
            ]);
        }
        for ($i=0; $i <10 ; $i++) { 
           User::create([
            'name'=> $faker_ar->name,
            'email'=>$faker_ar->email,
            'password'=>bcrypt('1111111111'),
           ]);
        } 
    }
    // 'user_id'=> \App\User::all()->random()->id,
    //
}
