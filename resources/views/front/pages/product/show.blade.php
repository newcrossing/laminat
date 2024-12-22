@extends('front.layouts.main')

@section('title',$product->getFullName())

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
                                    <h1 class="product-title">{{ $product->getFullName() }}</h1>
                                    <div class="product-bm-wrapper">
                                        @if( $foto = $product->firm->fotos)
                                            <figure class="brand">
                                                <img src="{{ Croppa::url($foto[0]->getUrlForCroppa(),100) }}" width="102" height="48"/>
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
                                                <ins class="">{{ Number::format($product->price_metr,locale: 'ru')}}</ins>
                                                <span class="font-size-md"> руб. </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="font-size-md">Цена за упаковку</div>
                                            <div class="product-price">
                                                <ins class="text-normal" id="price-upak"
                                                     data-price_upak="{{$product->price_upak}}"
                                                     data-square_upak="{{$product->square}}">
                                                    {{ Number::format($product->price_upak,locale: 'ru')}}
                                                </ins>
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
                                    @if($product->square)

                                        <div class="alert alert-primary  alert-button alert-block show-code-action mb-3" style="border: 2px solid">
                                            <h4 class=""><i class="w-icon-orders"></i> Калькулятор</h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="">Площадь помещения</div>
                                                    <input type="number" class="form-control form-control-md text-dark" id="square_room" onchange="calculateSummPrice()"/>
                                                    <p class="font-size-md text-light mb-0">Количество квадратных метров</p>
                                                </div>
                                                <div class="col-6">
                                                    <div class="">Запас на подрезку</div>
                                                    <select id="zapas_room" class="form-control form-control-md text-dark" onchange="calculateSummPrice()">
                                                        <option value="1">Без запаса</option>
                                                        <option value="1.05">5 %</option>
                                                        <option value="1.1">10 %</option>
                                                        <option value="1.15">15 %</option>
                                                    </select>
                                                    <p class="font-size-md text-light mb-0"><a href="#">Сколько</a> оставить на подрезку?</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class="font-size-md">Ваша цена</div>
                                            <div class="product-price">
                                                <ins class="new-price" id="price_summ">{{ Number::format($product->price_metr,locale: 'ru')}}</ins>
                                                <span class="font-size-md"> руб. </span>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="product-divider">


                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container" style="align-items: flex-start">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1" id="count_up" max="10000"  onchange="calculateSummPrice(false)">
                                                    <button class="quantity-plus w-icon-plus" onclick="calculateSummPrice(false)"></button>
                                                    <button class="quantity-minus w-icon-minus" onclick="calculateSummPrice(false)"></button>
                                                </div>
                                            </div>
                                            @if(in_array($product->id, session()->get(key: 'cart')?:[]))
                                                <button class="btn  btn-success btn-cart mr-1" data-id="{{$product->id}}" disabled>
                                                    <i class=" w-icon-check"></i><span>В корзине</span>
                                                </button>
                                            @else
                                                <button class="btn  btn-primary btn-cart mr-1" data-id="{{$product->id}}">
                                                    <i class="w-icon-cart"></i> <span> В корзину</span>
                                                </button>
                                            @endif

                                            @php
                                                $arrCookie = explode(",", Cookie::get('wishlist'));
                                            @endphp
                                            <button class="btn   @if(in_array($product->id, $arrCookie)) btn-success  @else btn-primary btn-outline @endif
                                            btn-rounded btn-wishlist   " data-idwishlist="{{$product->id}}" href="#">
                                                <i class="w-icon-heart "></i>&nbsp;
                                            </button>
                                        </div>
                                    </div>


                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                         <span class="icon-box-icon text-dark">
                                             <i class="w-icon-truck"></i>
                                         </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title text-normal">Доставка в Москву и Московская область</h4>
                                                <p>В пределах МКАД – 2500 р.</p>
                                                <p>Доставка за МКАД – до 60 км: 2500 руб. + 50 руб./км.</p>
                                                <p>Доставка в Щелково: согласовывается индивидуально</p>
                                            </div>
                                        </div>

                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                               <i class="w-icon-money"></i>
                                             </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Удобная оплата</h4>
                                                <p>Наличными</p>
                                                <p>Банковской картой</p>
                                                <p>По реквизитам</p>
                                                <p>Безналичная оплата по реквизитам с НДС</p>
                                                <p>Корпоративной бизнес-картой</p>
                                            </div>
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
                                <div class="font-size-normal lh-1 child-p" style="    text-align: justify;">
                                    {!!   $product->text  !!}
                                </div>
                            </div>
                        </section>

                        <section class="mb-7">
                            <h2 class="title title-center mb-5">Аналоги </h2>
                            <div class="row gutter-xs show-code-action">
                                <x-front.products.card :products="\App\Models\Product::limit(8)->get()" :col="3"/>
                            </div>
                        </section>


                    </div>
                    <!-- End of Main Content -->

                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content">
                            <div class="pin-wrapper" style="height: 1742.59px;">
                                <div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 279.986px;">


                                    <div class="widget widget-collapsible widget-time">
                                        <h3 class="widget-title"><span>Параметры</span>
                                            <span class="toggle-btn"></span></h3>
                                        <ul class="widget-body font-size-normal" style="display: block;">
                                            <li class="pt-0 pb-2">
                                                <span>Тип</span>
                                                <a href="{{ route('type.index',$product->type->slug)  }}">
                                                    {{$product->type->name}}
                                                </a>
                                            </li>
                                            <li class="pt-0 pb-2">
                                                <span>Производитель</span>
                                                <a href="{{route('type.index',[ $product->type->slug,$product->collection->firm->slug])}}">
                                                    {{$product->firm->name}}
                                                </a>
                                            </li>
                                            <li class="pt-0 pb-2">
                                                <span>Коллекция</span>
                                                <a href="{{route('type.index',[ $product->type->slug,$product->collection->firm->slug,$product->collection->slug])}}">
                                                    {{$product->collection->name}}
                                                </a>
                                            </li>
                                            @foreach($product->attributeOptions as $attributeOption)
                                                <li class="pt-0 pb-2">
                                                    <span> {{$attributeOption->attribute->name}}</span>
                                                    <a href="">{{$attributeOption->value}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                    <x-front.products.sidebar-sale/>

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
        function calculateSummPrice(doing = true) {
            let price_upak = $('#price-upak').data('price_upak');
            let square_upak = $('#price-upak').data('square_upak');
            let square_room = $('#square_room').val();
            let zapas_room = $('#zapas_room').val();
            let count_up = $('#count_up').val();

            if (doing) {
                count_up = Math.ceil(square_room * zapas_room / square_upak);
                $('#count_up').val(count_up);
            } else {
                $('#square_room').val('');
            }

            $('#price_summ').text((price_upak * count_up).toLocaleString('ru'));
            $('#price_summ_buttom').text((price_upak * count_up).toLocaleString('ru'));
        }
    </script>
@endsection