<?php

namespace App\Livewire\Front\Product;

use Livewire\Component;

class Calculator extends Component
{
    public $product;
    public $area;
    public $zapas = 1;
    public $countUpak = 1;
    public $priceItog;
    public $upakItog = 1;

    public function plusCountUpak()
    {
        $this->upakItog++;
        $this->resetCalculate();
        $this->calculatePriceItog();
    }

    public function minusCountUpak()
    {
        if ($this->upakItog > 1) {
            $this->upakItog--;
            $this->resetCalculate();
            $this->calculatePriceItog();
        }
    }

    public function calculatePriceItog()
    {
        if ($this->area > 0) {
            $this->upakItog = $this->getCountUpak();
        }

        // упаковок не может быть меньше 1
        if ($this->upakItog > 0) {
            $this->priceItog = $this->product->price_upak * $this->upakItog;
        } else {
            $this->upakItog = 1;
            $this->priceItog = $this->product->price_upak * $this->upakItog;
        }
    }

    protected function resetCalculate()
    {
        $this->area = null;
        $this->zapas = 1;
    }

    public function change()
    {
        $this->resetCalculate();
    }

    public function mount()
    {
        // изначальное присвоение по умолчанию
        $this->priceItog = $this->product->price_upak;
    }

    public function render()
    {
        $this->calculatePriceItog();

        return view('livewire.front.product.calculator');
    }

    public function getCountUpak(): int
    {
        // Если не указана площадь, то по умолчанию 1 упаковка
        if (empty($this->area) || empty($this->product->square))
            return 1;

        return ceil($this->area * $this->zapas / $this->product->square);
    }
}
