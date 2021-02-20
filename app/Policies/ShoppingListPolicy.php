<?php

namespace App\Policies;

use App\Models\ShoppingList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShoppingListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingList  $list
     * @return mixed
     */
    public function view(User $user, ShoppingList $list)
    {
        return $list->users->contains($user)
            ? Response::allow()
            : Response::deny(trans('responses.error.list.belong'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingList  $list
     * @return mixed
     */
    public function update(User $user, ShoppingList $list)
    {
        return $user->id === $list->owner->first()->id
            ? Response::allow()
            : Response::deny(trans('responses.error.list.owner'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingList  $list
     * @return mixed
     */
    public function delete(User $user, ShoppingList $list)
    {
        return $user->id === $list->owner->first()->id
            ? Response::allow()
            : Response::deny(trans('responses.error.list.owner'));
    }
}
