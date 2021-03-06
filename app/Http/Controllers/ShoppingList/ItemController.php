<?php

namespace App\Http\Controllers\ShoppingList;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShoppingList\Item\ItemStoreRequest;
use App\Http\Requests\ShoppingList\Item\ItemUpdateRequest;
use App\Http\Resources\ShoppingList\ItemResource;
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
        $this->authorize('create', [Item::class, $list]);
        $item = $list->items()->create(
            array_merge(
                ['user_id' => auth()->user()->id],
                $request->validated()
            )
        );
        return response()->json([
            'item' => new ItemResource($item),
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
    public function update(ItemUpdateRequest $request, ShoppingList $list, Item $item)
    {
        \Log::debug($request->has('bought'));
        if(!$request->has('bought')) {
            $this->authorize('update', $item);
            $item->update($request->validated());
        } else {
            $item->update(['bought' => $request->bought]);
        }
        \Log::debug($item);
        return response()->json([
            'item' => new ItemResource($item),
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
