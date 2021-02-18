<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingList\ShoppingListStoreRequest;
use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
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
        return response()->json(
            $lists
            ->withCount('shoppingListItems')
            ->withCount('itemsBought')
            ->get()
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
        auth()->user()->shoppingLists()->create( $request->validated(), ['owner' => true] );
        return response()->json([
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
            'users_count' => $list->usersCount(),
            'list' => $list->load('users:id,name'),
            'items' => $list->shoppingListItems()->with('user:id,name')->get()
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
        if(!$request->email) { //updating only the name value on the list
            $list->update($request->validated());
            return response()->json([
                'message' => trans('responses.ok.list.updated')
            ], 200);
        } else { //update by attaching new user to the list
            $user = User::where('email', $request->email)->firstOrfail();
            $user->shoppingLists()->sync($list);
            return response()->json([
                'message' => trans('responses.ok.list.user_added')
            ], 200);
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
        $this->authorize('delete', $list);
        $user = auth()->user();
        if($list->owner->first()->id = $user->id) { //owner deletes the list
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
