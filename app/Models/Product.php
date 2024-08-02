<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFotos;


    protected $fillable = [
        'name',
        'text',
        'price_upak',
        'price_metr',
        'square',
        'public',
        'article',
        'slug',
        'description',
        'have_sklad',
        'have_room',
    ];

    public function attributeOptions(): BelongsToMany
    {
        return $this->belongsToMany(AttributeOption::class);
    }

}
