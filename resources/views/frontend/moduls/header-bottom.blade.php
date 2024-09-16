<!-- Ec Header Bottom  Start -->
<div class="ec-header-bottom d-none d-lg-block">
    <div class="container position-relative">

        <div class="row">
            <div class="ec-flex">
                <!-- Ec Header Logo Start -->
                <div class="align-self-center">
                    <div class="header-logo">
                        <a href="{{route('home')}}">
                            <img src="/assets/images/logo/logo.png" alt="Лого"/>
                        </a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->

                <!-- Ec Header Search Start -->
                <div class="align-self-center">
                    <div class="" style="width: 300px">
                        <div class="fs-3 fw-bold">{{config('contact.phone')}}
                            <a href="//">
                                <i class="bi bi-telegram" style="color: #0a90eb"></i>
                            </a>
                            <a href="//">
                                <i class="bi bi-whatsapp" style="color: #26de3e"></i>
                            </a>

                        </div>
                        <div class="fs-6">График работы: Пн-Вс с 10:00 до 21:00</div>

                    </div>
                </div>
                <!-- Ec Header Search End -->
                <div class="align-self-center">
                    <div class="" style="width: 300px">
                        {{--                        <form class="ec-btn-group-form" action="#">--}}
                        {{--                            <input class="form-control" placeholder="Введите название товара..." type="text">--}}
                        {{--                            <button class="submit" type="submit">--}}
                        {{--                                <img src="/assets/images/icons/search.svg" class="svg_img header_svg" alt=""/>--}}
                        {{--                            </button>--}}
                        {{--                        </form>--}}
                        <i class="bi bi-geo-alt"></i>
                        {{config('contact.adress')}}
                    </div>
                </div>
                <!-- Ec Header Button Start -->
                <div class="align-self-center">
                    <div class="ec-header-bottons">

                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="/assets/images/icons/user.svg" class="svg_img header_svg" alt=""/>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                {{--                                <li><a class="dropdown-item" href="register.html">Register</a></li>--}}
                                <li><a class="dropdown-item" href="/log-viewer">Логи </a></li>
                                <li><a class="dropdown-item" href="{{route('backend.login')}}">Войти</a></li>
                            </ul>
                        </div>
                        <!-- Header User End -->
                        <!-- Header wishlist Start -->
                        <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon">
                                <img src="/assets/images/icons/wishlist.svg" class="svg_img header_svg" alt=""/>
                            </div>
                            <span class="ec-header-count">4</span>
                        </a>
                        <!-- Header wishlist End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon">
                                <img src="/assets/images/icons/cart.svg" class="svg_img header_svg" alt=""/>
                            </div>
                            <span class="ec-header-count cart-count-lable">3</span>
                        </a>
                        <!-- Header Cart End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec Header Button End -->
<!-- Header responsive Bottom  Start -->
<div class="ec-header-bottom d-lg-none">
    <div class="container position-relative">
        <div class="row ">
            <!-- Ec Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="/assets/images/logo/logo.png" alt="Лого"/>
                    </a>
                </div>
            </div>
            <!-- Ec Header Logo End -->
            <!-- Ec Header Search Start -->
            <div class="col">
                <div class="text-center fs-4 fw-bold">
                    {{config('contact.phone')}}
                    <a href="//">
                        <i class="bi bi-telegram" style="color: #0a90eb"></i>
                    </a>
                    <a href="//">
                        <i class="bi bi-whatsapp" style="color: #26de3e"></i>
                    </a>
                </div>
{{--                <div class="header-search">--}}
{{--                    <form class="ec-btn-group-form" action="#">--}}
{{--                        <input class="form-control" placeholder="Enter Your Product Name..." type="text">--}}
{{--                        <button class="submit" type="submit">--}}
{{--                            <img src="/assets/images/icons/search.svg" class="svg_img header_svg" alt="icon"/>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
            <!-- Ec Header Search End -->
        </div>
    </div>
</div>
<!-- Header responsive Bottom  End -->