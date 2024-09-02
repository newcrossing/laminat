@extends('frontend.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')

@endsection

@section('content')
    <!-- Ec Shop page -->

    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid active"><img src="assets/images/icons/grid.svg"
                                                                         class="svg_img gl_svg" alt=""/></button>
                                <button class="btn btn-list"><img src="assets/images/icons/list.svg"
                                                                  class="svg_img gl_svg" alt=""/></button>
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
                                <select name="ec-select" id="ec-select">
                                    <option selected disabled>Position</option>
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">

                                @foreach($products as $product)

                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                        <div class="ec-product-inner">
                                            <a href="{{route('prod.show',$product->slug)}}">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                    <span href="/product-left-sidebar.html" class="image">

                                                        @if($product->fotos()->count())
                                                            @foreach($product->fotos as $foto)
                                                                @if ($loop->first)
                                                                    <img class="main-image" src="{{ $foto->getUrlCr()}}"/>
                                                                @endif
                                                                @if ($loop->iteration == 2)
                                                                    <img class="hover-image" src="{{ $foto->getUrlCr()}}"/>
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <img class="main-image" src="{{ asset(Storage::disk('product')->url('/cr_400/null.jpg'))}}"/>
                                                        @endif


                                                    </span>
                                                        <span class="percentage">20%</span>
                                                        @isset($product->have_sklad)
                                                            <span class="flags">
                                                            <span class="new">В наличии</span>
                                                        </span>
                                                        @endisset

                                                        @isset($product->have_room)
                                                            <span class="flags">
                                                       <span class="sale">В шоуруме</span>
                                                   </span>
                                                        @endisset

                                                        {{--                                                    <a href="#" class="quickview" data-link-action="quickview"--}}
                                                        {{--                                                       title="Quick view" data-bs-toggle="modal"--}}
                                                        {{--                                                       data-bs-target="#ec_quickview_modal"><img--}}
                                                        {{--                                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"--}}
                                                        {{--                                                                alt=""/></a>--}}
                                                        {{--                                                    <div class="ec-pro-actions">--}}
                                                        {{--                                                        --}}{{--                                                        <a href="compare.html" class="ec-btn-group compare"--}}
                                                        {{--                                                        --}}{{--                                                           title="Compare"><img src="assets/images/icons/compare.svg"--}}
                                                        {{--                                                        --}}{{--                                                                                class="svg_img pro_svg" alt=""/></a>--}}
                                                        {{--                                                        <button title="Добавить в корзину" class=" add-to-cart">--}}
                                                        {{--                                                            <img src="assets/images/icons/cart.svg" class="svg_img pro_svg" alt=""/> В корзину--}}
                                                        {{--                                                        </button>--}}
                                                        {{--                                                        <a class="ec-btn-group wishlist" title="Wishlist"><img--}}
                                                        {{--                                                                    src="assets/images/icons/wishlist.svg"--}}
                                                        {{--                                                                    class="svg_img pro_svg" alt=""/></a>--}}
                                                        {{--                                                    </div>--}}
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="ec-pro-content">
                                                <a class="fs-6 text-upper text-center text-muted">{{$product->type->name}}</a>
                                                <h5 class=" fs-6 text-center">
                                                    <a href="{{route('prod.show',$product->slug)}}">
                                                        {{$product->collection->firm->name}}   {{$product->collection->name}} {{$product->name}}
                                                    </a>
                                                </h5>

                                                <div class="ec-pro-list-desc">
                                                    {{$product->text}}
                                                </div>
                                                <div class="ec-price" style="justify-content: center;">
                                                    <div>
                                                        <span class="new-price" style="font-size: 28px"><sup class="mr-3 text-muted">за 1 м<sup>2</sup></sup>{{ Number::format($product->actualPriceMetr(),locale: 'ru')}} <sub>руб.</sub></span>
                                                    </div>

                                                </div>
                                                @if($product->oldPriceMetr())
                                                    <div class="ec-price" style="justify-content: center;">
                                                        <span class="old-price "
                                                              style="font-size: 28px">{{Number::format($product->oldPriceMetr(),locale: 'ru')}} </span><sub>руб.</sub>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <!-- Ec Pagination Start -->
                        <div class="ec-pro-pagination">
                            <span>Showing 1-12 of 21 item(s)</span>
                            <ul class="ec-pro-pagination-inner">
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>Filter Products By</h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Category</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" checked/> <a href="#">clothes</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox"/> <a href="#">Bags</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox"/> <a href="#">Shoes</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox"/> <a href="#">cosmetics</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox"/> <a href="#">electrics</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox"/> <a href="#">phone</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                            <ul>
                                                <li>
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox"/> <a href="#">Watch</a><span
                                                                class="checked"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox"/> <a href="#">Cap</a><span
                                                                class="checked"></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item ec-more-toggle">
                                                <span class="checked"></span><span id="ec-more-toggle">More
                                                    Categories</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Size Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Size</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" checked/><a href="#">S</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value=""/><a href="#">M</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value=""/> <a href="#">L</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value=""/><a href="#">XL</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value=""/><a href="#">XXL</a><span
                                                        class="checked"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Color item -->
                            <div class="ec-sidebar-block ec-sidebar-block-clr">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Color</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#c4d6f9;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#ff748b;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#000000;"></span></div>
                                        </li>
                                        <li class="active">
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#2bff4a;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#ff7c5e;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#f155ff;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#ffef00;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#c89fff;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#7bfffa;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span
                                                        style="background-color:#56ffc1;"></span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Price Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Price</h3>
                                </div>
                                <div class="ec-sb-block-content es-price-slider">
                                    <div class="ec-price-filter">
                                        <div id="ec-sliderPrice" class="filter__slider-price" data-min="0"
                                             data-max="250" data-step="10"></div>
                                        <div class="ec-price-input">
                                            <label class="filter__label"><input type="text"
                                                                                class="filter__input"></label>
                                            <span class="ec-price-divider"></span>
                                            <label class="filter__label"><input type="text"
                                                                                class="filter__input"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop page -->
@endsection
