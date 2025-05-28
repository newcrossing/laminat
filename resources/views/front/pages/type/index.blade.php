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
                                <livewire:front.type.filter :type-id="$type->id" :prices="$prices" :firm-id="$selectFirmId" :collection-id="$selectCollectionId"/>
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

                        <x-banner block="type" url-current="{{request()->path()}}" />


                        <livewire:front.type.sorting/>

                        <livewire:front.product.card :type-id="$type->id" :firm-id="$selectFirmId" :collection-id="$selectCollectionId"/>
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
