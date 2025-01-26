@extends('front.layouts.main')

@section('title','Производители напольных покрытий - "Пол России"')
@section('keywords','Производители каталог фирм ламината паркет напольных покрытий ')
@section('description','Пол России - производители напольных покрытий. Большой ассортимент, расширенная гарантия на товар!')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Производители</h1>
                <h4 class="page-subtitle text-normal">напольных покрытий</h4>

            </div>
        </div>
        <!-- End of Page Header -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>


        <!-- Start of Page Content -->
        <div class="page-content pb-10 mb-2 mt-6">
            <div class="container">
                <section class="ultimate-section mb-10 mb-lg-8">
{{--                    <h2 class="title title-center mb-5">Производители</h2>--}}
                    <div class="row">
                        @foreach($firms as $firm)
                            <div class="col-3">
                                <div class="vendor-widget-banner">
                                    <figure class="ml-5 mr-5 mt-2" style="height: 100px">
                                        <a href="{{route('manufacture.show',$firm->slug)}}">
                                            @if($img =  $firm->foto)
                                                <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}" alt="{{$firm->name}}"/>
                                            @endif
                                        </a>
                                    </figure>

                                    <div class="vendor-details mt-3">

                                        <div class="vendor-personal">
                                            <h4 class="vendor-name">
                                                <a href="{{route('manufacture.show',$firm->slug)}}">{{$firm->name}}</a>
                                            </h4>

                                            <span class="vendor-product-count">Товаров: {{$firm->products_count}} </span>
                                            <a href="{{route('manufacture.show',$firm->slug)}}" class="visit-vendor-btn mb-0">Вся продукция </a>
                                        </div>

                                    </div>
                                    <div class="category category-group-image">
                                        <div class="category-content">

                                            <ul class="category-list">
                                                @foreach(
   \App\Models\Type::whereHas('productsPublic.collection.firm', fn($query) => $query->where('id', '=', $firm->id))
->withCount(['productsPublic' => function ($query) use ($firm) {
               $query->whereHas('firm', function ($query) use ($firm) {
                   $query->where('firms.id', $firm->id);
               });
           }])
->get() as $type)

                                                    <li><a href="{{route('type.index',[$type->slug,$firm->slug])}}">{{$type->name}} ({{ $type->products_public_count}})</a></li>



                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </section>


            </div>


            <!-- End of Container -->
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
