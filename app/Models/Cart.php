<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getCart()
    {
        if (Auth::id()) {
            return Cart::firstOrCreate(['user_id' => Auth::id()]);
        } else {
            return Cart::firstOrCreate(['session' => session()->getId()]);
        }
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }
}
