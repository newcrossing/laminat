@extends('backend.layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Главная')
{{-- vendor scripts --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/widgets.css')}}">
@endsection
@section('content')

    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-xl-4 col-md-6 col-12 dashboard-latest-update">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <h4 class="card-title">Продукция</h4>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-success " href="{{route('backend.product.create')}}">
                                Добавить продукцию
                            </a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pb-1 ps">
                            <ul class="list-group list-group-flush">
                                @foreach($products as  $product)
                                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                        <div class="list-left d-flex">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-primary m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx @if($product->public)  bxs-show text-success @else  bxs-hide text-danger  @endif                 font-size-base"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <a href="{{route('prod.show',$product->slug)}}">
                                                    <span class="list-title text-bold-600">{{$product->name}}</span>
                                                    <small class="text-muted d-block">{{$product->collection->firm->name}}, {{$product->collection->name}}</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <small> Добавлено</small>
                                            <div class="font-size-small text-primary">
                                                {{$product->created_at->format('H:m d.m.Y')}}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <div class="">Всего опубликовано: {{\App\Models\Product::public()->count()}} карточек </div>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-outline-info " href="{{route('backend.product.index')}}">
                                Посмотреть все
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 dashboard-users">
                <div class="row  ">
                    <!-- Statistics Cards Starts -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-3 col-12 dashboard-users-success">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                <i class="bx bx-briefcase-alt font-medium-5"></i>
                                            </div>
                                            <a class="line-ellipsis" href="{{route('backend.product.index')}}">Опубликованные товары</a>
                                            <h3 class="mb-0">{{\App\Models\Product::public()->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-user font-medium-5"></i>
                                            </div>
                                            <a class="line-ellipsis" href="{{route('backend.firm.index')}}">Производители</a>
                                            <h3 class="mb-0">{{\App\Models\Firm::public()->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-user font-medium-5"></i>
                                            </div>
                                            <a class="line-ellipsis" href="{{route('backend.collection.index')}}">Коллекции</a>
                                            <h3 class="mb-0">{{\App\Models\Collection::public()->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Revenue Growth Chart Starts -->
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('/b/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('/b/app-assets/js/scripts/cards/widgets.js')}}"></script>
@endsection
