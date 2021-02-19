<?php

namespace App\Models;

use App\Models\ShoppingList\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('owner');
    }

    public function owner()
    {
        return $this->belongsToMany(User::class)->wherePivot('owner', true);
    }
}
