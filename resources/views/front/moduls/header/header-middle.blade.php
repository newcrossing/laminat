<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle"> </a>
            <a href="{{route('home')}}" class="logo ml-lg-0">
                <img src="/assets/images/logo.svg" height="50" style="height: 50px"/>
            </a>

        </div>
        <div class="header-right ml-4">
            <div class="header-call d-xs-show  align-items-center ">

                <div class="call-info d-lg-show">
                    <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                        <i class="w-icon-map-marker"></i> Московская обл., г.Щёлково, Пролетарский пр-т, д. 10, <br>ТД «Щелково» (КЭМП), 5 этаж
                    </h4>
                </div>
            </div>
            <div class="header-call d-xs-show d-lg-flex align-items-center">
                <a href="tel:{{config('contact.phone_min')}}" class="w-icon-call"></a>
                <div class="call-info d-lg-show">
                    <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                        с 10:00 до 22:00 </h4>
                    <a href="tel:{{config('contact.phone_min')}}" class="phone-number font-weight-bolder ls-50">{{config('contact.phone')}}</a>
                </div>
            </div>


            <livewire:front.wishlists.top/>

            <x-front.cart/>

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
                <a href="{{route('sale')}}"><i class="w-icon-sale"></i>Ежедневные скидки</a>
            </div>
        </div>
    </div>
</div>