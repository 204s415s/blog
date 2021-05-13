<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /*    
            $faker = Faker::create();
            
            for ($i = 0; $i < 20; $i++) {
                Post::create([
                    'title' => $faker->title,
                    'body' => $faker->body,
                    'user_id' => $faker->user_id
                    ]);
            }
        */
        
        factory(\App\Post::class,20)->create();
    }
}
