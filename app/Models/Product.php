<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'param_sdt',
    ];

    protected $casts = [
        'public' => 'boolean'
    ];

    public function scopePublic(Builder $query): void
    {
        $query->where('public', true);
    }


    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function attributeOptions(): BelongsToMany
    {
        return $this->belongsToMany(AttributeOption::class);
    }


}
