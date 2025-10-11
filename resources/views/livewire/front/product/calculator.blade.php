<div>
    @if(!empty($product->square))
        <div class="alert alert-primary  alert-button alert-block show-code-action mb-3" style="border: 2px solid">
            <h4 class=""><i class="w-icon-orders"></i> Калькулятор</h4>
            <div class="row">
                <div class="col-6">
                    <div class="">Площадь помещения</div>
                    <input type="number" class="form-control form-control-md text-dark" wire:model.live="area"/>
                    <p class="font-size-md text-light mb-0">Количество квадратных метров </p>
                </div>
                <div class="col-6">
                    <div class="">Запас на подрезку</div>
                    <select class="form-control form-control-md text-dark" wire:model.change="zapas">
                        <option value="1">Без запаса</option>
                        <option value="1.05">5 %</option>
                        <option value="1.1">10 %</option>
                        <option value="1.15">15 %</option>
                    </select>
                    <p class="font-size-md text-light mb-0"><a href="#">Сколько</a> оставить на подрезку? </p>
                </div>
            </div>
        </div>
    @endif
    <div class="row text-center">
        <div class="col">
            <div class="font-size-md">Ваша цена</div>
            <div class="product-price">
                <ins class="new-price">{{ Number::format($priceItog,locale: 'ru')}}</ins>
                <span class="font-size-md"> руб. </span>
            </div>
        </div>
    </div>

    <hr class="product-divider">

    <div class="fix-bottom product-sticky-content sticky-content">
        <div class="product-form container" style="align-items: flex-start">
            <div class="product-qty-form">
                <div class="input-group">
                    <input class="quantity form-control" type="number" min="1" id="count_up"
                           wire:model.live="upakItog" wire:keydown="change">
                    <button class="quantity-plus w-icon-plus" wire:click="plusCountUpak"></button>
                    <button class="quantity-minus w-icon-minus" wire:click="minusCountUpak"></button>
                </div>
            </div>

            @if($product->isCart())
                <button class="btn  btn-success btn-cart mr-1" data-id="{{$product->id}}" disabled>
                    <i class=" w-icon-check"></i><span>В корзине</span>
                </button>
            @else
                <button class="btn  btn-primary btn-cart mr-1" data-id="{{$product->id}}" @disabled(!$product->have_sklad)>
                    <i class="w-icon-cart"></i> <span> В корзину</span>
                </button>
            @endif

            <button class="btn btn-rounded btn-wishlist  @if($product->isWishlist()) btn-success  @else btn-primary btn-outline @endif"
                    data-idwishlist="{{$product->id}}" href="#" @if($product->isWishlist()) disabled @endif>
                <i class="w-icon-heart "></i>&nbsp;
            </button>
        </div>
    </div>
</div>
