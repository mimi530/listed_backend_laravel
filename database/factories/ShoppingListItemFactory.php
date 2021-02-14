<?php

namespace Database\Factories;

use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingListItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShoppingListItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => User::factory(),
            'shopping_list_id' => ShoppingList::factory(),
            'description' => $this->faker->sentence(),
            'bought' => $this->faker->randomElement([true, false])
        ];
    }
}
