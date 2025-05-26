<?php

namespace App\Models;

use App\Enums\OrderDeliveryEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const COUNT_OF_PAGINATION = 24;

    public const  DELIVERY = [
        'moscow' => 2500,
        'moscow_oblast_vostok' => 2000,
        'moscow_oblast' => 2000,
        'moscow_oblast_km' => 100,
    ];

    protected $guarded = [];

    protected $casts = [
        'delivery_type' => OrderDeliveryEnum::class,
        'status' => OrderStatusEnum::class,
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price');
    }
}
