@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактирование')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/extensions/toastr.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/b/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/css/pages/app-invoice.css">

    @include('backend.panels.library.fileuploader.css')
@endsection


@section('content')
    <section class="page-user-profile">
        <form
            action="{{ (isset($product->id))? route('backend.product.update',$product->id):route('backend.product.store')  }}"
            method="POST">
            @csrf
            @if(isset($product->id))
                @method('PUT')
            @endif
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">{{($product->name)?:"Новый продукт"}}</h4>
                    <p class="text-muted">{{($product->article)?"Артикул: ".$product->article:""}}</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-2">
                    <div class="px-0 mr-1">
                        <button type="submit" name="redirect" value="delete" class="btn btn-outline-danger ">
                            <i class='bx bx-x-circle'></i> Удалить
                        </button>
                    </div>
                    @isset($product->id)
                        <a class="btn btn-outline-secondary  mr-1"
                           href="{{route('backend.product.copy', $product->id)}}">
                            <i class='bx bx-copy'></i> Дублировать
                        </a>
                    @endisset
                    <a class="btn btn-primary mr-1" href="{{route('backend.product.index')}}">
                        <i class='bx bx-arrow-back'></i> Отменить
                    </a>
                    <button type="submit" class="btn btn-success ">
                        <i class='bx bx-save'></i> Сохранить
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- user profile heading section start -->
                    <div class="card">
                        <div class="card-content">

                            <!-- user profile nav tabs start -->
                            <div class="card-body px-0 ml-3">
                                <ul class="nav user-profile-nav justify-content-center justify-content-md-start nav-tabs border-bottom-0 mb-0"
                                    role="tablist">
                                    <li class="nav-item pb-0">
                                        <a class=" nav-link d-flex px-1 active" id="feed-tab" data-toggle="tab"
                                           href="#feed" aria-controls="feed" role="tab" aria-selected="true"><i
                                                class="bx bx-home"></i><span
                                                class="d-none d-md-block">Основное</span></a>
                                    </li>
                                    <li class="nav-item pb-0">
                                        <a class="nav-link d-flex px-1" id="activity-tab" data-toggle="tab"
                                           href="#activity" aria-controls="activity" role="tab"
                                           aria-selected="false"><i class="bx bx-user"></i><span
                                                class="d-none d-md-block">Параметры</span></a>
                                    </li>

                                </ul>
                            </div>
                            <!-- user profile nav tabs ends -->
                        </div>
                    </div>
                    <!-- user profile heading section ends -->

                    <!-- user profile content section start -->
                    <div class="row">
                        <!-- user profile nav tabs content start -->
                        <div class="col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane active" id="feed" aria-labelledby="feed-tab" role="tabpanel">
                                    <!-- user profile nav tabs feed start -->
                                    <div class="row">
                                        <!-- invoice view page -->
                                        <div class=" col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-tile mb-0">Информация о продукте</h5>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body pb-0 mx-25">
                                                        <input type="hidden" id="id" name="id" value="1">
                                                        <!-- logo and title -->
                                                        <div class="row mb-1">
                                                            <div class="col-sm-12 col-12 order-2 order-sm-1">
                                                                <label>Название </label>
                                                                <input type="text" name="name"
                                                                       class="form-control @error('name') is-invalid  @enderror"
                                                                       value="{{old('name',$product->name)}}"
                                                                       placeholder="Название" autofocus required>
                                                                @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col">
                                                                <label class="form-label">Артикул</label>
                                                                <input type="text" class="form-control" name="article"
                                                                       value="{{old('article',$product->article)}}">
                                                            </div>
                                                            <div class="col">
                                                                <label class="form-label">Ссылка
                                                                    @if($product->slug)
                                                                        <small><a
                                                                                href="{{route('prod.show',$product->slug)}}"
                                                                                target="_blank">посмотреть на сайте</a></small>
                                                                    @endif
                                                                </label>
                                                                <input type="text" class="form-control" name="slug"
                                                                       value="{{old('slug',$product->slug)}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <fieldset class="form-group">
                                                                    <label class="form-label">Тип продукции</label>
                                                                    <select
                                                                        class="custom-select @error('type_id') is-invalid  @enderror"
                                                                        name="type_id">
                                                                        <option>Не выбрано</option>
                                                                        @foreach(App\Models\Type::all() as $type)
                                                                            <option
                                                                                value="{{$type->id}}" @selected(@$product->type->id== $type->id)>{{$type->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('type_id')
                                                                    <div class="invalid-feedback">{{$message}}</div>
                                                                    @enderror
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-6">
                                                                <fieldset class="form-group">
                                                                    <label class="form-label">Фирма и коллекция</label>
                                                                    <select
                                                                        class="custom-select @error('collection_id') is-invalid  @enderror"
                                                                        name="collection_id">
                                                                        <option>Не выбрано</option>
                                                                        @foreach(App\Models\Firm::with('collections')->get() as $firm)
                                                                            <optgroup label="{{$firm->name}}">
                                                                                @foreach($firm->collections as $collection)
                                                                                    <option
                                                                                        value="{{$collection->id}}" @selected(@$product->collection->id == $collection->id)>{{$collection->name}}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('collection_id')
                                                                    {{--                                            <div class="invalid-feedback">{{$message}}</div>--}}
                                                                    @enderror
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <fieldset class="form-group">
                                                                    <label class="form-label">Короткое описание</label>
                                                                    <textarea name="description" class="form-control"
                                                                              rows="8"
                                                                              placeholder="">{{old('description',$product->description)}}</textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col">
                                                                <label class="form-label">Описание</label>
                                                                <textarea id="editor1"
                                                                          name="text">{{old('text',$product->text)}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- invoice action  -->


                                    </div>
                                    <!-- user profile nav tabs feed ends -->
                                </div>
                                <div class="tab-pane " id="activity" aria-labelledby="activity-tab" role="tabpanel">
                                    <!-- user profile nav tabs activity start -->
                                    <div class="card invoice-action-wrapper shadow-none border">
                                        <div class="card-header">

                                            <h5 class="card-tile mb-1">Дополнительно </h5>

                                            <div class="row mb-1">
                                                <div class="col-4">
                                                    <label class="form-label">Размеры </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="param_sdt"
                                                               value="{{old('param_sdt',$product->param_sdt)}}"
                                                               placeholder="ШхДхТ">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">мм.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 mb-1">
                                                    <label class="form-label">Площадь упаковки </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="square"
                                                               value="{{old('square',$product->square)}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">м<sup>2</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Объем упаковки</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="packing_volume"
                                                               value="{{old('packing_volume',$product->packing_volume)}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">м<sup>3</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Вес упаковки</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="packing_weight"
                                                               value="{{old('packing_weight',$product->packing_weight)}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">кг.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Досок в упаковке</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="number_of_boards"
                                                               value="{{old('number_of_boards',$product->number_of_boards)}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">шт.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <h5 class="card-tile mb-1 mt-2">Параметры </h5>
                                            <div class="row mb-1">
                                                @foreach(App\Models\Attribute::all() as $atribute)
                                                    <div class="col-4 mb-1">
                                                        <label class="form-label">{{$atribute->name}}</label>
                                                        <select class="select2 form-control" name="attributes[]">
                                                            <option></option>
                                                            @foreach($atribute->attributeOptions()->orderByRaw('CAST(value as UNSIGNED) ASC')->orderBy('value')->get() as $options)
                                                                <option
                                                                    @if(in_array($options->id,$attributeOptions)) selected
                                                                    @endif
                                                                    value="{{$options->id}}">{{$options->value}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- user profile nav tabs activity start -->
                                </div>
                                <div class="tab-pane" id="friends" aria-labelledby="friends-tab" role="tabpanel">
                                    <!-- user profile nav tabs friends start -->
                                    <div class="card">

                                    </div>
                                    <!-- user profile nav tabs friends ends -->
                                </div>

                            </div>
                        </div>
                        <!-- user profile nav tabs content ends -->
                        <!-- user profile right side content start -->
                        <div class="col-xl-3 col-md-4 col-12">
                            <div class="card invoice-action-wrapper shadow-none border">
                                <div class="card-header">
                                    <h5 class="card-tile mb-0">Цены</h5>
                                </div>

                                <div class="card-body pb-0 pt-0">
                                    <div class="invoice-action-btn mb-1 d-flex">
                                        <div class="row mb-1">
                                            <div class="col-12">
                                                <label class="form-label">Цена за м<sup>2</sup></label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control @if($product->isPriceMetr()) border-success @endif"
                                                           name="price_metr"
                                                           value="{{old('price_metr',$product->actualPriceMetr())}}"
                                                           autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">руб.</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <label class="form-label">Скидка </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control @if(!$product->isPriceMetr()) border-success @endif"
                                                           name="price_metr_sale"
                                                           value="{{old('price_metr_sale',$product->oldPriceMetr())}}"
                                                           autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">руб.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="invoice-action-btn mb-1 d-flex">
                                        <div class="row mb-1">
                                            <div class="col-12">
                                                <label class="form-label">Цена за упаковку</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control @if($product->isPriceUpak()) border-success @endif"
                                                           name="price_upak"
                                                           value="{{old('price_upak',$product->actualPriceUpak())}}"
                                                           autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">руб.</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <label class="form-label">Скидка </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control @if(!$product->isPriceUpak()) border-success @endif "
                                                           name="price_upak_sale"
                                                           value="{{old('price_upak_sale',$product->oldPriceUpak())}}"
                                                           autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">руб.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <hr class="">
                                    <div class="d-flex justify-content-between py-50">
                                        <span class="invoice-terms-title">Опубликовать</span>
                                        <div class="custom-control custom-switch custom-switch-glow">
                                            <input type="checkbox" name="public" class="custom-control-input"
                                                   id="public" {{!empty($product->public)?'checked':''}}>
                                            <label class="custom-control-label" for="public"> </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between py-50">
                                        <span class="invoice-terms-title">Наличие на складе</span>
                                        <div class="custom-control custom-switch custom-switch-glow">
                                            <input type="checkbox" name="have_sklad" class="custom-control-input"
                                                   id="have_sklad" {{!empty($product->have_sklad)?'checked':''}}>
                                            <label class="custom-control-label" for="have_sklad"> </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between py-50">
                                        <span class="invoice-terms-title">Наличие на шоуруме</span>
                                        <div class="custom-control custom-switch custom-switch-glow">
                                            <input type="checkbox" name="have_room" class="custom-control-input"
                                                   id="have_room" {{!empty($product->have_room)?'checked':''}}>
                                            <label class="custom-control-label" for="have_room"> </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- user profile right side content ends -->
                    </div>
                    <!-- user profile content section start -->
                </div>
            </div>
        </form>
    </section>



    <!-- app invoice View Page -->

    @if($product->id)
        <section class="invoice-edit-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content" style="margin: 20px">
                            <form enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="file-loading">
                                    <input name="images[]" id="file-up" class="file" type="file" multiple
                                           data-min-file-count="1" data-theme="fa5">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                                <button type="reset" class="btn btn-outline-secondary">Сбросить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection


{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/b/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/b/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/b/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/b/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/b/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="/b/app-assets/vendors/js/forms/select/select2.full.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')

    <!-- BEGIN: Page JS-->
    {{--    <script src="{{asset("/b/app-assets/js/)}}"></script>--}}

    <script src={{asset('/b/app-assets/vendors/js/extensions/toastr.min.js')}}></script>
    <script src={{asset('/b/app-assets/js/scripts/extensions/toastr.js')}}></script>
    <script src="/b/app-assets/js/scripts/forms/select/form-select2.js"></script>

    <!-- END: Page JS-->



    @include('backend.panels.library.ckeditor.js')
    @include('backend.panels.library.fileuploader.js')


    <script>
        $('#file-up').fileinput({
            initialPreview: [
                @foreach($product->fotos()->orderBy('order')->get() as $img)
                    "{{  Croppa::url($img->getUrlForCroppa(),800)}}",
                @endforeach
            ],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                    @foreach($product->fotos()->orderBy('order')->get()  as $img)
                {
                    size: "{{$img->getSize()}}",
                    width: "120px",
                    key: {{$img->id}},
                    url: "{{route('backend.photo.delete',[$img->id , '_token' => csrf_token()])}}"
                },
                @endforeach
            ],
            deleteUrl: "/site/file-delete",
            uploadUrl: '{!! route('backend.photo.upload', ['id' => $product->id,'model'=> 'product']) !!}',
            overwriteInitial: false,
            maxFileSize: 1000000,
            //showUpload: false,
            maxFileCount: 20,
            initialCaption: "The Moon and the Earth",
            maxFilePreviewSize: 10240,
            theme: 'bs5',
            language: 'ru',
            showCancel: false,
            showRemove: false,
            showUpload: true,
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp']
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#file-up').on('filesorted', function (event, params) {
            //console.log('File sorted ',params ,params.oldIndex, params.newIndex, params.stack);
            $.ajax({
                url: "{!! route('backend.photo.sorting') !!}",
                async: false,
                type: "POST",
                data: {
                    model: 'product',
                    id: {{$product->id}},
                    params: params.stack,
                },
                success: function (response) {
                    // console.log(response)

                    // setTimeout(function () {
                    //     //$($this).removeClass('load-more-overlay loading');
                    // }, 500);
                },
                error: function (jqXHR, exception) {
                    result = false
                }
            });
        });

    </script>

@endsection
