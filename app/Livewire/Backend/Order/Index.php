<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $count = Order::COUNT_OF_PAGINATION;
    public $allCount;

    public function loadMore()
    {
        $this->count = $this->count + Order::COUNT_OF_PAGINATION;
    }


    public function render()
    {
        $query = Order::with('products')->latest();
        $queryCount = clone $query;

        $this->allCount = $queryCount->count();
        $orders = $query->limit($this->count)->get();

        return view('livewire.backend.order.index', compact('orders'));
    }
}
