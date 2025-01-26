<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TestComponent extends Component
{

    public $message = '2342';

    #[Validate('required')]
    public $name = '';


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
        return view('livewire.test-component');
    }
}
