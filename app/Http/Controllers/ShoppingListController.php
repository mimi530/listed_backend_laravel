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
        return response()->json(auth()->user()->shoppingLists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ShoppingListStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoppingListStoreRequest $request)
    {
        $shoppingList = auth()->user()->shoppingLists()->create(
            $request->validated(), 
            ['owner' => true]
        );
        return response()->json($shoppingList, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingList $shoppingList)
    {
        $this->authorize('view', $shoppingList);
        return response()->json($shoppingList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ShoppingListUpdateRequest  $request
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return \Illuminate\Http\Response
     */
    public function update(ShoppingListUpdateRequest $request, ShoppingList $shoppingList)
    {
        if(!$request->email) {
            //updating only the name value on the list
            $shoppingList->update($request->validated());
            return response()->json($shoppingList, 200);
        } else {
            //update by attaching new user to the list
            $user = User::where('email', $request->email)->firstOrfail();
            $user->shoppingLists()->sync($shoppingList);
            return response()->json('Użytkownik dopisany do listy', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingList  $shoppingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingList $shoppingList)
    {
        $this->authorize('delete', $shoppingList);
        $shoppingList->delete();
        return response()->json('Lista usunięta', 200);
    }
}
