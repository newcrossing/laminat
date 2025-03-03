<?php

namespace App\Livewire\Front\Type;

use Livewire\Component;

class Sorting extends Component
{

    public $sorting;
    public $count;

    public function render()
    {
        $this->dispatch('update-sorting',$this->count,$this->sorting);
        return view('livewire.front.type.sorting');
    }
}
