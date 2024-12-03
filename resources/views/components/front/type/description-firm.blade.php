<div class="row mb-4">
    <div class="col">
        <div class="title-link-wrapper">
            <h2 class="title title-link">{{$type->name}}  {{$selectFirm->name}}</h2>
            <a href="#" class="btn btn-dark btn-link btn-icon-right text-normal">По акции<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="tags">
            <label class="text-dark mr-2">Коллекции:</label>
            @foreach($selectFirm->collections()->whereHas('products', fn($query) => $query->where('type_id', '=', $type->id))->get() as $collection)
                <a href="{{route('type.index',[$type->slug,$selectFirm->slug,$collection->slug])}}"
                   class="tag @if($collection->slug ==Route::current()->parameter('slug_collection')) active-link @endif">
                    {{$collection->name}}
                </a>
            @endforeach

        </div>
        <p class="mb-4">
            @if($img =  $selectFirm->foto)
                <img src="{{  Croppa::url($img->getUrlForCroppa(),150)}}" alt="{{$selectFirm->name}}" style="float: left; margin-right: 10px;margin-top: 5px">
            @endif
            Интернет-магазин «Пол России» предлагает купить {{$type->name}} {{$selectFirm->name}}
            по цене {{$selectFirm->products_min_price_metr}} - {{$selectFirm->products_max_price_metr}} руб за
            квадратный метр. Смотрите каталог ламината {{$selectFirm->name}} с
            качественными фото и подробными характеристиками. Моделей в каталоге - {{$selectFirm->products_count}} шт, среди них напольные покрытия пород
            дерева. Подробнее о производителе <a href="{{route('manufacture.show',$selectFirm->slug)}}" class="active-link"> {{$selectFirm->name}}</a>
        </p>

    </div>

</div>
<hr>