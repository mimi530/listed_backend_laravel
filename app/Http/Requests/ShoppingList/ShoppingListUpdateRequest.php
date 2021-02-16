<?php

namespace App\Http\Requests\ShoppingList;

use App\Models\ShoppingList;
use Illuminate\Foundation\Http\FormRequest;

class ShoppingListUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('shopping_list'));
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
            'email' => 'email'
        ];
    }
}
