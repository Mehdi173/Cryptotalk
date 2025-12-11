<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Profile;
        $p->email = "test1@gmail.com";
        $p->password = "testPassword";
        $p->type = "admin";
        $p->member_id = 1; // username1
        $p->save();

        $q = new Profile;
        $q->email = "test2@gmail.com";
        $q->password = "testPassword";
        $q->type = "normal";
        $q->member_id = 2; // username2
        $q->save();

        Profile::factory()->count(20)->create();
    }
}
