<?php

namespace App\Policies;

use App\Models\ShoppingList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return mixed
     */
    public function view(User $user, ShoppingList $shoppingList)
    {
        return $shoppingList->users->contains($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return mixed
     */
    public function update(User $user, ShoppingList $shoppingList)
    {
        return $user->id === $shoppingList->owner()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return mixed
     */
    public function delete(User $user, ShoppingList $shoppingList)
    {
        return $user->id === $shoppingList->owner()->id;
    }
}
