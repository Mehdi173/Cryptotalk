<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $m = new Member;
        $m->username = "username1";
        $m->save();

        $n = new Member;
        $n->username = "username2";
        $n->save();

        Member::factory()->count(20)->create();
    }
}
