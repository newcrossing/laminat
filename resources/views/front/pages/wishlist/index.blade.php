@extends('front.layouts.main')

@section('title','Избранное')

@section('vendor-styles')

@endsection


@section('page-styles')
@endsection

@section('content')
    <main class="main wishlist-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Избранное</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
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
                    @foreach($products as $product)
                        @php
                            /** @var \App\Models\Product  $product */
                        @endphp
                        <tr>
                            <td class="product-thumbnail">
                                <div class="p-relative">
                                    <a href="{{route('prod.show',$product->slug)}}">
                                        <figure>
                                            @if($img =  $product->foto)
                                                <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}"  width="300" height="338"/>
                                            @endif
{{--                                            <img src="assets/images/shop/7-1.jpg" alt="product" width="300" height="338">--}}
                                        </figure>
                                    </a>
                                    <button type="submit" class="btn btn-close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="product-name">
                                <a href="{{route('prod.show',$product->slug)}}">
                                    {{$product->getFullName()}}
                                </a>
                            </td>
                            <td class="product-price text-center">
                                <div><ins class="new-price ">{{ Number::format($product->price_metr,locale: 'ru')}} <sub>руб.</sub></ins></div>
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
                                    <a href="#" class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">
                                        Посмотреть
                                    </a>
                                    @if($product->have_sklad)
                                        <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">
                                            В корзину
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{--                <div class="social-links">--}}
                {{--                    <label>Share On:</label>--}}
                {{--                    <div class="social-icons social-no-color border-thin">--}}
                {{--                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>--}}
                {{--                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>--}}
                {{--                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>--}}
                {{--                        <a href="#" class="social-icon social-email far fa-envelope"></a>--}}
                {{--                        <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
        <!-- End of PageContent -->
    </main>

@endsection

@section('page-scripts')
@endsection
