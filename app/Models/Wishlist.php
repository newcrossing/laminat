<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
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


    /**
     * Получать избранное по id пользователя или сессии
     * @return Wishlist
     */
    public static function getWishlist(): Wishlist
    {
        if (Auth::id()) {
            return Wishlist::firstOrCreate(['user_id' => self::getUserID()]);
        } else {
            return Wishlist::firstOrCreate(['session' => self::getSession()]);
        }
    }

    /**
     * Возвращает количество товаров в избранном
     * @return int
     */
    public
    static function getWishlistProductsCount(): int
    {
        if (Auth::id()) {
            $w = Wishlist::where('user_id', self::getUserID())->first();
        } else {
            $w = Wishlist::where('session', self::getSession())->first();
        }
        if ($w) {
            return self::getWishlist()->products()->count();
        } else {
            return 0;
        }

    }


    public
    function products()
    {
        return $this->belongsToMany(Product::class, 'wishlist_product')->withPivot('count');
    }
}
