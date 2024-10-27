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
                            <div class="row cart-dom">
                                <div class="single-pro-img ">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            @if($product->fotos()->count())
                                                @foreach($product->fotos as $foto)
                                                    <div class="single-slide ">
                                                        <a class="popup-gallery" href="{{ asset(Storage::disk('product')->url('/800/'). $foto->full_name_file)}}">
                                                            <img class=" img-responsive @if ($loop->first) cart-img @endif"
                                                                 src="{{ Croppa::url($foto->getUrlForCroppa(),400,500,['quadrant']) }}">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <img class="main-image cart-img" src="{{ asset(Storage::disk('product')->url('/cr_400/null.jpg'))}}"/>
                                            @endif
                                        </div>
                                        <div class="single-nav-thumb">
                                            @if($product->fotos()->count())
                                                @foreach($product->fotos as $foto)
                                                    <div class="single-slide zoom-image-hover">
                                                        <img class="img-responsive" src="{{ Croppa::url($foto->getUrlForCroppa(),100,100,['quadrant']) }}">
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ asset(Storage::disk('product')->url('/cr_100/null.jpg'))}}">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc">
                                    <div class="single-pro-content ">
                                        <h5 class="ec-single-title cart-name">  {{$product->collection->firm->name}}   {{$product->collection->name}} {{ $product->name }}</h5>
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

                                        <div class="ec-single-price-stoke mt-3">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">Цена за м<sup>2</sup></span>
                                                <span class="new-price">{{ Number::format($product->price_metr,locale: 'ru')}} <sub>руб.</sub></span>
                                                @if($product->oldPriceMetr())
                                                    <span class="old-price" style="font-size: 20px"><del> {{ Number::format($product->price_metr_sale,locale: 'ru')}}</del> <sub>руб.</sub></span>
                                                @endif
                                            </div>
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">Цена за упаковку </span>
                                                <span class="new-price cart-price-one" id="price_upak" price_upak="{{$product->price_upak}}">{{ Number::format($product->price_upak,locale: 'ru')}} <sub>руб.</sub></span>
                                                @if($product->oldPriceUpak())
                                                    <span class="old-price" style="font-size: 20px"><del> {{ Number::format($product->price_upak_sale,locale: 'ru')}}</del> <sub>руб.</sub></span>
                                                @endif
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-6 ">
                                                <div class="fs-6">Укажите площадь</div>
                                            </div>
                                            <div class="col-6 ">
                                                <input class="qty-plus-minus2" type="text" name="ec_qtybtn" id="square_user" value="1" style=""/> м
                                            </div>
                                        </div>

                                        {{--                                        <div class="ec-single-price-stoke pl-3 pr-3 pt-3" style="background-color: #d2e4fc;border: thick double #98e0fd;">--}}
                                        {{--                                            <div class="ec-single-price">--}}
                                        {{--                                                <span class="ec-single-ps-title">Площадь, м<sup>2</sup></span>--}}
                                        {{--                                                <input class="qty-plus-minus2" type="text" name="ec_qtybtn" id="square_user" value="1" style=""/>--}}
                                        {{--                                                <div class="mute" id="square_up" square_up="{{$product->square}}">В упаковке {{$product->square}} м<sup>2</sup></div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <div class="row">
                                            <div class="col-6 ">
                                                <div class="fs-6">Общая цена</div>
                                            </div>
                                            <div class="col-6 ">
                                                <div>
                                                    <span class="ec-single-sku fs-2 font-weight-bold" id="price_summ">
                                                        {{ Number::format($product->price_upak,locale: 'ru')}}
                                                    </span>
                                                    руб.
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ec-single-qty">
                                            <div class="qty-plus-minus">
                                                <input class="qty-input cart-count" type="text" name="ec_qtybtn" id="count_up" value="1"/>
                                            </div>
                                            <div class="ec-single-cart ">
                                                <button class="btn btn-primary add-to-cart">В корзину</button>
                                            </div>
                                            <div class="ec-single-wishlist">
                                                <a class="ec-btn-group wishlist" title="Wishlist">
                                                    <img src="/assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt=""/></a>
                                            </div>
                                            <div class="ec-single-quickview">
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#ec_quickview_modal">
                                                    <img src="/assets/images/icons/quickview.svg" class="svg_img pro_svg" alt=""/></a>
                                            </div>
                                        </div>

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
                                <h3 class="ec-sidebar-title">Параметры</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <ul style="display: block;">
                                            <li>
                                                <div class="ec-sidebar-sub-item">
                                                    <div style="font-weight: normal; text-transform: none;cursor: default;">
                                                        Тип
                                                        <span>
                                                            <a href="{{ route('type.index',$product->type->slug)  }}"
                                                               style="font-weight: normal; text-transform: none;color: #0d6efd;  text-decoration: underline;">
                                                                {{$product->type->name}}
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item">
                                                    <div style="font-weight: normal; text-transform: none;cursor: default;">
                                                        Производитель
                                                        <span>
                                                            <a href="{{route('type.index',['slug_type'=> $product->type->slug,'slug_firm'=>$product->collection->firm->slug])}}"
                                                               class="active-link"
                                                               style="font-weight: normal; text-transform: none;  text-decoration: underline; ">
                                                                {{$product->firm->name}}
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-sub-item">
                                                    <div style="font-weight: normal; text-transform: none; cursor: default;">
                                                        Коллекция
                                                        <span>
                                                            <a href="{{route('type.index',['slug_type'=> $product->type->slug,'slug_firm'=>$product->collection->firm->slug,'slug_collection'=>$product->collection->slug])}}"
                                                               style="font-weight: normal; text-transform: none ;color: #0d6efd;  text-decoration: underline;">
                                                                {{$product->collection->name}}
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            @foreach($product->attributeOptions as $attributeOption)
                                                <li>
                                                    <div class="ec-sidebar-sub-item">
                                                        <div style="font-weight: normal; text-transform: none;cursor: default;">
                                                            {{$attributeOption->attribute->name}}
                                                            <span>
                                                                <a href="as" style="font-weight: normal; text-transform: none ">{{$attributeOption->value}}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- Sidebar Category Block -->
                    </div>

                    <x-products.sidebar-sale/>


                </div>
                <!-- Sidebar Area Start -->
            </div>
        </div>
    </section>

    <x-products.related :idproduct="$product->id"/>
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
