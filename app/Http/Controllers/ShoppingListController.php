<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingList\ShoppingListStoreRequest;
use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Http\Resources\ShoppingList\ItemResource;
use App\Http\Resources\ShoppingListResource;
use App\Models\ShoppingList;
use App\Models\User;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists =  auth()->user()->shoppingLists();

        return ShoppingListResource::collection(
            $lists->withCount(['items', 'items as items_bought_count' => function ($query) {
                $query->where('bought', true);
            }])->latest()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ShoppingListStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoppingListStoreRequest $request)
    {
        $list = auth()->user()->shoppingLists()->create( $request->validated(), ['owner' => true] );
        return response()->json([
            'list' => new ShoppingListResource($list),
            'message' => trans('responses.ok.list.saved')
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingList  $list
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingList $list)
    {;
        $this->authorize('view', $list);
        return response()->json([
            'users_count' => $list->users()->count(),
            'list' => new ShoppingListResource($list->load('users')),
            'items' => ItemResource::collection($list->items()->orderBy('bought')->orderBy('created_at', 'desc')->get())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ShoppingListUpdateRequest  $request
     * @param  \App\Models\ShoppingList  $list
     * @return \Illuminate\Http\Response
     */
    public function update(ShoppingListUpdateRequest $request, ShoppingList $list)
    {
        $this->authorize('update', $list);
        if(!$request->has('email')) { //updating only the name value on the list
            $list->update($request->validated());
            return response()->json([
                'message' => trans('responses.ok.list.updated')
            ], 200);
        } else { //update by attaching new user to the list
            $user = User::where('email', $request->email)->firstOrfail();
            if(!$list->users->contains($user)) { //adding new user
                $user->shoppingLists()->attach($list);
                return response()->json([
                    'message' => trans('responses.ok.list.user_added')
                ], 200);
            } else { //user already exists
                return response()->json([
                    'message' => trans('responses.error.list.user_exists')
                ], 409);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingList  $list
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingList $list)
    {
        $user = auth()->user();
        if($list->owner->first()->id = $user->id) { //owner deletes the list
            $this->authorize('delete', $list);
            $list->delete();
            return response()->json([
                'message' => trans('responses.ok.list.deleted')
            ], 200);
        } else { //non-owner leaves the list
            $user->shoppingLists()->detach($list);
            return response()->json([
                'message' => trans('responses.ok.list.left')
            ], 200);
        }
    }
}
