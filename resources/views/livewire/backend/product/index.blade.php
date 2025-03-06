<div>
    <section id="table-Marketing">
        <div class="card">

            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        {{--                        <div class="col-md-9 col-sm-12">--}}
                        {{--                            <div class="d-inline-block">--}}
                        {{--                                <!-- chart-1   -->--}}
                        {{--                                <div class="d-flex mr-5 market-statistics-1">--}}
                        {{--                                    <!-- chart-statistics-1 -->--}}
                        {{--                                    <div id="table-donut-chart-1"></div>--}}
                        {{--                                    <!-- data -->--}}
                        {{--                                    <div class="statistics-data ml-50 my-auto">--}}
                        {{--                                        <div class="statistics">--}}
                        {{--                                            <span class="font-medium-2 mr-50 text-bold-600">25,756</span><span class="text-success">(+16.2%)</span>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="statistics-date"><i class="bx bx-radio-circle font-small-1 text-success mr-25"></i><small class="text-muted">May 12,--}}
                        {{--                                                12:30 am</small>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="d-inline-block">--}}
                        {{--                                <!-- chart-2 -->--}}
                        {{--                                <div class="d-flex mb-1 market-statistics-2">--}}
                        {{--                                    <!-- chart statistics-2 -->--}}
                        {{--                                    <div id="table-donut-chart-2"></div>--}}
                        {{--                                    <!-- data-2 -->--}}
                        {{--                                    <div class="statistics-data ml-50 my-auto">--}}
                        {{--                                        <div class="statistics">--}}
                        {{--                                            <span class="font-medium-2 mr-50 text-bold-600">5,352</span><span class="text-danger">(-4.9%)</span>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="statistics-date"><i class="bx bx-radio-circle font-small-1 text-success mr-25"></i><small class="text-muted">May 12,--}}
                        {{--                                                12:30 am</small>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="col-12 text-md-left">
                            <a href="{{route('backend.product.create')}}" class="btn btn-primary glow"><i class="bx bx-plus"></i> Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- table start -->
                <table id="table-marketing-campaigns" class="table mb-0">
                    <thead>
                    <tr>
                        <th><input type="text" class="form-control" wire:model.live="searchText" placeholder="Поиск по названию"></th>
                        <th>
                            <select class="custom-select" wire:model.change="sortingTypeId">
                                <option value="" selected="">Все</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select class="custom-select" wire:model.change="sortingFirmId">
                                <option selected="">Все</option>
                                @foreach($firms as $firm)
                                    <option value="{{$firm->id}}">{{$firm->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select class="custom-select" wire:model.change="sortingPrice">
                                <option value="" selected="">По умолчанию</option>
                                <option value="min">Сначала дешевые</option>
                                <option value="max">Сначала дорогие</option>
                            </select>
                        </th>
                        <th colspan="2">
                            <select class="custom-select" wire:model.change="sortingPublic">
                                <option value="" selected="">Все</option>
                                <option value="yes">Опубликованные</option>
                                <option value="no">Не опубликованные</option>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Фирма</th>
                        <th>Цена</th>
                        <th>Состояние</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr wire:key="{{$product->id}}">
                            <td class="text-bold-400">
                                <a class="readable-mark-icon" href="{{route('backend.product.edit',$product->id)}}"> {{ Str::limit($product->name, 40)  }} </a>
                                {{--                                <div class="small">{{$product->id}} {{ Str::limit($product->slug , 40)  }}</div>--}}
                                <div class="font-small-1">
                                    <i class="bx bx-pencil font-small-1"></i> {{$product->updated_at->diffForHumans()}},
                                    <i class="bx bx-plus font-small-1"></i> {{$product->created_at->diffForHumans()}}

                                </div>
                            </td>
                            <td>
                                {{$product->type->name}}
                            </td>
                            <td class="">
                                {{$product->collection->firm->name}}, {{$product->collection->name}}
                            </td>
                            <td class="text-bold-600">
                                <div class="text-success"> {{ Number::format($product->actualPriceMetr(),locale: 'ru')}}</div>
                                @if($product->oldPriceMetr())
                                    <div>
                                        <del> {{ Number::format($product->oldPriceMetr(),locale: 'ru')}}</del>
                                    </div>
                                @endif
                            </td>
                            <td class=" ">
                                @if($product->public)
                                    <div wire:click="tooglePublic({{$product->id}})" wire:confirm="Снять с публикации?"
                                         class="badge badge-success badge-icon mr-0 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="" data-original-title="Опубликован на сайте">
                                        <i class="bx bxs-show"></i>
                                    </div>
                                @else
                                    <div class="badge badge-danger badge-icon mr-0 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="" data-original-title="Снят с публикации"
                                         wire:click="tooglePublic({{$product->id}})" wire:confirm="Опубликовать?">
                                        <i class="bx bxs-hide"></i>
                                    </div>
                                @endif

                                @if($product->have_sklad)
                                    <div class="badge badge-success badge-icon mr-1 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="" data-original-title="Имеется в наличии"
                                         wire:click="toogleHave({{$product->id}})" wire:confirm="Установить нет в наличии?">
                                        <i class="bx bx-check"></i>
                                    </div>
                                @else
                                    <div class="badge badge-danger badge-icon mr-1 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="" data-original-title="Нет в наличии"
                                         wire:click="toogleHave({{$product->id}})" wire:confirm="Установить в наличии?">
                                        <i class="bx bx-x"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false" role="menu"></span>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('backend.product.copy',$product->id)}}" title="Сделать дубликат">
                                            <i class="bx bx-copy mr-1"></i> Создать дубликат
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @if($allCount-$count > 0)
                    <div class="ml-3 mr-3">
                        <button type="button" wire:click="loadMore" class="btn mb-1 btn-outline-primary btn-lg btn-block">Загрузить еще ({{$allCount-$count}})</button>
                    </div>
                @endif
                <!-- table ends -->
            </div>
        </div>
    </section>
</div>
