<?php

namespace App\Livewire\Front\Wishlists;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Top extends Component
{

    protected $listeners = [
        'wishlist-add' => 'wishlistAdd',
        'wishlist-update' => 'wishlistUpdate',
    ];

    public function wishlistAdd($productID)
    {
        $wishlist = Wishlist::getWishlist();

        $wishlist->products()->detach($productID);
        $wishlist->products()->attach($productID, ['count' => 1]);

        Log::info('Избранное: товар добавлен в избранное', [$productID]);
        $this->js("toastr.success('Товар добавлен в избранное')");
    }

    public function wishlistUpdate()
    {
        $this->render();
    }

    public function render()
    {
        $count = Wishlist::getWishlistProductsCount();

        return view('livewire.front.wishlists.top', compact('count'));
    }
}
