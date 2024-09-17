<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
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
        'price_upak_sale',
        'price_metr_sale',
        'square',
        'public',
        'article',
        'slug',
        'description',
        'have_sklad',
        'have_room',
        'have_room',
        'param_sdt',
        'packing_volume',
        'packing_weight',
        'number_of_boards',
    ];

    protected $casts = [
        'public' => 'boolean'
    ];

    public function isPriceMetr(): bool
    {
        return (!empty($this->price_metr_sale)) ? false : true;
    }

    public function isPriceUpak(): bool
    {
        return (!empty($this->price_upak_sale)) ? false : true;
    }

    /**
     * выводит действующую цену. Если есть скидка то это будет действующая
     * @return int
     */
    public function actualPriceMetr(): int
    {
        return (!empty($this->price_metr_sale)) ? $this->price_metr_sale : $this->price_metr;
    }

    public function actualPriceUpak(): int
    {
        return (!empty($this->price_upak_sale)) ? $this->price_upak_sale : $this->price_upak;
    }

    /**
     * Возвращает струю цену при условии что есть скидка. Иначе null
     * @return mixed
     */
    public function oldPriceMetr(): mixed
    {
        return (!empty($this->price_metr_sale)) ? $this->price_metr : null;
    }

    public function oldPriceUpak(): mixed
    {
        return (!empty($this->price_upak_sale)) ? $this->price_upak : null;
    }

    public function scopePublic(Builder $query): void
    {
        $query->where('public', true);
    }

    public function getFullName (){
        return "{$this->collection->firm->name}   {$this->collection->name} {$this->name}";

    }


    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function collectionPublic(): BelongsTo
    {
        return $this->collection()->where('public', '=', true);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function attributeOptions(): BelongsToMany
    {
        return $this->belongsToMany(AttributeOption::class);
    }

//    public function firm(): HasOneThrough
//    {
//        return $this->through('collection')->has('firm');
//    }


}
