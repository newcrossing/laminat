@extends('front.layouts.main')

@section('title','Оформление заказа')
@section('description','Оформление заказа в интернет-магазине Пол России.')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="text-uppercase"><a href="{{route('cart')}}">Корзина</a></li>
                    <li class="text-uppercase active" style="text-align: center;">
                        <a href="{{route('order')}}">Выбор способа оплаты и доставки</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <form class="form checkout-form" action="" method="post">
                    @csrf
                    <div class="row mb-9">
                        <div class="col-lg-6 pr-lg-4 mb-4">

                            @if ($errors->any())
                                <div class="alert alert-error alert-bg alert-block alert-inline mb-3">
                                    <h4 class="alert-title">
                                        <i class="w-icon-exclamation-triangle"></i>Ошибка!
                                    </h4>
                                    При вводе полей формы допущены следующие ошибки.
                                    <ul class="mt-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn btn-link btn-close" aria-label="button">
                                        <i class="close-icon"></i>
                                    </button>
                                </div>
                            @endif

                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Личные данные
                            </h3>

                            <div class="form-group">
                                <label class="@error('name') text-danger font-weight-bold @enderror">Имя *</label>
                                <input type="text" class="form-control form-control-md text-dark" name="name">

                            </div>
                            <div class="form-group">
                                <label class="@error('phone') text-danger font-weight-bold @enderror">Телефон *</label>
                                <input type="text" class="form-control form-control-md mb-0 text-dark" name="tel" pattern="^8[0-9]{10}$">
                                <p class="font-size-sm mb-1">Номер телефона в формате 8ХХХХХХХХХХ</p>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control form-control-md text-dark" name="email">
                            </div>
                            <div class="form-group">
                                <label>Адрес</label>
                                <input type="text" class="form-control form-control-md mb-0 text-dark" name="delivery_address">
                                <p class="font-size-sm">Этот адрес нам потребуется если Вы заказали доставку</p>
                            </div>
                            <div class="form-group mt-3">
                                <label for="order-notes">Комментарий к заказу</label>
                                <textarea class="form-control mb-0 text-dark" name="comment" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Заказ</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <hr>
                                        <tbody>
                                        @foreach($products as $product)
                                            @php
                                                /** @var \App\Models\Product  $product */
                                            @endphp
                                            <tr class="bb-no">
                                                <td class="product-name" style="white-space: normal;">{{$product->getFullName()}} <i class="fas fa-times"></i>
                                                    <span class="product-quantity">{{$product->pivot->count}}</span>
                                                </td>
                                                <td class="product-total">{{ Number::format($product->price_upak * $product->pivot->count,locale: 'ru')}} руб.</td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                        <tfoot>
                                        <tr class="order-total">
                                            <th>
                                                <b>Стоимость заказа</b>
                                            </th>
                                            <td>
                                                <b>{{ Number::format($priceTotal,locale: 'ru')}} руб.</b>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="payment-methods" id="payment_method">
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-3">Доставка</h4>

                                        <div class="custom-radio">
                                            <input type="radio" id="delivery-samovivoz" class="custom-control-input" checked name="delivery_type" value="1">
                                            <label for="delivery-samovivoz" class="custom-control-label color-dark font-weight-bolder">
                                                Самовывоз <span class="tip tip-hot mr-3">Бесплатно</span>
                                            </label>
                                        </div>
                                        <div class="ml-6">Самовывоз производится по адресу: {{config('contact.adress')}}</div>

                                        <div class="custom-radio mt-3">
                                            <input type="radio" id="delivery-moscow" class="custom-control-input" name="delivery_type" value="2">
                                            <label for="delivery-moscow" class="custom-control-label color-dark font-weight-bolder">
                                                Доставка в г. Москва (в пределах МКАД)
                                            </label>
                                        </div>
                                        <div class="ml-6">
                                            Стоимость доставки <span class="tip tip-hot mr-3 text-normal"> {{\App\Models\Order::DELIVERY['moscow']}} руб.</span>
                                        </div>

                                        <div class="custom-radio mt-3">
                                            <input type="radio" id="delivery-moscow-obl-vostok" class="custom-control-input" name="delivery_type" value="3">
                                            <label for="delivery-moscow-obl-vostok" class="custom-control-label color-dark font-weight-bolder">
                                                Доставка в Московскую область (восток)
                                            </label>
                                        </div>
                                        <div class="ml-6">
                                            Стоимость доставки <span class="tip tip-hot mr-3 text-normal">{{\App\Models\Order::DELIVERY['moscow_oblast_vostok']}} руб.</span>
                                            <div class="font-size-sm">Доставка в го Щелково, го Балашиха, го Королев, г. Фрязино, г. Ивантеевка</div>
                                        </div>

                                        <div class="custom-radio mt-3">
                                            <input type="radio" id="delivery-moscow-obl" class="custom-control-input" name="delivery_type" value="4">
                                            <label for="delivery-moscow-obl" class="custom-control-label color-dark font-weight-bolder">
                                                Доставка в Московскую область
                                            </label>
                                        </div>
                                        <div class="ml-6">
                                            Стоимость доставки
                                            <span class="tip tip-hot mr-3 text-normal">
                                                {{\App\Models\Order::DELIVERY['moscow_oblast']}} руб.+
                                                {{\App\Models\Order::DELIVERY['moscow_oblast_km']}} руб. за километр.
                                            </span>
                                        </div>
                                    </div>


                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Разместить заказ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection

@section('page-scripts')

@endsection
