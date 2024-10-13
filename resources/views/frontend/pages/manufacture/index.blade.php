@extends('frontend.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')

@endsection

@section('content')

    <div class="section-space-p">
        <!-- Vendor list Section Start -->
        <section class="section ec-catalog-multi-vendor">
            <div class="container">
                <div class="row">
                    @foreach($firms as $firm)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="ec-vendor-card">
                                <div class="ec-vendor-card-img mt-3 mb-5 ml-3 mr-3 pt-2 pr-4 pl-4" style="text-align: center; height: 90px">
                                    @if($img =  $firm->foto)
                                        <a href="{{route('manufacture.show',$firm->slug)}}">
                                            <img src="{{  Croppa::url($img->getUrlForCroppa(),300)}}" alt="{{$firm->name}}">
                                        </a>
                                    @endif
                                </div>
                                <div class="ec-vendor-card-info">
                                    <a href="{{route('manufacture.show',$firm->slug)}}">
                                        <h6 class="name">{{$firm->name}}</h6>
                                    </a>
                                    <p class="des"></p>
                                    <div class="typography" style="height: 150px; font-size: 16px">
                                        @foreach(
    \App\Models\Type::whereHas('productsPublic.collection.firm', fn($query) => $query->where('id', '=', $firm->id))
 ->withCount(['productsPublic' => function ($query) use ($firm) {
                $query->whereHas('firm', function ($query) use ($firm) {
                    $query->where('firms.id', $firm->id);
                });
            }])
->get() as $type)
                                            <div class="text-center text-bold ">
                                                <a href="sd">
                                                    <span style="text-decoration: underline">{{$type->name}}</span> ({{ $type->products_public_count}})
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a href="{{route('manufacture.show',$firm->slug)}}" class="btn btn-primary w-100">Вся продукция </a>
                                    <div class="row info">
                                        <div class="col-md-6 col-sm-6 border-rt">
                                            <div class="ec-catalog-ratings catalog-detail-card">
                                                <h6>Коллекции: {{$firm->collections_count}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="ec-catalog-pro-count catalog-detail-card">
                                                <h6>Товаров: {{$firm->products_count}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Vendor list Section End -->

    </div>
@endsection
