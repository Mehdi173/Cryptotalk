<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cryptocurrency>
 */
class CryptocurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cryptos = [
            ['BTC', 'Bitcoin'],
            ['ETH', 'Ethereum'],
            ['XRP', 'Ripple'],
            ['ADA', 'Cardano'],
            ['SOL', 'Solana']
        ];

        [$symbol, $name] = fake()->randomElement($cryptos);
        return [
            'symbol' => $symbol,
            'name' => $name,
            'price' => fake()->randomFloat(2, 0.1, 200)
        ];
    }
}
