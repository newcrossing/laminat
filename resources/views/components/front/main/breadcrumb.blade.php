<nav class="breadcrumb-nav container">
    @isset($breadcrumbs)
        <ul class="breadcrumb bb-no">
            @foreach ($breadcrumbs as $breadcrumb)
                @if(isset($breadcrumb['link']))
                    <li >
                        <a href="{{asset($breadcrumb['link'])}}"> <u>{{$breadcrumb['name']}}</u> </a>
                    </li>
                @else
                    <li>{{$breadcrumb['name']}}</li>
                @endif
            @endforeach
        </ul>
    @endisset

{{--    <ul class="product-nav list-style-none">--}}
{{--        <li class="product-nav-prev">--}}
{{--            <a href="#">--}}
{{--                <i class="w-icon-angle-left"></i>--}}
{{--            </a>--}}
{{--            <span class="product-nav-popup">--}}
{{--                            <img src="/assets/images/products/product-nav-prev.jpg" alt="Product" width="110" height="110"/>--}}
{{--                            <span class="product-name">Soft Sound Maker</span>--}}
{{--                        </span>--}}
{{--        </li>--}}
{{--        <li class="product-nav-next">--}}
{{--            <a href="#">--}}
{{--                <i class="w-icon-angle-right"></i>--}}
{{--            </a>--}}
{{--            <span class="product-nav-popup">--}}
{{--                            <img src="/assets/images/products/product-nav-next.jpg" alt="Product" width="110" height="110"/>--}}
{{--                            <span class="product-name">Fabulous Sound Speaker</span>--}}
{{--                        </span>--}}
{{--        </li>--}}
{{--    </ul>--}}
</nav>