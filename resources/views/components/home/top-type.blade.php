<!-- Product tab Area Start -->
<section class="section ec-product-tab section-space-p" id="collection">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Напольные покрытия</h2>
                    <h2 class="ec-title">Напольные покрытия</h2>
                    {{--                        <p class="sub-title">Browse The Collection of Top Products</p>--}}
                </div>
            </div>

            <!-- Tab Start -->
            <div class="col-md-12 text-center">
                <ul class="ec-pro-tab-nav nav justify-content-center">
                    @foreach($types as $type)
                        <li class="nav-item"><a class="nav-link   @if ($loop->first) active @endif" data-bs-toggle="tab" href="#tab-pro-{{$type->slug}}">{{$type->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content">
                    @foreach($types as $type)
                        <div class="tab-pane fade @if ($loop->first) show active @endif " id="tab-pro-{{$type->slug}}">
                            <div class="row">
                                <!-- Product Content -->
                                <x-products.card :products="$type->products()->limit(3)->get()"/>


                                <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Смотреть все</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ec Product tab Area End -->