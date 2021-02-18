<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Http\Requests\ShoppingListItem\ShoppingListItemStoreRequest;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;

class ShoppingListItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoppingListItemStoreRequest $request, ShoppingList $list)
    {
        $list->shoppingListItems()->create(
            array_merge(
                ['user_id' => auth()->user()->id],
                $request->validated()
            )
        );
        return response()->json([
            'message' => trans('responses.ok.item.saved')
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ShoppingListUpdateRequest $request, ShoppingList $list, ShoppingListItem $item)
    {
        $item->update($request->validated());
        return response()->json([
            'message' => trans('responses.ok.item.updated')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingList $list, ShoppingListItem $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        return response()->json([
            'message' => trans('responses.ok.item.deleted')
        ], 200);
    }
}
