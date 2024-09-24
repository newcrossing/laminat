@php use App\Models\Product; @endphp
@if($products_sale  = Product::where('price_metr_sale','>',0)->public()->limit(16)->get())
    <div class="ec-sidebar-slider">
        <div class="ec-sb-slider-title">По акции</div>
        <div class="ec-sb-pro-sl">
            @foreach($products_sale as $product)
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="{{route('prod.show',$product->slug)}}" class="sidekka_pro_img">
                            @if($img = $product->fotos()->first())
                                <img class="prod-img" src="{{ Croppa::url($img->getUrlForCroppa(),300,300,['quadrant']) }}">
                            @else
                                <img class="prod-img" src="{{ Croppa::url( \App\Models\Foto::getUrlForCroppaNull(),300,300,['quadrant']) }}"/>
                            @endif
                        </a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="{{route('prod.show',$product->slug)}}">{{$product->name }}</a></h5>
                            <div class="small">
                                <a href="{{route('type.index',$product->type->slug)}}">{{$product->type->name }}</a>
                            </div>
                            <span class="ec-price mt-2">
                                <span class="old-price">{{ Number::format($product->priceMetr(),locale: 'ru')}} р.</span>
                                <span class="new-price">{{ Number::format($product->priceMetrOld(),locale: 'ru')}} р.</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

