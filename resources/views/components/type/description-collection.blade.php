<div class="ec-pro-list-top ">
    <div class="fs-6">
        <div class="fw-bold">  {{$type->name}}  {{$selectFirm->name}} коллекция {{$selectCollection->name}}:</div>
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
        <p style="font-size: 15px;"> Интернет-магазин «Пол России» предлагает купить {{$type->name}} {{$selectFirm->name}} коллекции {{$selectCollection->name}}
            по выгодной цене.

            Каталог представленный вашему вниманию, включает напольные покрытия популярных пород дерева. Моделей в каталоге - {{$selectCollection->products_count}} шт,
            цена ламината коллекции {{$selectCollection->name}} от {{$selectCollection->products_min_price_metr}} руб за квадратный метр.


         </p>
    </div>
</div>
