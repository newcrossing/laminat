<?php

namespace App\Livewire\Front\Type;

use App\Models\Attribute;
use App\Models\Collection;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Features\SupportAttributes\AttributeCollection;

class Filter extends Component
{
    public $typeId;
    public $firmId = null;
    public $collectionId = null;
    public $prices;
    public $selectAttributesId = [];
    public $arryay = [];
    public $priceMin;
    public $priceMax;
    public $priceFrom;
    public $priceTo;


    protected $listeners = [
        'update-price' => 'updatePrice',
    ];


    public function updatePrice($from, $to)
    {
        $this->priceFrom = $from;
        $this->priceTo = $to;

    }

    public function clearAll()
    {
        $this->firmId = null;
        $this->collectionId = null;
        $this->selectAttributesId = [];
        $this->arryay = [];
        $this->dispatch('clear-all');
    }

    public function removeFilter($target)
    {
        if ($target == 'firm') {
            $this->firmId = '';
            $this->collectionId = '';
            $this->dispatch('delete-filter', target: 'firm');
        }
        if ($target == 'collection') {
            $this->collectionId = '';
            $this->dispatch('delete-filter', target: 'collection');
        }

    }

    public function removeAttr()
    {
        $this->arryay = [];
    }


    public function changeAttributes()
    {
        $this->arryay = $this->selectAttributesId;
        foreach ($this->arryay as $kye1 => $value1) {
            foreach ($value1 as $kye2 => $value2)
                if (!$value2) {
                    unset($this->arryay[$kye1][$kye2]);
                } else {
                    $this->arryay[$kye1][$kye2] = $kye2;
                }
        }
        foreach ($this->arryay as $kye1 => $value1) {
            if (!count($value1)) {
                unset($this->arryay[$kye1]);
            }
        }

        $this->dispatch('update-attributes', $this->arryay);
    }

    public function mount()
    {
        $this->priceMin = $this->prices['min'];
        $this->priceMax = $this->prices['max'];
        $this->priceFrom = $this->prices['min'];
        $this->priceTo = $this->prices['max'];
    }


    function render()
    {
        $type = Cache::remember('type-id-'.$this->typeId, now()->addHour(2), function ()  {
            return  Type::withCount('productsPublic')->findOrFail($this->typeId);
        });


        if ($this->firmId) {
            $selectFirm = Cache::remember('firm-id-'.$this->firmId, now()->addHour(2), function ()  {
                return  Firm::findOrFail($this->firmId);
            });
        } else {
            $selectFirm = [];
        }

        if ($this->collectionId) {
            $selectCollection = Collection::findOrFail($this->collectionId);
        } else {
            $selectCollection = [];
        }


        // производители в выбранном типе
        $firms = Cache::remember('firms-type-id-'.$this->typeId, now()->addHour(2), function () use ($type) {
            return  Firm::whereHas('products', fn($query) => $query->where('type_id', '=', $this->typeId))
                ->withCount(['products' => function (Builder $query) use ($type) {
                    $query->whereHas('type', fn($query) => $query->where('id', '=', $this->typeId));
                }])
                ->orderBy('name')
                ->get();
        });




        // аттрибуты в выбранном
        $attributes = Attribute::whereHas('attributeOptions.products.type', fn($query) => $query->where('id', '=', $type->id))
            ->when($this->firmId, function ($q) {
                // если указана фирма
                $q->whereHas('attributeOptions.products.firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
            })
            ->with(['attributeOptions' => function ($query) use ($type) {
                $query->whereHas('products.type', function ($query) use ($type) {
                    $query->where('id', '=', $type->id);
                    debug($this->firmId);
                })
                    ->when($this->firmId, function ($q) {
                        // если указана фирма
                        $q->whereHas('products.firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
                    })
                    ->when($this->collectionId, function ($q) {
                        $q->whereHas('products.firm.collections', fn($query) => $query->where('collections.id', '=', $this->collectionId));
                    })
                    ->withCount(['products' => function (Builder $query) use ($type) {
                        $query
                            ->whereHas('type', fn($query) => $query->where('id', '=', $type->id))
                            ->when($this->firmId, function ($q) {
                                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
                            })
                            ->when($this->collectionId, function ($q) {
                                $q->whereHas('firm.collections', fn($query) => $query->where('collections.id', '=', $this->collectionId));
                            })
                            ->when($this->priceFrom && $this->priceTo, function ($q) {
                                return $q->whereBetween('price_metr', [$this->priceFrom, $this->priceTo]);
                            })
                            ->when(count($this->arryay), function ($q) {
                                foreach ($this->arryay as $key => $value) {
                                    //  $q = $q->whereHas('attributeOptions.attribute', fn($query) => $query->where('id', $key));
                                    $q = $q->whereHas('attributeOptions.attribute', fn($query) => $query->whereIn('id', [$key]));

                                    //$q = $q->whereHas('attributeOptions', fn($query) => $query->whereNotIn('id', $value));
                                }
                                // $q = $q->whereHas('attributeOptions', fn($query) => $query->whereIn('id', $value));
                                //debug($q);
                                return $q;
                            });
                    }]);
            }])
            ->get();

        // массив выбранных опций атрибутов
        $selectAttributesIdOne = [];
        if ($this->arryay) {
            $selectAttributesIdOne = call_user_func_array('array_merge', $this->arryay);
            $selectAttributesIdOne = array_values($selectAttributesIdOne);
        }

        $selectAttributes = Attribute::whereHas('attributeOptions', fn($query) => $query->whereIn('id', $selectAttributesIdOne))
            ->with(['attributeOptions' => function ($query) use ($selectAttributesIdOne) {
                $query->whereIn('id', $selectAttributesIdOne);
            }])
            ->get();

        return view('livewire.front.type.filter', compact('type', 'firms',
            'attributes',
            'selectAttributes',
            'selectFirm',
            'selectCollection',
        ));
    }
}
