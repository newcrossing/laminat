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



            @if(count($orders))
                <div class=" col-12 dashboard-latest-update" >
                    <div class="card" style="border: 2px solid #9a183d;">
                        <div class="card-header d-flex justify-content-between align-items-center pb-50">
                            <h4 class="card-title">Заказы <small> (новые)</small></h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body p-0 pb-0 ps">
                                <ul class="list-group list-group-flush">
                                    @foreach($orders as  $order)
                                        <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                            <div class="list-left d-flex">
                                                <div class="list-icon mr-1">
                                                    <div class="avatar bg-rgba-primary m-0">
                                                        <span class="badge {{$order->status->color()}}">{{$order->status->name()}}</span>
                                                    </div>
                                                </div>
                                                <div class="list-content mr-2">
                                                    <a class="text-bold-600" href="{{route('backend.order.edit',$order->id)}}">
                                                        {{ $order->order_number }}
                                                    </a>
                                                </div>
                                                <div class="list-content mr-2">
                                                    @foreach($order->products as $product)
                                                        @php
                                                            /** @var \App\Models\Product  $product */
                                                        @endphp
                                                        <div class="small text-muted">{{$product->getFullName()}} x {{$product->pivot->count}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div>
                                                <small> Добавлен</small>
                                                <div class="font-size-small text-primary">
                                                    {{$order->created_at->diffForHumans()}}
                                                </div>
                                            </div>
                                            <div>
                                                <small> Сумма заказа</small>
                                                <div class="font-size-xl text-success text-bold-700">
                                                    {{ Number::format($order->price_total,locale: 'ru')}} руб.
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>
                        <hr>
                        <div class="card-header d-flex justify-content-between align-items-center pb-50 pt-0">
                            <div class="">Всего новых: {{count($orders)}} </div>
                            <div class="dropdown">
                                <a class="btn btn-sm btn-outline-info " href="{{route('backend.order.index')}}">
                                    Посмотреть все
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-xl-6 col-md-6 col-12 dashboard-latest-update">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <h4 class="card-title">Продукция <small> (последние 5)</small></h4>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-success btn-outline-info" href="{{route('backend.product.create')}}">
                                Добавить
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
                                                <a href="{{route('backend.product.edit',$product->id)}}">
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
                        <div class="">Всего опубликовано: {{\App\Models\Product::public()->count()}} карточек</div>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-outline-info " href="{{route('backend.product.index')}}">
                                Посмотреть все
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-12 dashboard-latest-update">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <h4 class="card-title">Производители <small> (последние 5)</small></h4>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-success btn-outline-info" href="{{route('backend.firm.create')}}">
                                Добавить
                            </a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pb-1 ps">
                            <ul class="list-group list-group-flush">
                                @foreach($firms as  $firm)
                                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                        <div class="list-left d-flex w-75">
                                            <div class="list-icon mr-1">
                                                <div class="avatar bg-rgba-primary m-0">
                                                    <div class="avatar-content">
                                                        <i class="bx @if($firm->public)  bxs-show text-success @else  bxs-hide text-danger  @endif                 font-size-base"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">

                                                <a href="{{route('backend.firm.edit',$firm->id)}}"> <span class="list-title text-bold-600">{{$firm->name}}</span> </a>
                                                <small class="text-muted d-block">
                                                    @foreach($firm->collections as $collection)
                                                        <a href="{{route('backend.collection.edit',$collection->id)}}" class="text-muted">   {{$collection->name}} </a>,
                                                    @endforeach
                                                </small>
                                            </div>
                                        </div>
                                        <div>
                                            <small> Добавлено</small>
                                            <div class="font-size-small text-primary">
                                                {{$firm->created_at->format('H:m d.m.Y')}}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <div class="">Всего опубликовано: {{\App\Models\Firm::public()->count()}} производителей</div>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-outline-info " href="{{route('backend.firm.index')}}">
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
                            <div class="col-sm-3 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto mb-50">
                                                <i class="bx bx-hdd font-medium-5"></i>
                                            </div>
                                            Свободное место:
                                            <h3 class="mb-0">  {{round(disk_free_space('./')/ 1073741824,2)}} Гб</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Revenue Growth Chart Starts -->
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
                                                <i class="bx bx-notepad font-medium-5"></i>
                                            </div>
                                            <a class="line-ellipsis" href="/log-viewer">Log Viewer</a>
                                            <h3 class="mb-0">Log Viewer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                <i class="bx bx-pulse font-medium-5"></i>
                                            </div>
                                            <a class="line-ellipsis" href="/telescope">Telescope</a>
                                            <h3 class="mb-0">Telescope</h3>
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
