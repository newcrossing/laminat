@extends('front.layouts.main')

@section('title',$meta['title'])

@section('description',$meta['description'])

@section('vendor-styles')
    <!--Plugin CSS file with desired skin-->

@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{asset('/assets/css/ion.rangeSlider.css')}}"/>
@endsection

@section('content')

    <!-- Start of Main -->
    <main class="main">
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb-nav -->

        <div class="page-content mb-10">
            <div class="container">
                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">

                        <form method="get" id="ttty">
                            @csrf
                            <input type="hidden" name="onsubmit" value="1">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>


                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <!-- Start of Sticky Sidebar -->

                                <livewire:front.type.filter :type-id="$type->id" :prices="$prices" :firm-id="$selectFirmId"/>

                                {{--                                <div class="sticky-sidebar">--}}
                                {{--                                    <div class="title-link-wrapper">--}}
                                {{--                                        <h2 class="title title-link">{{$type->name}} ({{$type->products_public_count}}) </h2>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="filter-actions">--}}
                                {{--                                        <label>Фильтр:</label>--}}
                                {{--                                        <a href="{{route('type.index',[ $type->slug])}}" class="btn btn-dark btn-link font-size-sm font-weight-normal text-normal">Сбросить все</a>--}}
                                {{--                                    </div>--}}

                                {{--                                    <div class="alert alert-success  alert-block alert-inline show-code-action">--}}
                                {{--                                        <h4 class="alert-title">--}}
                                {{--                                            <i class=" w-icon-reviews"></i>Вы выбрали</h4>--}}
                                {{--                                        <ul class="font-weight-bold">--}}
                                {{--                                            <li>{{$type->name}}</li>--}}
                                {{--                                            @if(!empty($selectFirm))--}}
                                {{--                                                <li>{{$selectFirm->name}}</li>--}}
                                {{--                                            @endif--}}
                                {{--                                            @if(!empty($selectCollection))--}}
                                {{--                                                <li>{{$selectCollection->name}}</li>--}}
                                {{--                                            @endif--}}
                                {{--                                            @if($selectAttributes)--}}
                                {{--                                                @foreach($selectAttributes as $selectAttribute)--}}
                                {{--                                                    <li>{{$selectAttribute->name}}</li>--}}
                                {{--                                                    @foreach($selectAttribute->attributeOptions as $attributeOption)--}}
                                {{--                                                        <div class="font-weight-normal font-size-sm ml-2"><i class="w-icon-plus"></i> {{$attributeOption->value}}</div>--}}
                                {{--                                                    @endforeach--}}
                                {{--                                                @endforeach--}}
                                {{--                                            @endif--}}
                                {{--                                            @if((!empty($prices['from']) && $prices['from'] != $prices['min']) || (!empty($prices['to']) && $prices['to'] != $prices['max']))--}}
                                {{--                                                <li>Цена</li>--}}
                                {{--                                                <div class="font-weight-normal font-size-sm ml-2">--}}
                                {{--                                                    <i class="w-icon-plus"></i> от {{Number::format($prices['from']) }} до {{Number::format($prices['to']) }} руб.--}}
                                {{--                                                </div>--}}
                                {{--                                            @endif--}}

                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}


                                {{--                                    <!-- Start of Collapsible widget -->--}}
                                {{--                                    <div class="widget widget-collapsible">--}}
                                {{--                                        <h3 class="widget-title" style="border-bottom: 2px solid #336699;"><span>Производители</span></h3>--}}
                                {{--                                        <ul class="widget-body filter-items search-ul">--}}
                                {{--                                            @foreach($firms as $firm)--}}
                                {{--                                                <li class="d-flex justify-content-between align-items-center">--}}
                                {{--                                                    <a href="{{route('type.index',[ $type->slug,$firm->slug])}}">{{$firm->name}}</a>--}}
                                {{--                                                    <span>({{$firm->products_count}})</span>--}}
                                {{--                                                </li>--}}
                                {{--                                            @endforeach--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!-- End of Collapsible Widget -->--}}

                                {{--                                    <!-- Start of Collapsible Widget -->--}}
                                {{--                                    <div class="widget widget-collapsible">--}}
                                {{--                                        <h3 class="widget-title mb-2" style="border-bottom: 2px solid #336699;"><span>Цена</span></h3>--}}

                                {{--                                        <div class="widget-body">--}}
                                {{--                                            <input type="text" class="js-range-slider" name="my_range" value=""--}}
                                {{--                                                   data-type="double"--}}
                                {{--                                                   data-min="{{$prices['min']}}"--}}
                                {{--                                                   data-max="{{$prices['max']}}"--}}
                                {{--                                                   data-step="100"--}}
                                {{--                                                   data-from="{{$prices['from'] ?:$prices['min']}}"--}}
                                {{--                                                   data-to="{{$prices['to']?:$prices['max']}}"--}}
                                {{--                                                   data-grid="true"--}}
                                {{--                                            />--}}

                                {{--                                            <div class="price-range">--}}
                                {{--                                                <input type="text" id="price_input_from" name="price_min" class="text-center " value="">--}}
                                {{--                                                <span class="delimiter">-</span>--}}
                                {{--                                                <input type="text" id="price_input_to" name="price_max" class="text-center" value="">--}}
                                {{--                                                <input type="submit" class="btn btn-primary " value="Искать" style="color: white;width: 100%;">--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!-- End of Collapsible Widget -->--}}

                                {{--                                    @foreach($attributes as $attribute)--}}
                                {{--                                        <!-- Start of Collapsible Widget -->--}}
                                {{--                                        <div class="widget widget-collapsible">--}}
                                {{--                                            <h3 class="widget-title text-normal" style="border-bottom: 2px solid #336699;"><span>{{$attribute->name}}</span></h3>--}}
                                {{--                                            <ul class="widget-body filter-items item-check mt-1">--}}
                                {{--                                                @foreach($attribute->attributeOptions as $attributeOption)--}}
                                {{--                                                    <li class="mb-1 d-flex justify-content-between align-items-center pl-3 ">--}}
                                {{--                                                        <div class="custom-radio">--}}
                                {{--                                                            <input type="checkbox" name="options[{{$attribute->id}}][]" value="{{$attributeOption->id}}"--}}
                                {{--                                                                   class="custom-control-input" onchange="this.form.submit()" id="label-{{$attributeOption->id}}"--}}
                                {{--                                                                    @checked(in_array($attributeOption->id,(request()->get('options'))[$attribute->id]??[] ))>--}}
                                {{--                                                            <label for="label-{{$attributeOption->id}}" class="custom-control-label color-dark" style="display: block">--}}
                                {{--                                                                {{$attributeOption->value}}--}}
                                {{--                                                            </label>--}}
                                {{--                                                        </div>--}}
                                {{--                                                        <span class="text-default">({{$attributeOption->products_count}})</span>--}}
                                {{--                                                    </li>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </ul>--}}
                                {{--                                        </div>--}}
                                {{--                                        <!-- End of Collapsible Widget -->--}}
                                {{--                                    @endforeach--}}


                                {{--                                </div>--}}
                                <!-- End of Sidebar Content -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </form>
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Main Content -->
                    <div class="main-content">
                        <!-- Start of Shop Banner -->

                        <!-- End of Shop Banner -->
                        @if(!empty($selectFirm) && empty($selectCollection))
                            <x-front.type.description-firm :select-firm="$selectFirm" :type="$type"/>
                        @endif
                        @if( !empty($selectCollection))
                            <x-front.type.description-collection :select-firm="$selectFirm" :type="$type" :select-collection="$selectCollection"/>
                        @endif


                        <livewire:front.type.sorting/>


                        {{--                            <x-front.products.card :products="$products" />--}}
                        <livewire:front.product.card :type-id="$type->id" :firm-id="$selectFirmId"/>


                        {{--                        {{ $products->links('vendor.pagination.paginator') }}--}}
                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection

@section('page-scripts')
    <script src="{{asset('/assets/js/ion.rangeSlider.js')}}"></script>
    <script>
        var $range = $(".js-range-slider");
        var $inputFrom = $("#price_input_from");
        var $inputTo = $("#price_input_to");
        var instance;
        var min = 0;
        var max = 1000;
        var from = 0;
        var to = 0;
        $(".js-range-slider").ionRangeSlider({
            skin: "square",
            type: "double",
            min: min,
            max: max,
            from: 200,
            to: 800,
            postfix: " ₽",
            // grid_num: 5,
            grid_snap: false,
              //onStart: updateInputs,
             //onChange: updateInputs,
           //  onUpdate: updateInputs,
            onFinish: updateInputs
        });
        instance = $range.data("ionRangeSlider");

        function updateInputs(data) {
          //  alert()

            from = data.from;
            to = data.to;
            Livewire.dispatch('update-price', {from: from, to: to})
            $inputFrom.prop("value", from);
            $inputTo.prop("value", to);
        }

        $inputFrom.on("change", function () {

            var val = $(this).prop("value");

            // validate
            if (val < min) {
                val = min;
            } else if (val > to) {
                val = to;
            }

            instance.update({
                from: val
            });

            $(this).prop("value", val);

        });

        $inputTo.on("change", function () {

            var val = $(this).prop("value");

            // validate
            if (val < from) {
                val = from;
            } else if (val > max) {
                val = max;
            }

            instance.update({
                to: val
            });

            $(this).prop("value", val);
        });


    </script>

@endsection
