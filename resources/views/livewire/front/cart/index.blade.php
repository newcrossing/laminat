<div class="page-content">
    <div class="container">
        <div class="row gutter-lg mb-10">
            <div class="col-lg-8 pr-lg-4 mb-6">
                <table class="shop-table cart-table">
                    <thead>
                    <tr>
                        <th class="product-name"><span>Товар </span></th>
                        <th></th>
                        <th class="product-price"><span>Цена</span></th>
                        <th class="product-quantity"><span>Количество</span></th>
                        <th class="product-subtotal"><span>Стоимость</span></th>
                    </tr>
                    </thead>
                    <tbody id="cart-body">
                    @forelse($products as $product)
                        @php
                            /** @var \App\Models\Product  $product */
                        @endphp
                        <tr wire:key="{{$product->id}}">
                            <td class="product-thumbnail">
                                <div class="p-relative">
                                    <a href="{{route('prod.show',$product->slug)}}">
                                        <figure>
                                            @if($img = $product->foto)
                                                <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}" width="300" height="338"/>
                                            @endif
                                        </figure>
                                    </a>
                                    <button class="btn btn-close"
                                            wire:click="delete({{$product->id}})"
                                            wire:target="delete({{ $product->id }})"
                                            wire:loading.class="load-more-overlay loading">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="product-name font-weight-normal">
                                <a href="{{route('prod.show',$product->slug)}}">
                                    {{$product->getFullName()}}
                                </a>
                            </td>
                            <td class="product-price text-center">
                                <span class="amount">
                                    {{ Number::format($product->price_upak)}}
                                </span>
                                <sub class="font-weight-normal">руб.</sub>
                            </td>
                            <td class="product-quantity text-center">
                                <div class="input-group">
                                    <input class="quantity form-control" type="number" wire:change="countChange({{$product->id}},'value',$event.target.value)"
                                           value="{{$product->pivot->count}}">
                                    <button class="quantity-plus w-icon-plus" wire:click="countChange({{$product->id}},'plus')"></button>
                                    <button class="quantity-minus w-icon-minus" wire:click="countChange({{$product->id}},'minus')"
                                            @if($product->pivot->count==1) disabled @endif></button>
                                </div>
                            </td>
                            <td class="product-subtotal text-center">
                                <span class="amount" >{{ Number::format($product->price_upak * $product->pivot->count)}}</span>
                                <sub class="font-weight-normal">руб.</sub>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning alert-button show-code-action">
                                    <a href="{{route('home')}}" class="btn btn-warning btn-rounded">На главную</a> Корзина пуста.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="cart-action mb-6">
                    <a href="{{route('home')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Продолжить покупки</a>

                    @if(count($products))
                        <button type="submit" class="btn btn-rounded btn-default btn-clear " wire:click="delete">Очистить корзину</button>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 sticky-sidebar-wrapper " id="total-price">
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

            </div>


        </div>
    </div>
</div>
