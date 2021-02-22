<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resource =  [
            'id' => $this->id,
            'name' => $this->name,
            'users' => UserResource::collection($this->users)
        ];
        if ($this->items_count) {
            $resource['items_count'] = $this->items_count;
        }
        if ($this->items_bought_count) {
            $resource['items_bought_count'] = $this->items_bought_count;
        }
        return $resource;

    }
}
