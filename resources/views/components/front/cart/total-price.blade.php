<div class="sticky-sidebar">
    <div class="cart-summary mb-4">
        <h3 class="cart-title text-uppercase">Стоимость товаров</h3>
        <div class="cart-subtotal d-flex align-items-center justify-content-between">
            <label class="ls-25">Стоимость</label>
            <span>
                    <span class="amount" id="price-total">{{ Number::format($priceTotal,locale: 'ru')}}</span>
                    <sub class="font-weight-normal">руб.</sub>
                    </span>
        </div>
        <hr class="divider">
        <div class="cart-subtotal d-flex align-items-center justify-content-between">
            <label class="ls-25">Сумарный вес</label>
            <span>{{$packingWeight}} <sub class="font-weight-normal">кг.</sub></span>
        </div>

        <hr class="divider">
        @if(count($products))
            <a href="{{route('order')}}" class="btn btn-block btn-primary btn-icon-right btn-rounded  btn-checkout">
                К оформлению заказа <i class="w-icon-long-arrow-right"></i>
            </a>
        @endif
    </div>
</div>
