<?php

namespace App\Policies;

use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingListItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user, ShoppingList $shoppingList)
    {
        return $shoppingList->users->contains($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, ShoppingList $shoppingList)
    {
        return $shoppingList->users->contains($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingListItem  $shoppingListItem
     * @return mixed
     */
    public function update(User $user, ShoppingListItem $shoppingListItem)
    {
        return $shoppingListItem->user()->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingListItem  $shoppingListItem
     * @return mixed
     */
    public function delete(User $user, ShoppingListItem $shoppingListItem)
    {
        return $shoppingListItem->user()->id === $user->id;
    }
}
