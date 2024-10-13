<section class="section ec-category-section section-space-p">
    <div class="container">
        <div class="row margin-minus-b-15 margin-minus-t-15" data-animation="fadeIn">
            @foreach($types as $type)
                <x-menu.type_items name="{{$type->name}}" count="{{$type->products_public_count}}" link="{{route('type.index',$type->slug)}}"/>
            @endforeach
            <x-menu.type_items name="Производители" count="{{$countFirm}}" link="{{route('manufacture.list')}}"/>
            <x-menu.type_items name="Скидки" count="{{$countSale}}" link=""/>
        </div>
    </div>
</section>