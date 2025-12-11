<?php

namespace Database\Seeders;

use App\Models\Cryptocurrency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptocurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Cryptocurrency;
        $c->symbol = "TUN";
        $c->name = "Tuna";
        $c->price = 23.17;
        $c->save();

        Cryptocurrency::factory()->count(3)->create();
    }
}
