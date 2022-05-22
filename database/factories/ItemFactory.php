<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(25),
            'description' => $this->faker->text(300),
            'cost' => $this->faker->numberBetween(200, 3000),
            'image' => 'seeders/items/item-' . $this->faker->numberBetween(1, 5) . '.png',
            'category_id' => Category::all()->random()->id,
        ];
    }
}
