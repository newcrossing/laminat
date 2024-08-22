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


                                <div class="ec-vendor-card-img mt-3 mb-5" style="text-align: center">
                                    <img src="/storage/manufacture/Alpine_Floor_logo.png" alt="vendor img">
                                </div>

                                <div class="ec-vendor-card-info">
                                    <a href="catalog-single-vendor.html">
                                        <h6 class="name">{{$firm->name}}</h6>
                                    </a>
                                    <p class="des">( Россия )</p>
                                    <div class="" style="height: 150px">
{{--                                        @foreach($firm->collections as $collections)--}}
{{--                                            <div>{{$collections->products->count()}}</div>--}}
{{--                                        @endforeach--}}

                                    </div>
                                    <a href="{{route('manufacture.show',$firm->slug)}}" class="btn btn-primary w-100">Вся продукция </a>
                                    <div class="row info">
                                        <div class="col-md-6 col-sm-6 border-rt">
                                            <div class="ec-catalog-ratings catalog-detail-card">
                                                <h6>Посмотреть все</h6>
                                                <p>9 / 10</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="ec-catalog-pro-count catalog-detail-card">
                                                <h6>Products</h6>
                                                <p></p>

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
