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

                    <x-products.sorting/>

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                                <x-products.card :products="$products" desc="1"/>
                            </div>
                        </div>

                        {{ $products->links('vendor.pagination.default') }}

                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">

                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>{{$type->name}} ({{$type->products_public_count}})</h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block mb-4">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Цена</h3>
                                </div>
                                <div class="ec-sb-block-content es-price-slider">
                                    <div class="ec-price-filter">
                                        <div id="ec-sliderPrice" class="filter__slider-price" data-min="0" data-max="23000" data-step="10"></div>
                                        <div class="ec-price-input">
                                            <label class="filter__label">
                                                от <input type="text" class="filter__input ml-1 mr-1">
                                            </label>

                                            <label class="filter__label">
                                                до <input type="text" class="filter__input ml-1 mr-1"> руб.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Производители</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        @foreach($firms as $firm)
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" value="" />
                                                    <a href="#">{{$firm->name}} ({{$firm->products_count}})</a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Size Block -->
                            @foreach($attributes as $attribute)
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">{{$attribute->name}}</h3>
                                    </div>
                                    <div class="ec-sb-block-content">
                                        <ul>
                                            @foreach($attribute->attributeOptions as $attributeOption)
                                                <li style="display: flex;    justify-content: space-between;">
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox" value=""/>
                                                        <a href="#" style="text-transform: none;">{{$attributeOption->value}} </a>
                                                        <span class="checked"></span>
                                                    </div>
                                                    <div>
                                                        ({{$attributeOption->products_count}})
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Sidebar Color item -->
                            <div class="ec-sidebar-block ec-sidebar-block-clr">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Color</h3>
                                </div>
                                <div class="ec-sb-block-content" >
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

                                    </ul>
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
