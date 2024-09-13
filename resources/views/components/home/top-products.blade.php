<!-- ec Banner Section Start -->
@if(count($products))

    <section class="ec-banner section section-space-p">
        <h2 class="d-none">Скидки</h2>

        <div class="container">
            <!-- ec Banners Start -->
            <div class="ec-banner-inner">
                <!--ec Banner Start -->
                <div class="ec-banner-block ec-banner-block-2">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInRight">
                                <div class="bnr-overlay">
                                    @if($img = $product->fotos()->first())
                                        <img src="{{ Croppa::url($img->getUrlForCroppa(),800,400,['quadrant']) }}"/>
                                    @else
                                        <img class="main-image" src="{{ Croppa::url( \App\Models\Foto::getUrlForCroppaNull(),800,400,['quadrant']) }}"/>
                                    @endif

                                    <div class="banner-text">
                                    <span class="ec-banner-stitle"
                                          style="font-weight: bold;  color:white;  text-shadow:1px 0 0 #000000,0 1px 0 #000000,-1px 0 0 #000000,0 -1px 0 #000000;">
                                        {{$product->type->name}}
                                    </span>
                                        <span class="ec-banner-title" style="-webkit-text-stroke:1px #0b0b0b;  -webkit-text-fill-color:#fdfdfd;">{{$product->getFullName()}}</span>
                                        <div>
                                            <span class=""
                                                  style="font-size: 30px;font-weight: bold;  color:#de6060;  text-shadow:1px 0 0 #da0101,0 1px 0 #d50606,-1px 0 0 #f60000,0 -1px 0 #000000;">
                                               {{ Number::format($product->actualPriceMetr(),locale: 'ru')}} <sub>руб.</sub>
                                            </span>
                                            <span style="font-size: 25px;font-weight: bold;  color:#2f2e2e;  margin-left: 10px">
                                                <strike>   {{ Number::format($product->oldPriceMetr(),locale: 'ru')}} </strike><sub>руб.</sub>
                                            </span>
                                        </div>


                                    </div>
                                    <div class="banner-content">
                                        <span class="ec-banner-btn"><a href="{{route('prod.show',$product->slug)}}">Заказть</a></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <!-- ec Banner End -->
                </div>
                <!-- ec Banners End -->
            </div>
        </div>
    </section>
@endif
<!-- ec Banner Section End -->