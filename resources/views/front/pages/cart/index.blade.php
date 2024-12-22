@extends('front.layouts.main')

@section('title','Корзина')

@section('vendor-styles')

@endsection


@section('page-styles')
@endsection

@section('content')
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active text-uppercase"><a href="{{route('cart')}}">Корзина</a></li>
                    <li class="text-uppercase"><a href="{{route('order')}}">Выбор способа оплаты и доставки</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
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
                                <tr id="cart-product-{{$product->id}}">
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="{{route('prod.show',$product->slug)}}">
                                                <figure>
                                                    @if($img =  $product->foto)
                                                        <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}" width="300" height="338"/>
                                                    @endif
                                                </figure>
                                            </a>
                                            <button class="btn btn-close " onclick="deleteCart(this,{{$product->id}})"><i class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name font-weight-normal">
                                        <a href="{{route('prod.show',$product->slug)}}">
                                            {{$product->getFullName()}}
                                        </a>
                                    </td>
                                    <td class="product-price text-center">
                                        <span class="amount" id="price-{{$product->id}}" data-price="{{$product->price_upak}}">
                                            {{ Number::format($product->price_upak,locale: 'ru')}}
                                        </span>
                                        <sub class="font-weight-normal">руб.</sub>
                                    </td>
                                    <td class="product-quantity text-center">
                                        <div class="input-group">
                                            <input class="quantity form-control" type="number" id="count-{{$product->id}}" count="{{$product->pivot->count}}"
                                                   value="{{$product->pivot->count}}">
                                            <button class="quantity-plus w-icon-plus" onclick="changeCount({{$product->id}})"></button>
                                            <button class="quantity-minus w-icon-minus" onclick="changeCount({{$product->id}})"></button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal text-center">
                                        <span class="amount" id="price-summ-{{$product->id}}">{{ Number::format($product->price_upak * $product->pivot->count,locale: 'ru')}}</span>
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
                                <button type="submit" class="btn btn-rounded btn-default btn-clear " onclick="clearCart(this)">Очистить корзину</button>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 sticky-sidebar-wrapper " id="total-price">
                        <x-front.cart.total-price/>
                    </div>


                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>

@endsection

@section('page-scripts')
    <script type="text/javascript">
        function clearCart($this) {

            $($this).addClass('load-more-overlay loading');

            let _token = $('meta[name="csrf-token"]').attr('content')
            var result = "";

            $.ajax({
                url: "/ajax/cart",
                async: false,
                type: "POST",
                data: {
                    type: 'clear',
                },
                success: function (response) {
                    console.log(response)

                    setTimeout(function () {
                        $($this).removeClass('load-more-overlay loading');
                    }, 500);
                },
                error: function (jqXHR, exception) {
                    result = false
                }
            });
            return result
        }

        function deleteCart($this, id) {
            let _token = $('meta[name="csrf-token"]').attr('content')
            var result = "";
            $($this).addClass('load-more-overlay loading');

            $.ajax({
                url: "/ajax/cart",
                async: false,
                type: "POST",
                data: {
                    type: 'delete',
                    id: id,
                },
                success: function (response) {
                    console.log(response)

                    setTimeout(function () {
                        $($this).removeClass('load-more-overlay loading');

                        $('#cart-product-' + id).hide()

                        if (response.count > 0) {
                            $('#cart_count').show()
                            $('#cart_count').text(response.count)
                        } else {
                            $('#cart_count').hide()
                            $('#cart_count').text(0)

                            let t = ' <tr> \
                                <td colspan="5">\
                                <div class="alert alert-warning alert-button show-code-action">\
                                <a href="{{route('home')}}" class="btn btn-warning btn-rounded">На главную</a> Корзина пуста.\
                        </div>\
                        </td>\
                        </tr>'
                            $('#cart-body').html(t)
                        }


                    }, 500);
                },
                error: function (jqXHR, exception) {
                    result = false
                }
            });

            return result
        }

        function changeCount(id) {
            let _token = $('meta[name="csrf-token"]').attr('content')
            let result = "";
            let count = $('#count-' + id).val();

            $.ajax({
                url: "/ajax/cart",
                async: false,
                type: "POST",
                data: {
                    type: 'change',
                    id:id,
                    count: count,
                },
                success: function (response) {
                  //  console.log(response)
                    $('#total-price').html(response)
                },
                error: function (jqXHR, exception) {
                    result = false
                }
            });
            return result
        }
    </script>
@endsection
