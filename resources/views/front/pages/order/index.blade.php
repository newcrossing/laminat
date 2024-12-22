@extends('front.layouts.main')

@section('title','Корзина')

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
                    <li class="text-uppercase active"><a href="{{route('order')}}">Выбор способа оплаты и доставки</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">

                <form class="form checkout-form" action="#" method="post">
                    <div class="row mb-9">
                        <div class="col-lg-6 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Личные данные
                            </h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Имя *</label>
                                        <input type="text" class="form-control form-control-md" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Телефон *</label>
                                        <input type="text" class="form-control form-control-md" name="lastname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control form-control-md" name="company-name">
                            </div>


                            <div class="form-group mt-3">
                                <label for="order-notes">Комментарий к заказу</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30" rows="4"></textarea>
                            </div>
                            <div class="order-summary">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0 mt-4">Доставка</h3>
                                <div class="payment-methods" style="padding-top: 0px" id="payment_method">

                                    <div class="accordion payment-accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#cash-on-delivery" class="collapse font-weight-bolder">Самовывоз</a>
                                            </div>
                                            <div id="cash-on-delivery" class="card-body expanded">
                                                <p class="mb-0 font-size-md">
                                                    <span class="tip tip-hot mr-3">Бесплатно</span>
                                                    Самовывоз производится по адресу....
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#payment" class="expand font-weight-bolder">Доставка в г. Москва (в пределах МКАД)</a>
                                            </div>
                                            <div id="payment" class="card-body collapsed">
                                                <div class="form-group ml-5">
                                                    <label>Адрес доставки</label>
                                                    <input type="text" class="form-control form-control-md" name="lastname" required>
                                                </div>
                                                <p class="mb-0 text-small">
                                                    <span class="tip tip-hot mr-3">Стоимость доставки 2 500 руб.</span> Доставка в пределах МКАД, также в г. Зеленоград.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#delivery" class="expand font-weight-bolder">Доставка в Московскую область (восток)</a>
                                            </div>
                                            <div id="delivery" class="card-body collapsed">
                                                <div class="form-group ml-5">
                                                    <label>Адрес доставки</label>
                                                    <input type="text" class="form-control form-control-md" name="lastname" required>
                                                </div>
                                                <p class="mb-0">
                                                    Доставка в го Щелково, го Балашиха, го Королев, г. Фрязино, г. Ивантеевка
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card p-relative">
                                            <div class="card-header">
                                                <a href="#paypal" class="expand font-weight-bolder">Доставка в Московскую область</a>
                                            </div>

                                            <div id="paypal" class="card-body collapsed">
                                                <div class="form-group ml-5">
                                                    <label>Адрес доставки</label>
                                                    <input type="text" class="form-control form-control-md" name="lastname" required>
                                                </div>
                                                <p class="mb-0">

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Заказ</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <hr>
                                        <tbody>
                                        <tr class="bb-no">
                                            <td class="product-name">Palm Print Jacket <i class="fas fa-times"></i>
                                                <span class="product-quantity">1</span>
                                            </td>
                                            <td class="product-total">$40.00</td>
                                        </tr>

                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Стоимость</b>
                                            </td>
                                            <td>
                                                <b>$100.00</b>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                </h4>
                                                <ul id="shipping-method" class="mb-4">
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="free-shipping"
                                                                   class="custom-control-input" name="shipping">
                                                            <label for="free-shipping"
                                                                   class="custom-control-label color-dark">Free
                                                                Shipping</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="local-pickup"
                                                                   class="custom-control-input" name="shipping">
                                                            <label for="local-pickup"
                                                                   class="custom-control-label color-dark">Local
                                                                Pickup</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="flat-rate"
                                                                   class="custom-control-input" name="shipping">
                                                            <label for="flat-rate"
                                                                   class="custom-control-label color-dark">Flat
                                                                rate: $5.00</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>
                                                <b>Total</b>
                                            </th>
                                            <td>
                                                <b>$100.00</b>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>


                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
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
