<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Slider;
use Livewire\Component;

class Test2 extends Component
{


    public $public = true;

    protected $listeners = [
        'refreff' => '$refresh',
        'toggleLike'
    ];

    public function toggleLike(){
        $slider = Slider::find(1);
        $slider->public = !$slider->public;
        $slider->save();
        $this->public = $slider->public;

        $this->dispatch('refreff');


    }


    public function render()
    {
        $slider = Slider::find(1);
        $this->public = $slider->public;

        return view('livewire.test2');
    }
}
