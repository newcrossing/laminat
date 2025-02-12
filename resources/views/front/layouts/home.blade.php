<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>@yield('title',' Интернет-магазин наполных покрытий Пол России. Купить в Москве и Московской области') </title>

    <meta name="keywords" content="@yield('keywords','Ламинат купить цена каталог интернет-магазин москва напольные покрытия дом квартир')"/>
    <meta name="description"
          content="@yield('description','В периоды нестабильности лучше обратиться к услугам надежной компании, специализирующейся на напольных покрытиях. Мы предлагаем вам посетить наш шоурум и интернет-магазин')">
    <meta name="author" content="newcrossing">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="/assets/images/icons/favicon.svg" type="image/svg+xml">
    {{--    <link rel="icon" type="image/" href="/assets/images/icons/favicon.svg">--}}

    @include('front.moduls.scripts.header')

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/demo9.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
</head>

<body class="home">
<div class="page-wrapper">
    <!-- Start of Header -->
    <header class="header header-border">
        @include('front.moduls.header.header-top')
        <!-- End of Header Top -->
        @include('front.moduls.header.header-middle')

    </header>
    <!-- End of Header -->
    <x-front.menu.type/>


    <!-- Start of Main -->
    @yield('content')
    <!-- End of Main -->

    <!-- Start of Footer -->
    @include('front.moduls.footer.footer')
    <!-- End of Footer -->
</div>
<!-- End of Page Wrapper -->

<!-- Start of Sticky Footer -->
{{--Нижнее меню отображанемое в мобиле--}}
@include('front.moduls.footer.mobile-menu')


<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg>
</a>
<!-- End of Scroll Top -->


<!-- Start of Mobile Menu -->
{{--верхнее выезжающее  меню отображанемое в мобиле--}}
@include('front.moduls.header.mobile-menu')
<!-- End of Mobile Menu -->

<!-- Root element of PhotoSwipe. Must have class pswp -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
			PhotoSwipe keeps only 3 of them in the DOM to save memory.
			Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" aria-label="Закрыть (Esc)"></button>
                <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="loading-spin"></div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
            <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<!-- End of PhotoSwipe -->

<!-- Start of Quick View -->
{{--@include('front.moduls.quick-view')--}}
<!-- End of Quick view -->

@include('front.moduls.scripts.footer')

<!-- Main JS File -->
<script src="/assets/js/main.js"></script>
{{--<script src="/assets/js/main.min.js"></script>--}}

@include('moduls.metrika')
</body>

</html>