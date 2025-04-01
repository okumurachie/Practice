<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->word();

        return [
            'user_id' => 1,
            'name' => $name,
            'price' => $this->faker->numberBetween(100, 10000),
            'image' => 'https://placehold.jp/640x480.png?text=' . $name,
            'comment' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            },
        ];
    }
}
