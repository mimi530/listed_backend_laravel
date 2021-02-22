<?php

namespace App\Http\Controllers\ShoppingList;

use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Http\Requests\ShoppingList\Item\ItemStoreRequest;
use App\Models\ShoppingList;
use App\Models\ShoppingList\Item;

class ItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request, ShoppingList $list)
    {
        $list->items()->create(
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
     * @param  \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(ShoppingListUpdateRequest $request, ShoppingList $list, Item $item)
    {
        $item->update($request->validated());
        return response()->json([
            'message' => trans('responses.ok.item.updated')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingList $list, Item $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        return response()->json([
            'message' => trans('responses.ok.item.deleted')
        ], 200);
    }
}
