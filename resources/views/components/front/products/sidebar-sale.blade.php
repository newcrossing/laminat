<!-- End of Widget -->
@if($products)
    <div class="widget widget-collapsible widget-products">
        <h3 class="widget-title"><span>По акции</span><span class="toggle-btn"></span></h3>
        <div class="widget-body">
            @foreach($products as $product)
                <div class="product product-widget">
                    <figure class="product-media">
                        <a href="{{route('prod.show',$product->slug)}}">
                            @if($img = $product->fotos()->first())
                                <img class="prod-img" src="{{ Croppa::url($img->getUrlForCroppa(),300,300,['quadrant']) }}">
                            @else
                                <img class="prod-img" src="{{ Croppa::url( \App\Models\Foto::getUrlForCroppaNull(),300,300,['quadrant']) }}"/>
                            @endif
                        </a>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="{{route('type.index',$product->type->slug)}}">{{$product->type->name }}</a>
                        </div>
                        <h4 class="product-name">
                            <a href="{{route('prod.show',$product->slug)}}">{{$product->name }}</a>
                        </h4>
                        <div class="product-pa-wrapper">
                            <div class="product-price">
                                <ins class="new-price">{{ Number::format($product->priceMetr(),locale: 'ru')}} р.</ins>
                                @if($product->priceMetrOld())
                                    <del class="old-price">{{ Number::format($product->priceMetrOld(),locale: 'ru')}} р.</del>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!-- End of Widget -->