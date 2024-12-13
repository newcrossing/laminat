<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count">{{count($products)}}</span>
        </i>
        <span class="cart-label">Корзина </span>
    </a>
    <div class="dropdown-box">
        <div class="cart-header">
            <span>Корзина покупок</span>
            <a href="#" class="btn-close">Закрыть<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products">
            @forelse($products as $product)
                @php
                    /** @var \App\Models\Product  $product */

                @endphp
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="{{route('prod.show',$product->slug)}}" class="product-name">{{$product->getFullName()}}</a>
                        <div class="price-box">
                            <span class="product-quantity">{{$product->pivot->count}}</span>
                            <span class="product-price">{{ Number::format($product->price_upak,locale: 'ru')}} руб.</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="{{route('prod.show',$product->slug)}}">
                            @if($img =  $product->foto)
                                <img src="{{  Croppa::url($img->getUrlForCroppa(),84,94,['quadrant'])}}" height="84" width="94"/>
                            @endif

                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @empty
                <div class="alert alert-warning alert-simple alert-inline ">
                    <h4 class="alert-title">
                        <i class="w-icon-exclamation-triangle"></i> Ваша корзина пока пуста
                    </h4>
                </div>
            @endforelse


        </div>

        <div class="cart-total">
            <label>Стоимость:</label>
            <span class="price text-normal">{{Number::format($priceTotal,locale: 'ru') }} руб.</span>
        </div>

        <div class="cart-action">
            <a href="" class="btn btn-dark btn-outline btn-rounded">В корзину</a>
            <a href="" class="btn btn-primary  btn-rounded">Оформить</a>
        </div>
    </div>
    <!-- End of Dropdown Box -->
</div>