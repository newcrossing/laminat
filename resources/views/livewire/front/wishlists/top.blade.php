<div>
    <div class="dropdown cart-dropdown  d-xs-show mr-3 mr-lg-2">
        <div class="cart-overlay"></div>
        <a href="{{route('wishlist')}}" class="cart-toggle label-down link">
            <i class="w-icon-heart">
                <span class="cart-count @if(!$count) d-none @endif" id="wishlist_count">{{$count}}</span>
            </i>
            <span class="cart-label">Избранное</span>
        </a>
    </div>
</div>
