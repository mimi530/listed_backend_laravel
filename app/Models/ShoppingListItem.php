<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'bought'
    ];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
