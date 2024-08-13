@extends('frontend.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup.css"/>
@endsection


@section('page-styles')

@endsection

@section('content')
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-9 order-lg-last col-md-12 order-md-first">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">


                                <div class="single-pro-img">

                                    <div class="single-product-scroll">

                                        <div class="single-product-cover">

                                            @if($product->fotos()->count())
                                                @foreach($product->fotos as $foto)
                                                    <div class="single-slide ">
                                                        <a class="popup-gallery" href="{{ asset(Storage::disk('product')->url('/800/'). $foto->full_name_file)}}"
                                                        >
                                                            <img class=" img-responsive"
                                                                 src="{{ asset(Storage::disk('product')->url('/cr_400/'). $foto->full_name_file)}}" alt="portfolio img">
                                                        </a>

                                                    </div>

                                                @endforeach
                                            @else
                                                <img class="main-image"
                                                     src="{{ asset(Storage::disk('product')->url('/300/0cd62333-c91b-4860-ae5c-fc41f6d53487.jpg'))}}"/>
                                            @endif


                                        </div>
                                        <div class="single-nav-thumb">
                                            @if($product->fotos()->count())
                                                @foreach($product->fotos as $foto)
                                                    <div class="single-slide zoom-image-hover">
                                                        <img class="img-responsive" src="{{ asset(Storage::disk('product')->url('/cr_100/'). $foto->full_name_file)}}"
                                                             alt="">
                                                    </div>
                                                @endforeach
                                            @else
                                                <img class="main-image"
                                                     src="{{ asset(Storage::disk('product')->url('/300/0cd62333-c91b-4860-ae5c-fc41f6d53487.jpg'))}}"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc">
                                    <div class="single-pro-content">

                                        <h5 class="ec-single-title">   {{$product->collection->firm->name}}   {{$product->collection->name}} {{ $product->name }}</h5>
                                        <div class="ec-single-rating-wrap">

                                            <span class="ec-read-review"><a href="#ec-spt-nav-review">Посмотреть похожие товары</a></span>
                                        </div>
                                        <div class="ec-single-desc">{{ $product->description }}</div>
                                        <div class="typography row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <ul class="ec-check-list">
                                                    <li>В НАЛИЧИИ НА СКЛАДЕ</li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <ul class="ec-check-list">
                                                    <li>ИМЕЕТСЯ В ШОУРУМЕ</li>
                                                </ul>
                                            </div>
                                        </div>

                                        {{--                                        <div class="ec-single-sales">--}}
                                        {{--                                            <div class="ec-single-sales-inner">--}}
                                        {{--                                                <div class="ec-single-sales-title">sales accelerators</div>--}}
                                        {{--                                                <div class="ec-single-sales-visitor">Не упусти<span> скидку</span>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="ec-single-sales-progress">--}}
                                        {{--                                                    <span class="ec-single-progress-desc">Обрати внимание, осталось 198 упаковок</span>--}}
                                        {{--                                                    <span class="ec-single-progressbar"></span>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="ec-single-sales-countdown">--}}
                                        {{--                                                    <div class="ec-single-countdown"><span--}}
                                        {{--                                                                id="ec-single-countdown"></span></div>--}}
                                        {{--                                                    <div class="ec-single-count-desc">Успей</div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="ec-single-price-stoke mt-3">

                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">Цена за м<sup>2</sup></span>
                                                <span class="new-price">{{ Number::format($product->actualPriceMetr(),locale: 'ru')}} <sub>руб.</sub></span>
                                                @if($product->oldPriceMetr())
                                                    <span class="old-price" style="font-size: 20px"><del> {{ Number::format($product->oldPriceMetr(),locale: 'ru')}}</del> <sub>руб.</sub></span>
                                                @endif
                                            </div>
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">Цена за упаковку </span>
                                                <span class="new-price">{{ Number::format($product->actualPriceUpak(),locale: 'ru')}} <sub>руб.</sub></span>
                                                @if($product->oldPriceUpak())
                                                    <span class="old-price" style="font-size: 20px"><del> {{ Number::format($product->oldPriceUpak(),locale: 'ru')}}</del> <sub>руб.</sub></span>
                                                @endif
                                            </div>
                                            @isset($product->square)
                                                <div class="ec-single-stoke">
                                                    <span class="ec-single-ps-title text-light-success">Площадь упаковки</span>
                                                    <span class="ec-single-sku"> {{ $product->square }} м<sup>2</sup></span>
                                                </div>
                                            @endisset

                                        </div>


                                        <div class="ec-single-qty">
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" type="text" name="ec_qtybtn" value="1"/>
                                            </div>
                                            <div class="ec-single-cart ">
                                                <button class="btn btn-primary">В корзину</button>
                                            </div>
                                            <div class="ec-single-wishlist">
                                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="/assets/images/icons/wishlist.svg" class="svg_img pro_svg"
                                                            alt=""/></a>
                                            </div>
                                            <div class="ec-single-quickview">
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#ec_quickview_modal"><img
                                                            src="/assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                            alt=""/></a>
                                            </div>
                                        </div>
                                        {{--                                        <div class="ec-single-social">--}}
                                        {{--                                            <ul class="mb-0">--}}
                                        {{--                                                <li class="list-inline-item facebook"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-facebook"></i></a></li>--}}
                                        {{--                                                <li class="list-inline-item twitter"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-twitter"></i></a></li>--}}
                                        {{--                                                <li class="list-inline-item instagram"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-instagram"></i></a></li>--}}
                                        {{--                                                <li class="list-inline-item youtube-play"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-youtube-play"></i></a></li>--}}
                                        {{--                                                <li class="list-inline-item behance"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-behance"></i></a></li>--}}
                                        {{--                                                <li class="list-inline-item whatsapp"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-whatsapp"></i></a></li>--}}
                                        {{--                                                <li class="list-inline-item plus"><a href="#"><i--}}
                                        {{--                                                                class="ecicon eci-plus"></i></a></li>--}}
                                        {{--                                            </ul>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <div class="ec-single-pro-tab">
                        <div class="ec-single-pro-tab-wrapper">
                            <div class="ec-single-pro-tab-nav">
                                <ul class="nav nav-tabs">
                                    @if($product->text)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                               data-bs-target="#ec-spt-nav-details" role="tablist">Описание</a>
                                        </li>
                                    @endif

                                    <li class="nav-item">
                                        <a class="nav-link @empty($product->text) active  @endempty" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                           role="tablist">Характеристики </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                           role="tablist">Отзывы</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content  ec-single-pro-tab-content">
                                @if($product->text)
                                    <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                        <div class="ec-single-pro-tab-desc">
                                            {!!   $product->text  !!}
                                        </div>
                                    </div>
                                @endif
                                <div id="ec-spt-nav-info" class="tab-pane fade @empty($product->text) active  @endempty">
                                    <div class="ec-single-pro-tab-moreinfo">
                                        <ul>
                                            @foreach($product->attributeOptions as $attributeOption)
                                                <li><span>{{$attributeOption->attribute->name}}</span> {{$attributeOption->value}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div id="ec-spt-nav-review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="ec-t-review-wrapper">
                                            <div class="ec-t-review-item">
                                                <div class="ec-t-review-avtar">
                                                    <img src="/assets/images/review-image/1.jpg" alt=""/>
                                                </div>
                                                <div class="ec-t-review-content">
                                                    <div class="ec-t-review-top">
                                                        <div class="ec-t-review-name">Jeny Doe</div>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-t-review-item">
                                                <div class="ec-t-review-avtar">
                                                    <img src="/assets/images/review-image/2.jpg" alt=""/>
                                                </div>
                                                <div class="ec-t-review-content">
                                                    <div class="ec-t-review-top">
                                                        <div class="ec-t-review-name">Linda Morgus</div>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="ec-ratting-content">
                                            <h3>Add a Review</h3>
                                            <div class="ec-ratting-form">
                                                <form action="#">
                                                    <div class="ec-ratting-star">
                                                        <span>Your rating:</span>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-ratting-input">
                                                        <input name="your-name" placeholder="Name" type="text"/>
                                                    </div>
                                                    <div class="ec-ratting-input">
                                                        <input name="your-email" placeholder="Email*" type="email"
                                                               required/>
                                                    </div>
                                                    <div class="ec-ratting-input form-submit">
                                                        <textarea name="your-commemt"
                                                                  placeholder="Enter Your Comment"></textarea>
                                                        <button class="btn btn-primary" type="submit"
                                                                value="Submit">Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-pro-leftside ec-common-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">clothes</div>
                                        <ul style="display: block;">
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">shoes</div>
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">bag</div>
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">cosmetics</div>
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">electronics</div>
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">phone</div>
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">accessories</div>
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Men <span>-25</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Women <span>-52</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Boy <span>-40</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item"><a href="#">Girl <span>-35</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Category Block -->
                    </div>
                    <div class="ec-sidebar-slider">
                        <div class="ec-sb-slider-title">Best Sellers</div>
                        <div class="ec-sb-pro-sl">
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/1_1.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Beautiful Teddy Bear</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/2_1.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Gym Backpack</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/3_1.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Beautiful Purse for Women</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/4_1.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Wool Felt Long Brim Hat</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/5_1.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Black Leather Belt</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/6_2.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Beautiful Tee for Women</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/7_1.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Cotton Shirt for Men</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="ec-sb-pro-sl-item">
                                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                                src="/assets/images/product-image/8_2.jpg" alt="product"/></a>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">I Watch for Men</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="old-price">$100.00</span>
                                            <span class="new-price">$80.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Area Start -->
            </div>
        </div>
    </section>
@endsection
