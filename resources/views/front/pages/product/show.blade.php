@extends('front.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')
@endsection

@section('content')
    <main class="main mb-10 pb-1">

        <!-- Start of Breadcrumb -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                            @if($product->fotos()->count())
                                                @foreach($product->fotos as $foto)
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ Croppa::url($foto->getUrlForCroppa(),800,900,['quadrant']) }}"
                                                                 data-zoom-image="{{ Croppa::url($foto->getUrlForCroppa(),1200) }}"
                                                                 alt="" width="800">
                                                        </figure>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset(Storage::disk('product')->url('/cr_400/null.jpg'))}}"
                                                             data-zoom-image="{{ asset(Storage::disk('product')->url('/cr_400/null.jpg'))}}"
                                                             alt="" width="800">
                                                    </figure>
                                                </div>
                                            @endif

                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                        <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                    </div>
                                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                            @if($product->fotos()->count())
                                                @foreach($product->fotos as $foto)
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ Croppa::url($foto->getUrlForCroppa(),100,100,['quadrant']) }}">
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ asset(Storage::disk('product')->url('/cr_100/null.jpg'))}}">
                                                </div>
                                            @endif
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title"> {{ $product->getFullName() }}</h1>
                                    <div class="product-bm-wrapper">
                                        @if( $foto = $product->firm->fotos)
                                            <figure class="brand">
                                                <img src="{{ Croppa::url($foto[0]->getUrlForCroppa(),100) }}" alt="Brand" width="102" height="48"/>
                                            </figure>
                                        @endif
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Производитель:
                                                <span class="product-category"><a href="{{route('manufacture.show',$product->firm->slug)}}">{{$product->firm->name}}</a></span>
                                            </div>
                                            <div class="product-sku">
                                                Коллекция: <span>{{$product->collection->name}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">


                                    <div class="product-short-desc">
                                        {{ $product->description }}
                                    </div>
                                    <div class="product-form product-variation-form product-size-swatch">
                                        <div class="flex-wrap d-flex align-items-center product-variations">
                                            <span class="size mr-1 font-weight-bold">В наличии</span>
                                            <span class="size mr-1   font-weight-bold">Имеется в шоуруме</span>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="font-size-md">Цена за м<sup>2</sup></div>
                                            <div class="product-price">
                                                <ins class="new-price">{{ Number::format($product->price_metr,locale: 'ru')}}</ins>
                                                <span class="font-size-md"> руб. </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="font-size-md">Цена за упаковку</div>
                                            <div class="product-price">
                                                <ins class="new-price">{{ Number::format($product->price_upak,locale: 'ru')}}</ins>
                                                <span class="font-size-md"> руб. </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="product-form product-variation-form product-size-swatch">
                                        <div class="flex-wrap d-flex align-items-center product-variations">
                                            @if($product->square)
                                                <span class="size mr-1">Площадь упаковки {{$product->square}} м.кв.</span>
                                            @endif
                                            @if($product->number_of_boards)
                                                <span class="size mr-1">В упаковке {{$product->number_of_boards}} шт.</span>
                                            @endif
                                            @if($product->packing_weight)
                                                <span class="size mr-1">Вес упаковки {{$product->number_of_boards}} кг.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="product-divider">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="font-size-md">Ваша цена</div>
                                            <input type="number" id="firstname" name="firstname" placeholder="" class="form-control form-control-md">
                                        </div>
                                        <div class="col-6">
                                            <div class="font-size-md">Укажите площадь</div>
                                            <div class="product-price">
                                                <ins class="new-price">{{ Number::format($product->price_metr,locale: 'ru')}}</ins>
                                                <span class="font-size-md"> руб. </span>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="product-divider">

                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1" max="10000">
                                                    <button class="quantity-plus w-icon-plus"></button>
                                                    <button class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-cart mr-1">
                                                <i class="w-icon-cart"></i> <span>В корзину</span>
                                            </button>
                                            <button class="btn btn-primary btn-cart">
                                                <i class="w-icon-heart"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">

                                        <div class="product-link-wrapper d-flex">
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            {{--                                            <a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        @include('front.pages.product.together')--}}
                        <section class="description-section">
                            <div class="title-link-wrapper no-link">
                                <h2 class="title title-link">Описание</h2>
                            </div>
                            <div class="pt-4 pb-1" id="product-tab-description">
                                <div class="" style="font-size: 16px">{!!   $product->text  !!}
                                </div>
                            </div>
                        </section>
                        <section class="description-section">
                            <div class="title-link-wrapper no-link">
                                <h2 class="title title-link">О производителе</h2>
                            </div>
                            <div class="pt-4 pb-1" id="product-tab-description">
                                <div class="" style="font-size: 16px">
                                </div>
                            </div>
                        </section>
                        <section class="description-section">
                            <div class="title-link-wrapper no-link">
                                <h2 class="title title-link">Спецификация</h2>
                            </div>
                            <div class="pt-4 pb-1" id="product-tab-description">
                                <div class="" style="font-size: 16px">
                                    <ul class="list-none">
                                        @foreach($product->attributeOptions as $attributeOption)
                                            <li>
                                                <label>{{$attributeOption->attribute->name}}</label>
                                                <p>{{$attributeOption->value}}</p>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </section>
                        <section class="mb-7">
                            <h2 class="title title-center mb-5">Without Space</h2>
                            <div class="row gutter-xs show-code-action">
                                <div class="col-md-3 col-6 mb-4">
                                    <div class="product product-simple text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/1.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-discount">-25%</label>
                                            </div>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                            сарапр
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Electronics Black Wrist
                                                    Watch ук укеуке уке уке</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-4">
                                    <div class="product product-simple text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/2.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Summer Sport Shoes</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top">5.00</span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$86.00</div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-4">
                                    <div class="product product-simple text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/3.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Charming Design
                                                    Watch</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$30.00</div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-4">
                                    <div class="product product-simple text-center">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Populated Gaming
                                                    Mouse</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$236.00</div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                        To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mb-2 mb-lg-6">
                            <h2 class="title title-center mb-5">Slide Up</h2>
                            <div class="row product-wrapper show-code-action">
                                <div class="col-md-3 col-6">
                                    <div class="product product-slideup-content">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/1.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-discount">-25%</label>
                                            </div>

                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="shop-banner-sidebar.html">Electronics</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="product-default.html">Electronics Black Wrist Watch</a>
                                            </h3>

                                            <div class="product-price">
                                                <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                            </div>
                                        </div>
                                        <div class="product-hidden-details">

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                                    <i class="w-icon-cart"></i><span>В корзину</span></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="product product-slideup-content">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/2.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="shop-banner-sidebar.html">Sports</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="product-default.html">Summer Sport Shoes</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top">5.00</span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-price">$86.00</div>
                                        </div>
                                        <div class="product-hidden-details">
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                                    <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="product product-slideup-content">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/3.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="shop-banner-sidebar.html">Electronics</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="product-default.html">Charming Design Watch</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-price">$30.00</div>
                                        </div>
                                        <div class="product-hidden-details">
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                                    <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="product product-slideup-content">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295" height="335">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-discount">-25%</label>
                                            </div>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="shop-banner-sidebar.html">Electronics</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="product-default.html">Populated Gaming Mouse</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-price">
                                                <ins class="new-price">$236.00</ins><del class="old-price">$300.00</del>
                                            </div>
                                        </div>
                                        <div class="product-hidden-details">
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                                    <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Related Products</h4>
                                <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/assets/images/products/default/5.jpg" alt="Product"
                                                     width="300" height="338"/>
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Drone</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$632.00</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/assets/images/products/default/6.jpg" alt="Product"
                                                     width="300" height="338"/>
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    <ins class="new-price">$263.00</ins>
                                                    <del
                                                            class="old-price">$300.00
                                                    </del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/assets/images/products/default/7-1.jpg" alt="Product"
                                                     width="300" height="338"/>
                                                <img src="/assets/images/products/default/7-2.jpg" alt="Product"
                                                     width="300" height="338"/>
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$23.00</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="/assets/images/products/default/8.jpg" alt="Product"
                                                     width="300" height="338"/>
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                   title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                   title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                   title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Fashionalble
                                                    Pencil</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$50.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Доставка в Москву и Московская область</h4>
                                            <p> В пределах МКАД – 2500 р.</p>
                                            <p>Доставка за МКАД – до 60 км: 2500 руб. + 50 руб./км.</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Удобная </h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Удобная оплата</h4>
                                            <p>Any back within 30 days</p>
                                            <p>Any back within 30 days</p>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <div class="widget widget-banner mb-9">
                                    <div class="banner banner-fixed br-sm">
                                        <figure>
                                            <img src="/assets/images/shop/banner3.jpg" alt="Banner" width="266"
                                                 height="220" style="background-color: #1D2D44;"/>
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                40<sup class="font-weight-bold">%</sup><sub
                                                        class="font-weight-bold text-uppercase ls-25">Off</sub>
                                            </div>
                                            <h4
                                                    class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                Ultimate Sale</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Banner -->

                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">More Products</h4>
                                    </div>

                                    <div class="swiper nav-top">
                                        <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                            <div class="swiper-wrapper">
                                                <div class="widget-col swiper-slide">
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="/assets/images/shop/13.jpg" alt="Product"
                                                                     width="100" height="113"/>
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="#">Smart Watch</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 100%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">$80.00 - $90.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="/assets/images/shop/14.jpg" alt="Product"
                                                                     width="100" height="113"/>
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="#">Sky Medical Facility</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 80%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">$58.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="/assets/images/shop/15.jpg" alt="Product"
                                                                     width="100" height="113"/>
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="#">Black Stunt Motor</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">$374.00</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-col swiper-slide">
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="/assets/images/shop/16.jpg" alt="Product"
                                                                     width="100" height="113"/>
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="#">Skate Pan</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 100%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">$278.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="/assets/images/shop/17.jpg" alt="Product"
                                                                     width="100" height="113"/>
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="#">Modern Cooker</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 80%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">$324.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="/assets/images/shop/18.jpg" alt="Product"
                                                                     width="100" height="113"/>
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a href="#">CT Machine</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 100%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">$236.00</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>

@endsection

@section('page-scripts')
    <script>
        function calculateSummPrice() {
            let price_upak = $('#price_upak').attr('price_upak');
            let count_up = $('#count_up').val();
            $('#price_summ').text((price_upak * count_up).toLocaleString('ru'));

        }
    </script>

@endsection