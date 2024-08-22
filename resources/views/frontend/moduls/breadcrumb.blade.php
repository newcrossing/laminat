<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb mt-3 mb-1" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <h2 class="ec-breadcrumb-title">Single Products</h2>--}}
{{--                    </div>--}}
                    @isset($breadcrumbs)
                        <!-- Breadcrumb -->
                        <div class="col-md-12 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list" style="text-align: left">
                                @foreach ($breadcrumbs as $breadcrumb)
                                    @if(isset($breadcrumb['link']))
                                        <li class="ec-breadcrumb-item">
                                            <a href="{{asset($breadcrumb['link'])}}"> <u>{{$breadcrumb['name']}}</u> </a>
                                        </li>
                                    @else
                                        <li class="ec-breadcrumb-item active">{{$breadcrumb['name']}}</li>
                                    @endif
                                @endforeach

                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->