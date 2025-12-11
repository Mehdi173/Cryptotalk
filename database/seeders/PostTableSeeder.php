<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Post;
        $p->title = "This is a test post!";
        $p->content = "This is the content of the first test post.";
        $p->user_id = 1; // John
        $p->save();

        $p = new Post;
        $p->title = "This is the second test post!";
        $p->content = "This is the content of the second test post.";
        $p->user_id = 2; // David
        $p->save();

        Post::factory()->count(20)->create();
    }
}
