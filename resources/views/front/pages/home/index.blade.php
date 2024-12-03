@extends('front.layouts.home')

@section('title','Ламинат | Купить в Москве и Московской области - интернет-магазин напольных покрытий «Пол России»')

@section('vendor-styles')
@endsection


@section('page-styles')
@endsection

@section('content')
    <main class="main">
        <x-front.sliders.home-main :sliders="\App\Models\Slider::where('public',true)->get()"/>

        <!-- End of Intro-section -->

        <div class="container">
            <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mb-10 appear-animate"
                 data-swiper-options="{
                    'loop': true,
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                    <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-shipping">
                                <i class="w-icon-truck"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-normal">Доставка</h4>
                            <p class="text-default">доставим по Москве и Московской обл.</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-payment">
                                <i class="w-icon-bag"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Услуги</h4>
                            <p class="text-default">Замер, дизайн, укладка</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                            <span class="icon-box-icon icon-money">
                                <i class="w-icon-money"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-normal">Безналичная оплата</h4>
                            <p class="text-default">Принимаем наличку, карты, переводы</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">
                            <span class="icon-box-icon icon-chat">
                                <i class="w-icon-chat"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-normal">Удобное время работы</h4>
                            <p class="text-default">На связи с 10:00 до 22:00</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Iocn Box Wrapper -->


            <h2 class="title title-underline mb-4 appear-animate">Производители</h2>
            <div class="swiper-container swiper-theme mb-10 pb-2 appear-animate" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                    @foreach($firms as $firm)
                        <div class="swiper-slide vendor-widget mb-0">

                            <div class="vendor-widget-banner">
                                <figure class="ml-5 mr-5 mt-2" style="height: 100px">
                                    <a href="{{route('manufacture.show',$firm->slug)}}">
                                        @if($img =  $firm->foto)
                                            <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}" alt="{{$firm->name}}" height="100"/>
                                        @endif
                                    </a>
                                </figure>

                                <div class="vendor-details mt-3">

                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="{{route('manufacture.show',$firm->slug)}}">{{$firm->name}}</a>
                                        </h4>

                                        <span class="vendor-product-count">Товаров: {{$firm->products_count}} </span>
                                        <a href="{{route('manufacture.show',$firm->slug)}}" class="visit-vendor-btn mb-0">Вся продукция </a>
                                    </div>

                                </div>
                                <div class="category category-group-image">
                                    <div class="category-content">

                                        <ul class="category-list">
                                            @foreach(
\App\Models\Type::whereHas('productsPublic.collection.firm', fn($query) => $query->where('id', '=', $firm->id))
->withCount(['productsPublic' => function ($query) use ($firm) {
           $query->whereHas('firm', function ($query) use ($firm) {
               $query->where('firms.id', $firm->id);
           });
       }])
->get() as $type)

                                                <li><a href="{{route('type.index',[$type->slug,$firm->slug])}}">{{$type->name}} ({{ $type->products_public_count}})</a></li>

                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    <!-- End of Vendor widget 2 -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- End of Swiper Container -->

            <x-front.home.top-type :types="$types"/>

            <!-- End of Row -->

            <div class="sale-banner banner br-sm appear-animate">
                <div class="banner-content">
                    <h4
                            class="content-left banner-subtitle text-uppercase mb-8 mb-md-0 mr-0 mr-md-4 text-secondary ls-25">
                            <span class="text-dark font-weight-bold lh-1 ls-normal">
                                </span>Распродажа</h4>
                    <div class="content-right">
                        <h3 class="banner-title text-uppercase font-weight-normal mb-4 mb-md-0 ls-25 text-white">
                                <span>Pay Only For
                                    <strong class="mr-10 pr-lg-10">Ламинат</strong>

                                    <strong class="mr-10 pr-lg-10">SPC ламинат</strong>

                                    <strong class="mr-10 pr-lg-10">Паркетная доска</strong>
                                </span>
                        </h3>
                        <a href="" class="btn btn-white btn-rounded">В распродажу
                            <i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End of Sale Banner -->


            <div class="title-link-wrapper appear-animate">
                <h2 class="title">Топ товаров по скидке</h2>
                <a href="" class="font-weight-bold ls-25 text-normal">
                    Смотреть все <i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
            <!-- End of Title Link Wrapper -->
            <div class="row cols-lg-4 cols-md-3 cols-xs-2 cols-1 appear-animate">
                <x-front.products.card :products="\App\Models\Product::inRandomOrder()->where('price_metr_sale', '<>', '')->limit(6)->get()"/>
                <!-- End of Product Wrap -->
            </div>
            <!-- End of Product Widget -->

            <div class="swiper-container swiper-theme brands-wrapper br-sm mb-10 appear-animate"
                 data-swiper-options="{
                    'loop': true,
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 8
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
                    @foreach(\App\Models\Firm::public()->get() as $firm)
                        @if($img = $firm->fotos()->first())
                            <div class="swiper-slide">
                                <figure>
                                    <img src="{{ Croppa::url($img->getUrlForCroppa(),null,100,['quadrant']) }}"
                                         alt="Brand" width="290" height="100"/>
                                </figure>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
            <!-- End of Brands Wrapper -->


        </div>
        <!-- End of Container -->
    </main>

@endsection

@section('page-scripts')


@endsection