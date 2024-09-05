<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Ekka - Ecommerce HTML Template.</title>
    <meta name="keywords" content="c"/>
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="">

    <!-- site Favicon -->
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32"/>
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png"/>
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png"/>

    <!-- css Icon Font -->
    <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css"/>

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css"/>
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css"/>
    <link rel="stylesheet" href="assets/css/plugins/countdownTimer.css"/>
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css"/>
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.css"/>

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/demo1.css"/>
    <link rel="stylesheet" href="assets/css/responsive.css"/>

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="/assets/css/backgrounds/bg-2.css">
</head>
<body>
<div id="ec-overlay"><span class="loader_img"></span></div>

@include('frontend.moduls.header')

{{-- Молуль корзины. Всплывает справа --}}
@include('frontend.moduls.cart')

{{-- Молуль меню категрий. Всплывает слева --}}
@include('frontend.moduls.sidebar-category')

@yield('content')

{{-- Молуль меню категрий. Всплывает слева --}}
@include('frontend.moduls.footer')

{{-- Не полнял где это --}}
@include('frontend.moduls.modal-product')

{{--@include('frontend.moduls.modal-subscribe-newsletter')--}}


@include('frontend.moduls.footer-responsive')

{{--@include('frontend.moduls.popup-recent-purchase')--}}

{{-- Плавающая иконка корзины --}}
@include('frontend.moduls.cart-float')




<!-- Vendor JS -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/countdownTimer.min.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<script src="assets/js/plugins/slick.min.js"></script>
<script src="assets/js/plugins/infiniteslidev2.js"></script>
<script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>

<!-- Main Js -->
<script src="assets/js/vendor/index.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>