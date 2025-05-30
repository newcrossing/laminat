<?php

namespace App\Livewire\Front\Wishlists;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Index extends Component
{

    public $wishlist;

    public function delete($id)
    {
        $this->wishlist->products()->detach($id);

        // посылаю сигнал на обновление
        $this->dispatch('wishlist-update');

        Log::info('Избранное: удален товар', [$id]);
        $this->js("toastr.success('Товар удален из избранного')");
    }

    public function render()
    {
        $this->wishlist = Wishlist::getWishlist();
        return view('livewire.front.wishlists.index');
    }
}
