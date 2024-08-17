<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>ПолРоссии - наполные покрытия</title>
    <meta name="keywords"
          content=""/>
    <meta name="description" content="">
    <meta name="author" content="">

    @include('frontend.moduls.favicon')

    <!-- css Icon Font -->
    <link rel="stylesheet" href="/assets/css/vendor/ecicons.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="/assets/css/plugins/animate.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/countdownTimer.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/slick.min.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/nouislider.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap.css"/>
    @yield('vendor-styles')

    <!-- Main Style -->
    <link rel="stylesheet" href="/assets/css/style.css"/>
    {{--        <link rel="stylesheet" href="{{asset('/assets/css/demo7.css')}}"/>--}}
    <link rel="stylesheet" href="/assets/css/responsive.css"/>


    @yield('page-styles')

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="/assets/css/backgrounds/bg-4.css">

</head>
<body class="product_page">
<div id="ec-overlay"><span class="loader_img"></span></div>

<!-- Header start  -->
<header class="ec-header">
    @include('frontend.moduls.header-top')

    @include('frontend.moduls.header-bottom')

    @include('frontend.moduls.menu')
</header>
<!-- Header End  -->

<!-- ekka Cart Start -->
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
            <ul class="eccart-pro-items">
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="/assets/images/product-image/6_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">T-shirt For Women</a>
                        <span class="cart-price"><span>$76.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1"/>
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="/assets/images/product-image/12_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Women Leather Shoes</a>
                        <span class="cart-price"><span>$64.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1"/>
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="/assets/images/product-image/3_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Girls Nylon Purse</a>
                        <span class="cart-price"><span>$59.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1"/>
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                    <tr>
                        <td class="text-left">Sub-Total :</td>
                        <td class="text-right">$300.00</td>
                    </tr>
                    <tr>
                        <td class="text-left">VAT (20%) :</td>
                        <td class="text-right">$60.00</td>
                    </tr>
                    <tr>
                        <td class="text-left">Total :</td>
                        <td class="text-right primary-color">$360.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="cart.html" class="btn btn-primary">View Cart</a>
                <a href="checkout.html" class="btn btn-secondary">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- ekka Cart End -->

@include('frontend.moduls.breadcrumb')
{{--<div class="container">--}}
{{--    <div class="row">--}}

{{--        @foreach(\App\Models\Type::all() as $type)--}}
{{--            <div class="col-sm-12 col-md-6 col-lg-2 zoomIn" data-animation="zoomIn" data-animated="true"--}}
{{--            style="margin-top: 10px; line-height: 1; margin-left: 1px">--}}


{{--                <div class="ec_ser_inner" style="height: 50px">--}}
{{--                    <div class="ec-service-image">--}}
{{--                    </div>--}}
{{--                    <div class="ec-service-desc">--}}
{{--                        <span class="fs-6 ">{{$type->name}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}


{{--    </div>--}}
{{--</div>--}}



<!-- Sart Single product -->
@yield('content')
<!-- End Single product -->

@include('frontend.moduls.releted-product')

@include('frontend.moduls.footer')

@include('frontend.moduls.modal-product')

@include('frontend.moduls.footer-responsive')

{{--@include('frontend.moduls.recent-purchase')--}}

<!-- Cart Floating Button -->
<div class="ec-cart-float">
    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
        <div class="header-icon"><img src="/assets/images/icons/cart.svg" class="svg_img header_svg" alt=""/></div>
        <span class="ec-cart-count cart-count-lable">3</span>
    </a>
</div>
<!-- Cart Floating Button end -->


<!-- Vendor JS -->
<script src="/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="/assets/js/vendor/popper.min.js"></script>
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<script src="/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="/assets/js/vendor/modernizr-3.11.2.min.js"></script>
@yield('vendor-scripts')

<!--Plugins JS-->
<script src="/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="/assets/js/plugins/nouislider.js"></script>
<script src="/assets/js/plugins/countdownTimer.min.js"></script>
<script src="/assets/js/plugins/scrollup.js"></script>
<script src="/assets/js/plugins/jquery.zoom.min.js"></script>
<script src="/assets/js/plugins/slick.min.js"></script>
<script src="/assets/js/plugins/infiniteslidev2.js"></script>
<script src="/assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/plugins/jquery.sticky-sidebar.js"></script>

<!-- Main Js -->
<script src="/assets/js/vendor/index.js"></script>
<script src="/assets/js/main.js"></script>
@yield('page-scripts')

</body>
</html>