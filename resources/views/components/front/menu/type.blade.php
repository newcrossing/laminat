<div class="container mb-3 mt-2">
    @foreach($types as $type)
        <x-front.menu.type_items name="{{$type->name}}" count="{{$type->products_public_count}}" link="{{route('type.index',$type->slug)}}"/>
    @endforeach
    <x-front.menu.type_items name="Производители" count="{{$countFirm}}" link="{{route('manufacture.list')}}"/>
    <x-front.menu.type_items name="<i class='w-icon-sale'></i> Скидки" count="{{$countSale}}" link="{{route('sale')}}"/>
</div>