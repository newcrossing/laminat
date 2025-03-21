{{--Карточка товара--}}
@php
    if (empty($col)){
        $col_lg ='col-lg-4';
    }
    else {
        $col_lg ='col-lg-'.$col;
    }
@endphp

@foreach($products as $product)
    <div class="{{$col_lg}} col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
        <div class="ec-product-inner">
            <a href="{{route('prod.show',$product->slug)}}">
                <div class="ec-pro-image-outer">
                    <div class="ec-pro-image">
                        <span class="image">
                            @if($product->fotos()->count())
                                @foreach($product->fotos as $foto)
                                    @if ($loop->first)
                                        <img class="main-image" src="{{ Croppa::url($foto->getUrlForCroppa(),400,500,['quadrant']) }}"/>
                                    @endif
                                    @if ($loop->iteration == 2)
                                        <img class="hover-image" src="{{ Croppa::url($foto->getUrlForCroppa(),400,500,['quadrant']) }}"/>
                                        @break
                                    @endif
                                @endforeach
                            @else
                                <img class="main-image" src="{{ Croppa::url( \App\Models\Foto::getUrlForCroppaNull(),400,500,['quadrant']) }}"/>
                            @endif
                        </span>
                        @if(!$product->isPriceMetr())
                            <span class="percentage">Акция</span>
                        @endif
                        @if($product->have_sklad)
                            <span class="percentage_have"><span class="new">В наличии</span></span>
                        @endif
                        @if($product->have_room)
                            <span class="percentage_room"><span class="sale">В шоуруме</span></span>
                        @endif
                    </div>
                </div>
            </a>
            <div class="ec-pro-content">
                <a class="fs-6 text-upper text-center text-muted" >{{$product->type->name}}</a>
                <h5 class=" fs-6 text-center">
                    <a href="{{route('prod.show',$product->slug)}}">
                        {{$product->collection->firm->name}}   {{$product->collection->name}} {{$product->name}}
                    </a>
                </h5>
                @if(isset($desc))
                    <div class="ec-pro-list-desc">
                        {{$product->description}}
                    </div>
                @endif

                <div class="ec-price" style="justify-content: center;">
                    <div>
                        <span class="new-price" style="font-size: 28px">
                            <sup class="mr-3 text-muted">за 1 м<sup>2</sup></sup>{{ Number::format($product->price_metr,locale: 'ru')}} <sub>руб.</sub>
                        </span>
                    </div>

                </div>
                @if($product->oldPriceMetr())
                    <div class="ec-price" style="justify-content: center;">
                        <span class="old-price " style="font-size: 28px">{{Number::format($product->price_metr_sale,locale: 'ru')}} </span><sub>руб.</sub>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach