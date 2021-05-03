<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts'->insert([
            [ 'title' => 'test1',
              'body' => 'body1' ]
            ,
            [ 'title' => 'title2',
              'body' => 'body2' ],
            ]));
    }
}
