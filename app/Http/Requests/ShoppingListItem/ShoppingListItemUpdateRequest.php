<?php

namespace App\Http\Requests\ShoppingListItem;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingListItemUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', [ShoppingListItem::class, $this->route('list')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => '',
            'bought' => 'boolean',
        ];
    }
}
