<?php

namespace App\Providers;

use App\Models\ShoppingList;
use App\Models\ShoppingList\Item;
use App\Policies\ShoppingList\ItemPolicy;
use App\Policies\ShoppingListPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Item::class => ItemPolicy::class,
        ShoppingList::class => ShoppingListPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
