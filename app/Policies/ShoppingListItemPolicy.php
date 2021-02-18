<?php

namespace App\Policies;

use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShoppingListItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, ShoppingList $list)
    {
        return $list->users->contains($user)
            ? Response::allow()
            : Response::deny(trans('responses.error.list.belong'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingListItem  $item
     * @return mixed
     */
    public function update(User $user, ShoppingListItem $item)
    {
        return $item->user->id === $user->id
            ? Response::allow()
            : Response::deny(trans('responses.error.item.owner'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingListItem  $item
     * @return mixed
     */
    public function delete(User $user, ShoppingListItem $item)
    {
        return $item->user->id === $user->id
            ? Response::allow()
            : Response::deny(trans('responses.error.item.owner'));
    }
}
