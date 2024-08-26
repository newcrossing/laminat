
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
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
                        <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>