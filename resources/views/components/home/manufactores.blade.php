<!--  Top Vendor Section Start -->
<section class="section section-space-p" id="vendors">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Производители</h2>
                    <h2 class="ec-title">Производители</h2>
                    <p class="sub-title">Посмотреть <a href="{{route('manufacture.list')}}">всех производителей</a></p>
                </div>
            </div>
        </div>
        <div class="row margin-minus-t-15 margin-minus-b-15">
            @foreach($firms as $firm)
                <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
                    <div class="ec-vendor-card">
                        <div class="ec-vendor-detail mb-0">
                            <div class="ec-vendor-avtar">
                                @if($img = $firm->fotos()->first())
                                    <img src="{{ Croppa::url($img->getUrlForCroppa(),200) }}"/>
                                @else
                                    <img class="main-image" src="{{ Croppa::url( \App\Models\Foto::getUrlForCroppaNull(),200,200,['quadrant']) }}"/>
                                @endif
                            </div>
                            <div class="ec-vendor-info">
                                <a href="{{route('manufacture.show',$firm->slug)}}" class="name">{{$firm->name}}</a>
                                @if($firm->products_count)
                                    <p class="prod-count mt-1 mb-0">
{{--                                        {{trans_choice(':val товар|:val товара|:val товаров',$firm->products_count,['val' => $firm->products_count])}}--}}
                                        {{trans_choice('messages.product',$firm->products_count,['val' => $firm->products_count])}}
                                    </p>
                                @endif

                                @if($firm->sale_products_count)
                                    <p class="prod-count mt-0">
                                        {{trans_choice('messages.sale',$firm->sale_products_count,['val' => $firm->sale_products_count])}}</p>
                                    </p>
                                @endif

                            </div>
                        </div>
                        <div class="">
                            @foreach( \App\Models\Type::withWhereHas('productsPublic.collection.firm', fn($query) => $query->where('id', '=', $firm->id))->withCount('productsPublic')->get() as $type)
                                <div class="text-center text-bold ">
                                    <a href="">
                                        <span style="text-decoration: underline">{{$type->name}}</span> ({{ $type->products_public_count}})
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!--  Top Vendor Section End -->