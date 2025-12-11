<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comment;
        $c->text = "This is a test comment!";
        $c->post_id = 1; // "This is a test post!"
        $c->save();

        $d = new Comment;
        $d->text = "This is the second test comment!";
        $d->post_id = 2; // "This is the second test post!"
        $d->save();

        Comment::factory()->count(20)->create();
    }
}
