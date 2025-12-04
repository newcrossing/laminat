<?php

namespace App\Livewire\Backend\Product;

use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Livewire\Component;

class Index extends Component
{
    public $count = Product::COUNT_OF_PAGINATION;
    public $allCount;
    public $sortingPrice = null;
    public $sortingPublic = null;
    public $sortingTypeId = null;
    public $sortingFirmId = null;
    public $searchText = null;

    /**
     * @param $type string metr|metr_sale|upak|upak_sale
     * @param $id string
     * @param $price
     * @return void
     */
    public function savePice($type, $id, $price): void
    {
        if (trim($price) == '') {
            $price = 0;
        }
        $price = preg_replace('/[^0-9.]/', '', str_replace([',', ' '], ['.', ''], $price));

        // debug($price);
        $product = Product::findOrFail($id);
        // не обновлять временные метки
        $product->timestamps = false;

        switch ($type) {
            case 'metr':
                if ($product->price_metr_sale > 0) {
                    $product->update(['price_metr_sale' => $price]);
                } else {
                    $product->update(['price_metr' => $price]);
                }
                break;
            case 'metr_sale':
                if ($price == 0) {
                    if ($product->price_metr_sale > 0) {
                        $product->update(['price_metr' => $product->price_metr_sale]);
                        $product->update(['price_metr_sale' => 0]);
                    }
                    break;
                }
                // меняю цену за метр скидку
                if ($product->price_metr_sale > 0) {
                    $product->update(['price_metr' => $price]);
                } else {
                    $product->update(['price_metr_sale' => $product->price_metr]);
                    $product->update(['price_metr' => $price]);
                }
                break;
            case 'upak':
                if ($product->price_upak_sale > 0) {
                    $product->update(['price_upak_sale' => $price]);
                } else {
                    $product->update(['price_upak' => $price]);
                }
                break;
            case 'upak_sale':
                if ($price == 0) {
                    if ($product->price_upak_sale > 0) {
                        $product->update(['price_upak' => $product->price_upak_sale]);
                        $product->update(['price_upak_sale' => 0]);
                    }
                    break;
                }
                if ($product->price_upak_sale > 0) {
                    $product->update(['price_upak' => $price]);
                } else {
                    $product->update(['price_upak_sale' => $product->price_upak]);
                    $product->update(['price_upak' => $price]);
                }
                break;
        }


    }

    public function tooglePublic($id): void
    {
        $product = Product::findOrFail($id);
        $public = $product->public;
        $product->public = !$public;
        $product->timestamps = false;
        $product->save();
    }

    public function toogleHave($id): void
    {
        $product = Product::findOrFail($id);
        $have_sklad = $product->have_sklad;
        $product->have_sklad = !$have_sklad;
        $product->timestamps = false;
        $product->save();
    }

    public function toogleRoom($id): void
    {
        $product = Product::findOrFail($id);
        $have_room = $product->have_room;
        $product->have_room = !$have_room;
        $product->timestamps = false;
        $product->save();
    }

    public function loadMore()
    {
        $this->count = $this->count + Product::COUNT_OF_PAGINATION;
    }

    public function render()
    {
        $query = Product::when($this->sortingPrice == 'min', function ($q) {
            return $q->orderBy('price_metr');
        })
            ->when($this->sortingPrice == 'max', function ($q) {
                return $q->orderByDesc('price_metr');
            })
            ->when(empty($this->sortingPrice), function ($q) {
                return $q->orderByDesc('updated_at');
            })
            ->when($this->sortingPublic == 'yes', function ($q) {
                return $q->where('public', true);
            })
            ->when($this->sortingPublic == 'no', function ($q) {
                return $q->where('public', false);
            })
            ->when($this->sortingTypeId, function ($q) {
                $q->whereHas('type', fn($query) => $query->where('types.id', '=', $this->sortingTypeId));
            })
            ->when($this->sortingFirmId, function ($q) {
                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $this->sortingFirmId));
            })
            ->when($this->searchText, function ($q) {
//                $q->where('name', 'like', "%{$this->searchText}%");
                $q->whereHas('firm', fn($query) => $query->where('firms.name', 'like', "%{$this->searchText}%"))
                    ->orWhereHas('collection', fn($query) => $query->where('collections.name', 'like', "%{$this->searchText}%"))
                    ->orWhere('name', 'like', "%{$this->searchText}%");
            })
            ->with(['type', 'collection']);
        $queryCount = clone $query;
        // количество найденых товаров без лимита
        $this->allCount = $queryCount->count();
        $products = $query->limit($this->count)->get();

        $firms = Firm::all();
        $types = Type::all();

        return view('livewire.backend.product.index', compact('products', 'firms',
            'types',
        ));
    }
}
