<div>
    <section id="table-Marketing">
        <div class="card">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-12 text-md-left">
                            <a href="{{route('backend.product.create')}}" class="btn btn-primary glow">
                                <i class="bx bx-plus"></i> Добавить
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- table start -->
                <table id="table-marketing-campaigns" class="table mb-0">
                    <thead>
                    <tr>
                        <th>
                            <input type="text" class="form-control" wire:model.live="searchText"
                                   placeholder="Название, фирма, коллекция">
                        </th>
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
                                <option selected="" value="">Все</option>
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
                                <a class="readable-mark-icon"
                                   href="{{route('backend.product.edit',$product->id)}}"> {{ Str::limit($product->name, 40)  }} </a>
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
                                <div>
                                    <span class="text-success mr-1">{{ Number::format($product->price_metr)}}</span>
                                    @if(($product->price_metr_sale > 0 ))
                                        <del> {{ Number::format($product->price_metr_sale,)}}</del>
                                    @endif
                                </div>
                                <div>
                                    <span class="text-success mr-1">{{ Number::format($product->price_upak)}}</span>
                                    @if(($product->price_upak_sale > 0 ))
                                        <del> {{ Number::format($product->price_upak_sale)}}</del>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($product->public)
                                    <div wire:click="tooglePublic({{$product->id}})" wire:confirm="Снять с публикации?"
                                         class="badge badge-success badge-icon mr-0 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="Опубликован на сайте"
                                         data-original-title="Опубликован на сайте">
                                        <i class="bx bxs-show"></i>
                                    </div>
                                @else
                                    <div class="badge badge-danger badge-icon mr-0 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="Снят с публикации"
                                         data-original-title="Снят с публикации"
                                         wire:click="tooglePublic({{$product->id}})" wire:confirm="Опубликовать?">
                                        <i class="bx bxs-hide"></i>
                                    </div>
                                @endif

                                @if($product->have_sklad)
                                    <div class="badge badge-success badge-icon  mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="Имеется в наличии"
                                         data-original-title="Имеется в наличии"
                                         wire:click="toogleHave({{$product->id}})"
                                         wire:confirm="Установить нет в наличии?">
                                        <i class="bx bx-check"></i>
                                    </div>
                                @else
                                    <div class="badge badge-danger badge-icon  mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="Нет в наличии"
                                         data-original-title="Нет в наличии"
                                         wire:click="toogleHave({{$product->id}})" wire:confirm="Установить в наличии?">
                                        <i class="bx bx-x"></i>
                                    </div>
                                @endif

                                @if($product->have_room)
                                    <div class="badge badge-success badge-icon mr-1 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="Имеется в шоуруме"
                                         data-original-title="Имеется в шоуруме"
                                         wire:click="toogleRoom({{$product->id}})">
                                        <i class="bx bx-buildings"></i>
                                    </div>
                                @else
                                    <div class="badge badge-warning badge-icon mr-1 mb-1 cursor-pointer"
                                         data-toggle="tooltip" data-placement="top" title="Нет в шоуруме"
                                         data-original-title="Нет в шоуруме"
                                         wire:click="toogleRoom({{$product->id}})">
                                        <i class="bx bx-buildings"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                <span
                                    class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" role="menu"></span>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('backend.product.copy',$product->id)}}"
                                           title="Сделать дубликат">
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
                        <button type="button" wire:click="loadMore"
                                class="btn mb-1 btn-outline-primary btn-lg btn-block">Загрузить еще
                            ({{$allCount-$count}})
                        </button>
                    </div>
                @endif
                <!-- table ends -->
            </div>
        </div>
    </section>
</div>
