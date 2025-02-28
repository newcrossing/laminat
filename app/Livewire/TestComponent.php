<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Slider;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TestComponent extends Component
{

    public $message = '$message';
    public $name = 'name';
    public $liked = true;
    public $public = true;

    protected $listeners = [
        'refreff' => '$refresh'
    ];


    public function toggleLike(){
        $slider = Slider::find(1);
        $slider->public = !$slider->public;
        $slider->save();
        $this->public = $slider->public;
        $this->liked = !$this->liked;

        $this->dispatch('refreff');
    }

    public function save()
    {
        $this->validate();

        $order = Order::create([
            'name' => $this->name
        ]);


    }

    public function updateMessage(){
        $this->message='new';
    }

    public function render()
    {
        $slider = Slider::find(1);
        $this->public = $slider->public;

        return view('livewire.test-component', compact('slider'));
    }
}
