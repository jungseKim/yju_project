<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::all()->random()->id,
            // 'item' => $this->faker->word(),
            'price' => $this->faker->randomNumber(),
            'category' => $this->faker->word(),
            'sold' => $this->faker->boolean(),
            'img' => 'noimage.jpg',
            'content' => $this->faker->word(),
            'item' => $this->faker->word(),
            'newProduct' => $this->faker->word(),
            'exchange' => $this->faker->word(),
        ];
    }
}
