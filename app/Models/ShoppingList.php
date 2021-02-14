<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function shoppingListItems()
    {
        return $this->hasMany(ShoppingListItem::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('owner');
    }
    public function owner()
    {
        return $this->belongsToMany(User::class)->where('owner', true);
    }
}
