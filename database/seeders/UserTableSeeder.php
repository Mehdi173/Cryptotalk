<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new User;
        $u->name = "John";
        $u->email = "John@example.com";
        $u->password = Hash::make('password');
        $u->save();

        $u = new User;
        $u->name = "David";
        $u->email = "David@example.com";
        $u->password = Hash::make('password');
        $u->save();

        User::factory()->count(20)->create();
    }
}
