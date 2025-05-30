<div class="container">
    <h3 class="wishlist-title">Мое избранное</h3>

    <table class="shop-table wishlist-table">
        <thead>
        <tr>
            <th class="product-name"><span>Продукция</span></th>
            <th></th>
            <th class="product-price"><span>Цена</span></th>
            <th class="product-stock-status"><span>Статус</span></th>
            <th class="wishlist-action">Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse(  $wishlist->products as $product)
            @php
                /** @var \App\Models\Product  $product */
            @endphp
            <tr wire:key="{{$product->id}}">
                <td class="product-thumbnail">
                    <div class="p-relative">
                        <a href="{{route('prod.show',$product->slug)}}">
                            <figure>
                                @if($img =  $product->foto)
                                    <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}" width="300" height="338"/>
                                @endif
                                {{--                                            <img src="assets/images/shop/7-1.jpg" alt="product" width="300" height="338">--}}
                            </figure>
                        </a>
                        {{--                                    <button type="submit" class="btn btn-close">--}}
                        {{--                                        <i class="fas fa-times"></i>--}}
                        {{--                                    </button>--}}
                    </div>
                </td>
                <td class="product-name font-weight-normal">
                    <a href="{{route('prod.show',$product->slug)}}">
                        {{$product->getFullName()}}
                    </a>
                </td>
                <td class="product-price text-center">
                    <div>
                        <ins class="new-price ">{{ Number::format($product->price_metr,locale: 'ru')}} <sub>руб.</sub></ins>
                    </div>
                    <span class="rating-reviews font-weight-normal text-normal">за 1 м<sup>2</sup></span>
                </td>
                <td class="product-stock-status  text-center">
                    @if($product->have_sklad)
                        <span class="wishlist-in-stock">В наличии</span>
                    @else
                        <span class="wishlist-out-stock">Нет в наличии</span>
                    @endif
                </td>
                <td class="wishlist-action">
                    <div class="d-lg-flex">
                        <a href="#" class="btn btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0 btn-wishlist-2 "
                           wire:click="delete({{$product->id}})"
                           wire:target="delete({{ $product->id }})"
                           wire:loading.class="load-more-overlay loading">
                            <i class="w-icon-times-solid"></i> Удалить
                        </a>
                        @if($product->have_sklad)
                            <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">
                                В корзину
                            </a>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <div class="alert alert-warning alert-button show-code-action">
                        <a href="{{route('home')}}" class="btn btn-warning btn-rounded">На главную</a>
                        Вы ничего не отметили в избранное.
                    </div>
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>
