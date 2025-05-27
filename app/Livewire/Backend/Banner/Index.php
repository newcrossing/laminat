<?php

namespace App\Livewire\Backend\Banner;

use App\Models\Banner;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $count = Banner::COUNT_OF_PAGINATION;
    public $allCount;

    public function loadMore()
    {
        $this->count = $this->count + Banner::COUNT_OF_PAGINATION;
    }

    public function tooglePublic($id){
        $banner = Banner::findOrFail($id);
        $public = $banner->public;
        $banner->public = !$public;
        $banner->timestamps = false;
        $banner->save();
    }


    public function render()
    {
        $query = Banner::latest();
        $queryCount = clone $query;

        $this->allCount = $queryCount->count();
        $banners = $query->limit($this->count)->get();

        return view('livewire.backend.banner.index', compact('banners'));
    }
}
