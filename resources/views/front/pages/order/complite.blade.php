@extends('front.layouts.main')

@section('title','Оформление заказа')

@section('vendor-styles')
@endsection


@section('page-styles')
@endsection

@section('content')
    @php
        /** @var \App\Models\Order  $order */
    @endphp
    <!-- Start of Main -->
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="text-uppercase"><a href="{{route('cart')}}">Корзина</a></li>
                    <li class="text-uppercase" style="text-align: center;">
                        <a href="{{route('order')}}">Выбор способа оплаты и доставки</a>
                    </li>
                    <li class="text-uppercase active" style="text-align: center;">
                        <a href="{{route('order')}}">Заказ оформлен</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Спасибо. Ваш заказ оформлен. Менеджер свяжется с Вами.
                </div>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>Номер заказа</label>
                        <strong>{{$order->order_number}}</strong>
                    </li>
                    <li>
                        <label>Статус</label>
                        <strong>{{$order->status}}</strong>
                    </li>
                    <li>
                        <label>Дата</label>
                        <strong>{{$order->created_at->format('d-m-Y')}}</strong>
                    </li>
                    <li>
                        <label>Всего </label>
                        <strong>{{ Number::format($order->price_total,locale: 'ru')}} руб.</strong>
                    </li>
                    <li>
                        <label>Доставка</label>
                        <strong>{{($order->delivery_type->label()['name'])}}</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <div class="order-details-wrapper mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">Детали заказа</h4>
                    <table class="order-table">
                        <thead>
                        <tr>
                            <th class="text-dark ">Товары</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            @php
                                /** @var \App\Models\Product  $product */
                            @endphp
                            <tr>
                                <td class="pb-2">
                                    <a href="{{route('prod.show',$product->slug)}}">{{$product->getFullName()}}</a>&nbsp;<strong>x {{$product->pivot->count}}</strong></a>
                                </td>
                                <td>{{ Number::format($product->pivot->price * $product->pivot->count,locale: 'ru')}} руб.</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Сумма заказа:</th>
                            <td class="font-weight-bold">{{ Number::format($order->price_total,locale: 'ru')}} руб.</td>
                        </tr>
                        <tr>
                            <th>Доставка:</th>
                            <td>{{($order->delivery_type->label()['price'])}}</td>
                        </tr>

                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->

                <div class="sub-orders mb-10">

                    <div class="alert alert-icon alert-inline mb-5">
                        <i class="w-icon-exclamation-triangle"></i>
                        <strong>Обратите внимание: </strong>Стоимость доставки будет рассчитана менеджером индивидуально.
                    </div>

                </div>
                <!-- End of Sub Orders-->

                <div id="account-addresses">
                    <div class="row">
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address billing-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Личные данные</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                        <tr>
                                            <td>{{$order->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->tel}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->delivery_address}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->comment}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address shipping-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Доставка</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                        <tr>
                                            <td>{{$order->delivery_type->label()['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Стоимость доставки: {{$order->delivery_type->label()['price']}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->delivery_type->label()['description']}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Account Address -->

                <a href="{{route('home')}}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6">Продолжить покупки <i class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection

@section('page-scripts')

@endsection
