<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Factory as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_ar = Faker::create('ar_SA');
        for ($i=0; $i <10 ; $i++) { 
            Post::create([
             'user_id'=>User::all()->random()->id ,
             'title'=>$faker_ar->name,
             'content'=>$faker_ar->sentence($nbWords = 6, $variableNbWords = true),
            ]);
         } 
    }
}
