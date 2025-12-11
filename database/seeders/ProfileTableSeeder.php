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
        $p->age = 32;
        $p->is_admin = true;
        $p->user_id = 1; // John
        $p->save();

        $p = new Profile;
        $p->age = null;
        $p->is_admin = false;
        $p->user_id = 2; // David
        $p->save();

        Profile::factory()->count(20)->create();
    }
}
