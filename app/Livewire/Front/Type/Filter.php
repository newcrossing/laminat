<?php

namespace App\Livewire\Front\Type;

use App\Models\Attribute;
use App\Models\Firm;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Filter extends Component
{
    public $typeId, $firmId = null, $prices;
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
        $type = Type::withCount('productsPublic')->findOrFail($this->typeId);

        if ($this->firmId) {
            $selectFirm = Firm::findOrFail($this->firmId);
        } else {
            $selectFirm = [];
        }


        // производители в выбранном типе
        $firms = Firm::whereHas('products', fn($query) => $query->where('type_id', '=', $this->typeId))
            ->withCount(['products' => function (Builder $query) use ($type) {
                $query->whereHas('type', fn($query) => $query->where('id', '=', $this->typeId));
            }])
            ->orderBy('name')
            ->get();

        // аттрибуты в выбранном
        $attributes = Attribute::whereHas('attributeOptions.products.type', fn($query) => $query->where('id', '=', $type->id))
            ->when($this->firmId, function ($q) {
                // если указана фирма
                $q->whereHas('attributeOptions.products.firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
            })
            ->with(['attributeOptions' => function ($query) use ($type) {
                $query->whereHas('products.type', function ($query) use ($type) {
                    $query->where('id', '=', $type->id);
                })
                    ->when($this->firmId, function ($q) {
                        // если указана фирма
                        $q->whereHas('products.firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
                    })
                    ->withCount(['products' => function (Builder $query) use ($type) {
                        $query
                            ->whereHas('type', fn($query) => $query->where('id', '=', $type->id))
                            ->when($this->firmId, function ($q) {
                                $q->whereHas('firm', fn($query) => $query->where('firms.id', '=', $this->firmId));
                            })
                            ->when($this->priceFrom && $this->priceTo, function ($q)  {
                                return $q->whereBetween('price_metr', [$this->priceFrom, $this->priceTo]);
                            })
                            ->when(count($this->arryay), function ($q) {
                                foreach ($this->arryay as $key => $value) {
                                    $q = $q->whereHas('attributeOptions.attribute', fn($query) => $query->where('id', $key));
                                    // $q = $q->whereHas('attributeOptions', fn($query) => $query->whereIn('id', $value));
                                }

                                debug($q);
                                return $q;
                            });
                    }]);
            }])
            // если выбран производитель
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
        ));
    }
}
