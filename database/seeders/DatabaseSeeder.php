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
        $users = User::factory()->count(2)->create();
        foreach($users as $user) {
            $lists = ShoppingList::factory()->count(2)->create();
            foreach($lists as $list) {
                $user->shoppingLists()->attach($list);
                $items = ShoppingListItem::factory()->count(3)->make();
                foreach($items as $item) {
                    $list->shoppingListItems()->create(
                        array_merge(
                            $item->toArray(), 
                            ['user_id'=>$user->id]
                        )
                    );
                }
            }
        }
    }
}
