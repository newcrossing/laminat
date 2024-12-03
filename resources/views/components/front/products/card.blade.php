{{--Карточка товара--}}
@php
    if (empty($col)){
        $col_lg ='col-md-2';
    }
    else {
        $col_lg ='col-md-'.$col;
    }
@endphp
@foreach($products as $product)
    @php
        /** @var \App\Models\Product  $product */
    $arrCookie = explode(",", Cookie::get('wishlist'));
    @endphp

    <div class="{{$col_lg}} col-6 mb-4">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="{{route('prod.show',$product->slug)}}">
                    @if($product->fotos()->count())
                        @foreach($product->fotos as $foto)
                            <img src="{{ Croppa::url($foto->getUrlForCroppa(),400,500,['quadrant']) }}" alt="{{$product->getFullName()}}">
                            @break
                        @endforeach
                    @else
                        <img src="{{ Croppa::url( \App\Models\Foto::getUrlForCroppaNull(),400,500,['quadrant']) }}">
                    @endif
                </a>

                <div class="product-label-group">
                    @if(!$product->isPriceMetr())
                        <label class="product-label label-discount">Акция</label>
                    @endif
                    @if($product->have_room)
                        <label class="product-label label-new">В шоуруме</label>
                    @endif
                </div>


                <div class="product-action-vertical" style="opacity: 100; visibility: visible">
                    <a href="#"  class="btn-product-icon btn-wishlist
                     @if(in_array($product->id, $arrCookie)) w-icon-heart-full @else w-icon-heart @endif "
                       title="@if(in_array($product->id, $arrCookie)) В избранном @else В избранное @endif" data-idwishlist="{{$product->id}}"></a>
                </div>
                <div class="product-action">

                </div>
            </figure>
            <div class="product-details">
                <div class="product-cat">
                    <a href="{{route('type.index',$product->type->slug)}}">{{$product->type->name}}</a>
                </div>
                <h4 class="product-name font-weight-normal" style="    white-space: normal;"><a
                            href="{{route('prod.show',$product->slug)}}"> {{$product->collection->firm->name}}   {{$product->collection->name}} {{$product->name}}</a></h4>
                <div class="product-pa-wrapper">

                    <div class="product-price">
                        <div class="ratings-container">
                            <span class="rating-reviews font-weight-normal text-normal">за 1 м<sup>2</sup></span>
                        </div>
                        <ins class="new-price">{{ Number::format($product->price_metr,locale: 'ru')}} <sub>руб.</sub></ins>
                        @if($product->oldPriceMetr())
                            <del class="old-price">{{Number::format($product->price_metr_sale,locale: 'ru')}} <sub>руб.</sub></del>
                        @endif
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">В корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach