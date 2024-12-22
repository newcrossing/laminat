<?php

namespace App\Models;

use App\Traits\HasFotos;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFotos;

    const COUNT_OF_PAGINATION = 12;
    protected $perPage = 12;

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
        'public' => 'boolean',
        //'price_metr' => 'decimal:8,2',
    ];

    // Checks if variable is not set, null, (bool)false, (int)0, (float)0.00, (string)"", (string)"0", (string)"0.00", (array)[], or array with nil nodes
    public static function nil($var)
    {
        return (empty($var) || (is_numeric($var) && (float)$var == 0));
    }

    /**
     * Проверяет актуальность цены. Если нет скидки цены, то цена актуальна, вернет true
     * @return bool
     */
    public function isPriceMetr(): bool
    {
        return ($this->nil($this->price_metr_sale)) ? true : false;
        // return (!empty($this->price_metr_sale) && $this->price_metr_sale != 0.00) ? false : true;
    }

    public function isPriceUpak(): bool
    {
        return (!$this->nil($this->price_upak_sale)) ? false : true;
    }

    /**
     * Возвращает действующую цену. Если есть скидка, то действующая будет цена со скидкой
     * @return float
     */
    public function actualPriceMetr()
    {
        return ($this->nil($this->price_metr_sale)) ? $this->price_metr : $this->price_metr_sale;
    }

    public function actualPriceUpak()
    {
        return (!$this->nil($this->price_upak_sale)) ? $this->price_upak_sale : $this->price_upak;
    }

    public function priceMetr()
    {
        return $this->price_metr;
    }

    public function priceMetrOld()
    {
        return $this->price_metr_sale;
    }


    /**
     * Возвращает струю цену при условии, что есть скидка. Иначе null
     * @return mixed
     */
    public function oldPriceMetr(): mixed
    {
        return (!$this->nil($this->price_metr_sale)) ? $this->price_metr : null;
    }

    public function oldPriceUpak(): mixed
    {
        return (!$this->nil($this->price_upak_sale)) ? $this->price_upak : null;
    }

    public function scopePublic(Builder $query): void
    {
        $query->where('public', true);
    }

    /**
     * Считает цену товара итоговую учитывая его количество.
     * @param $count количество
     * @return float|int
     */
    public function getPriceByCount($count = 1)
    {
        return $this->price_upak * $count;
    }

    public function getFullName()
    {
        return "{$this->firm->name} {$this->collection->name} {$this->name}";
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

    public function firm()
    {
        return $this->hasOneThrough(
            Firm::class,
            Collection::class,
            'id', # foreign key on intermediary -- categories
            'id', # foreign key on target -- projects
            'collection_id', # local key on this -- properties
            'firm_id' # local key on intermediary -- categories
        );
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('count');
    }


}
