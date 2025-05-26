@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактирование')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/extensions/toastr.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/b/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/css/pages/app-invoice.css">

    @include('backend.panels.library.fileuploader.css')
@endsection


@section('content')

    <section class="invoice-edit-wrapper">
        <form action="{{ (isset($order->id))? route('backend.order.update',$order->id):route('backend.order.store')  }}" method="POST">
            @csrf
            @if(isset($order->id))
                @method('PUT')
            @endif
            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">
                                <!-- header section -->
                                <div class="row mx-0">
                                    <div class="col-xl-6 col-md-12 d-flex align-items-center pl-0">
                                        <h5 class="invoice-number mr-75 mb-0 ">Заказ#</h5>
                                        <h5 class="invoice-number mr-75 mb-0 text-primary">{{$order->order_number}}</h5>

                                    </div>
                                    <div class="col-xl-6 col-md-12 d-flex align-items-center float-right pl-0">
                                        <h6 class="invoice-number mr-75 mb-0 ">Статус</h6>
                                        <span class="badge  {{$order->status->color()}}">{{$order->status->name()}}</span>
                                    </div>
                                </div>
                                <hr>
                                <!-- logo and title -->
                                <div class="row my-2 py-50">
                                    <div class=" col-12 order-2 order-sm-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Комменатрий менеджера к заказу</label>
                                            <textarea class="form-control"  name="order_comment" rows="3">{{$order->order_comment}}</textarea>
                                        </fieldset>
                                    </div>

                                </div>
                                <hr>
                                <div class="row invoice-info">
                                    <div class="col-6 mt-1">
                                        <h6 class="invoice-from">Личные данные</h6>
                                        <div class="mb-1">
                                            <span>{{$order->name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$order->tel}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$order->email}}</span>
                                        </div>
                                        <div class="mb-1">
                                            Комментарий: <span>{{$order->comment}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-1">
                                        <h6 class="invoice-to">Доставка</h6>
                                        <div class="mb-1">
                                            <span>{{$order->delivery_type->label()['name']}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>Стоимость доставки: {{$order->delivery_type->label()['price']}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$order->delivery_type->label()['description']}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>Адрес: {{$order->delivery_address}}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                            </div>
                            <div class="invoice-product-details table-responsive mx-md-25">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                    <tr class="border-0">
                                        <th scope="col">Товар</th>
                                        <th scope="col" class="text-right">Количество</th>
                                        <th scope="col" class="text-right">Цена</th>
                                        <th scope="col" class="text-right">Сумма</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products as $product)
                                        @php
                                            /** @var \App\Models\Product  $product */
                                        @endphp
                                        <tr>
                                            <td>
                                                <a href="{{route('prod.show',$product->slug)}}" target="_blank">{{$product->getFullName()}}</a>
                                            </td>
                                            <td class="text-center">{{$product->pivot->count}}</td>
                                            <td class="text-primary text-right ">{{Number::format($product->pivot->price)}}</td>
                                            <td class="text-primary text-right font-weight-bold">
                                                {{Number::format($product->getPriceByCount($product->pivot->count))}}
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body pt-0 mx-25">
                                <hr>
                                <div class="row">
                                    <div class="col-6 col-sm-6 mt-75">
                                        <div class="invoice-subtotal">
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title text-bold-600">Сумма заказа</span>
                                                <span class="invoice-value">{{ Number::format($order->price_total,locale: 'ru')}} руб.</span>
                                            </div>
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title text-bold-600">Доставка</span>
                                                <span class="invoice-value">{{$order->price_delivery}}</span>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6  mt-75">
                                        <div class="invoice-subtotal">
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title text-bold-600">Сумма заказа</span>
                                                <span class="invoice-value">{{ Number::format($order->price_total,locale: 'ru')}} руб.</span>
                                            </div>
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title text-bold-600">Доставка</span>
                                                <span class="invoice-value">{{$order->price_delivery}}</span>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-body">

                            <div class="invoice-action-btn mb-1">
                                <button class="btn btn-success btn-block" type="submit">
                                    <i class='bx bx-save'></i>
                                    <span>Сохранить</span>
                                </button>
                            </div>
                            <p>Статус заказа</p>
                            <select name="status" class="form-control">
                                @foreach(\App\Enums\OrderStatusEnum::cases() as $case)
                                    <option value="{{$case->value}}"  @if((string) $case->value==$order->status->value) selected @endif>
                                        {{$case->name()}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>

@endsection


{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/b/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/b/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/b/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/b/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/b/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="/b/app-assets/vendors/js/forms/select/select2.full.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')

    <!-- BEGIN: Page JS-->
    {{--    <script src="{{asset("/b/app-assets/js/)}}"></script>--}}

    <script src={{asset('/b/app-assets/vendors/js/extensions/toastr.min.js')}}></script>
    <script src={{asset('/b/app-assets/js/scripts/extensions/toastr.js')}}></script>
    <script src="/b/app-assets/js/scripts/forms/select/form-select2.js"></script>

    <!-- END: Page JS-->



    @include('backend.panels.library.ckeditor.js')

@endsection
