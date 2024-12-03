@extends('front.layouts.main')

@section('title','Произволители напольных покрытий - "Пол России"')
@section('keywords','Произволители каталог фирм ламинта паркет напольных покрытий ')
@section('description','Пол России - производители напольных покрытий. Большой ассортимент, расширенная гарантия на товар!')

@section('vendor-styles')
@endsection

@section('page-styles')
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
                        <form method="get" id="">
                            @csrf
                            <input type="hidden" name="onsubmit" value="1">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <!-- Start of Sticky Sidebar -->
                                <div class="sticky-sidebar">
                                    <div class="title-link-wrapper">
                                        <h2 class="title title-link">{{$type->name}} ({{$type->products_public_count}})
                                        </h2>

                                    </div>
                                    <div class="filter-actions">
                                        <label>Фильтр :</label>
                                        <a href="#" class="btn btn-dark btn-link filter-clean text-normal">Сбросить все</a>
                                    </div>

                                    <div class="alert alert-success  alert-block alert-inline show-code-action">
                                        <h4 class="alert-title">
                                            <i class=" w-icon-reviews"></i>Вы выбрали</h4>
                                        <ul class="font-weight-bold">
                                            <li>{{$type->name}}</li>
                                            @if(!empty($selectFirm))
                                                <li>{{$selectFirm->name}}</li>
                                            @endif
                                            @if(!empty($selectCollection))
                                                <li>{{$selectCollection->name}}</li>
                                            @endif
                                        </ul>
                                    </div>


                                    <!-- Start of Collapsible widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><span>Производители</span></h3>
                                        <ul class="widget-body filter-items search-ul">
                                            @foreach($firms as $firm)
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <a href="{{route('type.index',[ $type->slug,$firm->slug])}}">{{$firm->name}}</a>
                                                    <span>({{$firm->products_count}})</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <!-- End of Collapsible Widget -->

                                    <!-- Start of Collapsible Widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><span>Цена</span></h3>
                                        <div class="widget-body">

                                            <div class="price-range">
                                                <input type="text" name="price_min" class="min_price text-center" placeholder="от" value="{{$products->min('price_metr')}}">
                                                <span class="delimiter">-</span>
                                                <input type="text" name="price_max" class="max_price text-center" placeholder="до" value="{{$products->max('price_metr')}}">
                                                <input type="submit" class="btn btn-primary " value="Искать" style="color: white;">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Collapsible Widget -->

                                    @foreach($attributes as $attribute)
                                        <!-- Start of Collapsible Widget -->
                                        <div class="widget widget-collapsible">
                                            <h3 class="widget-title" style="border-bottom: 2px solid #336699;"><span>{{$attribute->name}}</span></h3>
                                            <ul class="widget-body filter-items item-check mt-1">
                                                @foreach($attribute->attributeOptions as $attributeOption)
                                                    <li class="mb-1 d-flex justify-content-between align-items-center pl-3 ">
                                                        <div class="custom-radio">
                                                            <input type="checkbox" name="options[{{$attribute->id}}][]" value="{{$attributeOption->id}}"
                                                                   class="custom-control-input" onchange="this.form.submit()" id="label-{{$attributeOption->id}}"
                                                                    @checked(in_array($attributeOption->id,(request()->get('options'))[$attribute->id]??[] ))>
                                                            <label for="label-{{$attributeOption->id}}" class="custom-control-label color-dark">
                                                                {{$attributeOption->value}}
                                                            </label>
                                                        </div>
                                                        <span>
                                                        ({{$attributeOption->products_count}})
                                                    </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- End of Collapsible Widget -->
                                    @endforeach


                                </div>
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


                        <x-front.products.sorting/>


                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                            <x-front.products.card :products="$products" :col="4"/>
                        </div>

                        {{ $products->links('vendor.pagination.paginator') }}
                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection
