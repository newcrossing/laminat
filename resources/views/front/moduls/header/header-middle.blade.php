<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle"> </a>
            <a href="{{route('home')}}" class="logo ml-lg-0">
                <img src="/assets/images/logo.png" alt="logo" width="144" height="45"/>
            </a>
            <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value="">Все категории</option>
                        <option value="4">Ламинат</option>
                        <option value="5">Паркетная доска</option>
                        <option value="6">SPC ламинат</option>
                    </select>
                </div>
                <input type="text" class="form-control" name="search" id="search" placeholder="Найти в..." required/>
                <button class="btn btn-search" type="submit"><i class="w-icon-search"></i></button>
            </form>
        </div>
        <div class="header-right ml-4">
            <div class="header-call d-xs-show d-lg-flex align-items-center">
                <a href="tel:#" class="w-icon-call"></a>
                <div class="call-info d-lg-show">
                    <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                        с 10:00 до 22:00 </h4>
                    <a href="tel:{{config('contact.phone_min')}}" class="phone-number font-weight-bolder ls-50">{{config('contact.phone')}}</a>
                </div>
            </div>
            <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                <i class="w-icon-heart"></i>
                <span class="wishlist-label d-lg-show">Понравилось</span>
            </a>
            @include('front.moduls.cart.header-top')

        </div>
    </div>
</div>

<!-- End of Header Middle -->

<div class="header-bottom sticky-content fix-top sticky-header">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
{{--                @include('front.moduls.header.mega-menu')--}}
                @include('front.moduls.header.main-menu')
            </div>
            <div class="header-right">
{{--                <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>--}}
                <a href="#"><i class="w-icon-sale"></i>Ежедневные скидки</a>
            </div>
        </div>
    </div>
</div>