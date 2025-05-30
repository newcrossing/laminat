<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected static function getUserID()
    {
        return Auth::id();
    }

    protected static function getSession()
    {
        return session()->getId();
    }

    public static function getCart(): Cart
    {
        if (Auth::id()) {
            return Cart::firstOrCreate(['user_id' => self::getUserID()]);
        } else {
            return Cart::firstOrCreate(['session' => self::getSession()]);
        }
    }
    public static function getCartProductsCount(): int
    {
        if (Auth::id()) {
            $w = Cart::where('user_id', self::getUserID())->first();
        } else {
            $w = Cart::where('session', self::getSession())->first();
        }
        if ($w) {
            return self::getCart()->products()->count();
        } else {
            return 0;
        }
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }
}
