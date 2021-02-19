<?php

namespace App\Models\ShoppingList;

use App\Models\ShoppingList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'shopping_list_items';
    
    protected $fillable = [
        'name',
        'description',
        'bought',
        'user_id'
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
