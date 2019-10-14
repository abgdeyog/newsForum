<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => 1,
            'header'=> 'CPP Binary Search Algorithm',
            'description' => 'Some interesting description'
        ]);
        Post::create([
            'user_id' => 1,
            'header'=> 'Test header',
            'description' => 'Test description'
        ]);
    }
}
