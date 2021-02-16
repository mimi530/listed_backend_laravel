<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Http\Requests\ShoppingListItem\ShoppingListItemStoreRequest;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;

class ShoppingListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShoppingList $shoppingList)
    {
        $this->authorize('viewAny', [ShoppingListItem::class, $shoppingList]);
        return response()->json($shoppingList->shoppingListItems()->with('user')->get()->groupBy('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoppingListItemStoreRequest $request, ShoppingList $shoppingList)
    {
        $shoppingList->shoppingListItems()->create(
            array_merge(
                ['user_id' => auth()->user()->id],
                $request->validated()
            )
        );
        return response()->json('', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingListItem  $shoppingListItem
     * @return \Illuminate\Http\Response
     */
    public function update(ShoppingListUpdateRequest $request, ShoppingListItem $item)
    {
        $item->update($request->validated());
        return response()->json('Przedmiot zaktualizowany', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingListItem  $shoppingListItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingListItem $item)
    {
        $this->authorize('delete', ShoppingListItem::class);
        $item->delete();
        return response()->json('Przedmiot usunięty', 200);
    }
}
