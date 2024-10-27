@extends('frontend.layouts.main')

@section('title',"$type->name - цены, каталог | Купить $type->name в интернет-магазине «Пол России» , недорого")

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

                    @if(!empty($selectFirm) && empty($selectCollection))
                        <x-type.description-firm :select-firm="$selectFirm" :type="$type"/>
                    @endif
                    @if( !empty($selectCollection))
                        <x-type.description-collection :select-firm="$selectFirm" :type="$type" :select-collection="$selectCollection"/>
                    @endif


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
                    <form>
                        <div id="shop_sidebar">
                            <div class="ec-sidebar-heading">
                                <h1>{{$type->name}} ({{$type->products_public_count}})</h1>
                            </div>
                            <div class="ec-sidebar-wrap" style="">
                                <!-- Sidebar Category Block -->
                                <div class="ec-sidebar-block mb-4">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Вы выбрали</h3>
                                    </div>
                                    <div class="ec-sb-block-content es-price-slider">
                                        <div class="ec-price-filter  ">
                                            <ul class="ec-check-list">
                                                <li style="padding-left: 20px; padding-bottom: 0px">
                                                    {{$type->name}}
                                                </li>
                                                @if(!empty($selectFirm))
                                                    <li style="padding-left: 20px; padding-bottom: 0px">
                                                        {{$selectFirm->name}}
                                                    </li>
                                                @endif
                                                @if(!empty($selectCollection))
                                                    <li style="padding-left: 20px; padding-bottom: 0px">
                                                        {{$selectCollection->name}}
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-sidebar-wrap" >
                                <!-- Sidebar Category Block -->
                                <div class="ec-sidebar-block mb-4" >
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
                                                <li class="p-0">
                                                    <div class="ec-sidebar-block-item p-1" style="display: flex;    justify-content: space-between; @if(Route::current()->parameter('slug_firm')==$firm->slug) background-color: #73a5ff45;
                                                         border: 2px solid #5bb1ff; @endif">
                                                        <a href="{{route('type.index',['slug_type'=> $type->slug,'slug_firm'=>$firm->slug])}}" style="margin-left: 0px">
                                                            {{$firm->name}} </a>
                                                        <div>({{$firm->products_count}})</div>
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
                                        <div class="ec-sb-block-content ec-sidebar-dropdown">
                                            <ul>
                                                @foreach($attribute->attributeOptions as $attributeOption)
                                                    <li style="display: flex;    justify-content: space-between;">
                                                        <div class="ec-sidebar-block-item">
                                                            <input type="checkbox" name="options[]" value="{{$attributeOption->id}}"
                                                                    @checked(in_array($attributeOption->id,request()->get('options')??[] )) />
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

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" value="asd" class="btn btn-primary">Найти</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop page -->
@endsection
