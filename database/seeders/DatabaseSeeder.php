<?php

namespace Database\Seeders;

use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            UserSeeder::class
        );
        User::factory()->count(5)->has(
            ShoppingList::factory()->has(
                ShoppingListItem::factory()
            )
        )->has(
            ShoppingListItem::factory()->has(
                ShoppingList::factory()
            )
        )->create();
    }
}
