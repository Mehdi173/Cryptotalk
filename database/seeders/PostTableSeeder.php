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
        $p->text = "This is a test post!";
        $p->member_id = 1; // username1
        $p->save();

        $q = new Post;
        $q->text = "This is the second test post!";
        $q->member_id = 2; // username2
        $q->save();

        Post::factory()->count(20)->create();
    }
}
