<div class="ec-pro-list-top ">
    <div class="fs-6">
        <div class="fw-bold">  {{$type->name}}  {{$selectFirm->name}} коллекции:</div>
        @foreach($selectFirm->collections()->whereHas('products', fn($query) => $query->where('type_id', '=', $type->id))->get() as $collection)
            <a href="{{route('type.index',['slug_type'=> $type->slug,'slug_firm'=>$selectFirm->slug,'slug_collection'=>$collection->slug])}}"
               class="text-decoration-underline @if($collection->slug ==Route::current()->parameter('slug_collection')) active-link @endif ">
                {{$collection->name}}
            </a>
            @if(!$loop->last)
                ,
            @endif
        @endforeach
    </div>
    <hr>
    <div>
        @if($img =  $selectFirm->foto)
            <img src="{{  Croppa::url($img->getUrlForCroppa(),150)}}" alt="{{$selectFirm->name}}" style="float: left; margin-right: 10px;margin-top: 5px">
        @endif
        <p style="font-size: 15px;"> Интернет-магазин «Пол России» предлагает купить {{$type->name}} {{$selectFirm->name}}
            по цене {{$selectFirm->products_min_price_metr}} - {{$selectFirm->products_max_price_metr}} руб за
            квадратный метр. Смотрите каталог ламината {{$selectFirm->name}} с
            качественными фото и подробными характеристиками. Моделей в каталоге - {{$selectFirm->products_count}} шт, среди них напольные покрытия пород
            дерева. Подробнее о производителе <a href="{{route('manufacture.show',$selectFirm->slug)}}" class="active-link"> {{$selectFirm->name}}</a>
            </p>

    </div>
</div>
