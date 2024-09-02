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




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="/b/fileuploader/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link href="/b/fileuploader/themes/explorer-fa5/theme.css" media="all" rel="stylesheet" type="text/css"/>

@endsection


@section('content')
    <!-- app invoice View Page -->
    <section class="invoice-edit-wrapper">
        <form action="{{ (isset($product->id))? route('backend.product.update',$product->id):route('backend.product.store')  }}" method="POST">
            @csrf
            @if(isset($product->id))
                @method('PUT')
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
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
                    <a class="btn btn-primary mr-1" href="{{route('backend.product.index')}}">
                        <i class='bx bx-arrow-back'></i> Отменить
                    </a>
                    <button type="submit" class="btn btn-success ">
                        <i class='bx bx-save'></i> Сохранить
                    </button>
                </div>
            </div>
            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
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
                                        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" value="{{old('name',$product->name)}}"
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
                                        <input type="text" class="form-control" name="article" value="{{old('article',$product->article)}}">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Ссылка</label>
                                        <input type="text" class="form-control" name="slug" value="{{old('slug',$product->slug)}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <fieldset class="form-group">
                                            <label class="form-label">Тип продукции</label>
                                            <select class="custom-select @error('type_id') is-invalid  @enderror" name="type_id">
                                                <option>Не выбрано</option>
                                                @foreach(App\Models\Type::all() as $type)
                                                    <option value="{{$type->id}}" @selected(@$product->type->id== $type->id)>{{$type->name}}</option>
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
                                            <select class="custom-select @error('collection_id') is-invalid  @enderror" name="collection_id">
                                                <option>Не выбрано</option>
                                                @foreach(App\Models\Firm::with('collections')->get() as $firm)
                                                    <optgroup label="{{$firm->name}}">
                                                        @foreach($firm->collections as $collection)
                                                            <option value="{{$collection->id}}" @selected(@$product->collection->id == $collection->id)>{{$collection->name}}</option>
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
                                            <textarea name="description" class="form-control" rows="8" placeholder="">{{old('description',$product->description)}}</textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label class="form-label">Описание</label>
                                        <textarea id="editor1" name="text">{{old('text',$product->text)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Цены</h5>
                        </div>

                        <div class="card-body pb-0 pt-0">
                            <div class="invoice-action-btn mb-1 d-flex">
                                <div class="preview w-50 mr-50">
                                    <label class="form-label">Цена за м<sup>2</sup></label>
                                    <input type="text" class="form-control @if($product->isPriceMetr()) border-success @endif" name="price_metr"
                                           value="{{old('price_metr',$product->price_metr)}}" placeholder="руб."
                                           autocomplete="off">

                                </div>
                                <div class="save w-50">
                                    <label class="form-label">Скидка</label>
                                    <input type="text" class="form-control @if(!$product->isPriceMetr()) border-success @endif" name="price_metr_sale"
                                           value="{{old('price_metr_sale',$product->price_metr_sale)}}" placeholder="руб."
                                           autocomplete="off">
                                </div>
                            </div>
                            <hr>
                            <div class="invoice-action-btn mb-1 d-flex">
                                <div class="preview w-50 mr-50">
                                    <label class="form-label">За упаковку</label>
                                    <input type="text" class="form-control @if($product->isPriceUpak()) border-success @endif" name="price_upak"
                                           value="{{old('price_upak',$product->price_upak)}}" placeholder="руб.">

                                </div>
                                <div class="save w-50">
                                    <label class="form-label">Скидка</label>
                                    <input type="text" class="form-control @if(!$product->isPriceUpak()) border-success @endif " name="price_upak_sale"
                                           value="{{old('price_upak_sale',$product->price_upak_sale)}}" placeholder="руб."
                                           autocomplete="off">
                                </div>
                            </div>
                            <hr>
                            <hr>

                            <div class="invoice-action-btn mb-1">
                                <label class="form-label">Площадь упаковки м<sup>2</sup></label>
                                <input type="text" class="form-control" name="square" value="{{old('square',$product->square)}}" placeholder="м. кв.">
                            </div>

                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="public" class="custom-control-input" id="public" {{!empty($product->public)?'checked':''}}>
                                    <label class="custom-control-label" for="public"> </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Наличие на складе</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="have_sklad" class="custom-control-input" id="have_sklad" {{!empty($product->have_sklad)?'checked':''}}>
                                    <label class="custom-control-label" for="have_sklad"> </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Наличие на шоуруме</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="have_room" class="custom-control-input" id="have_room" {{!empty($product->have_room)?'checked':''}}>
                                    <label class="custom-control-label" for="have_room"> </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-header">

                            <h5 class="card-tile mb-1">Дополнительно </h5>
                            <div class=" invoice-action-btn mb-1">
                                <label class="form-label">Размеры (ШхДхТ) мм.</label>
                                <input type="text" class="form-control" name="param_sdt" value="{{old('param_sdt',$product->param_sdt)}}" placeholder="ШхДхТ">
                            </div>
                            <h5 class="card-tile mb-1 mt-2">Характеристики </h5>
                            @foreach(App\Models\Attribute::all() as $atribute)

                                <div class="invoice-action-btn mb-1">
                                    <label class="form-label">{{$atribute->name}}</label>
                                    <select class="custom-select" id="customSelect" name="attributes[]">
                                        <option></option>
                                        @foreach($atribute->attributeOptions as $options)
                                            <option @if(in_array($options->id,$attributeOptions)) selected @endif  value="{{$options->id}}">{{$options->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>
    <section>
        <form enctype="multipart/form-data" method="post">
            @csrf
            <div class="file-loading">
                <input id="kv-explorer" type="file" multiple>
            </div>
            <br>
            <div class="file-loading">
                <input name="images[]" id="file-up" class="file" type="file" multiple data-min-file-count="1" data-theme="fa5">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button type="reset" class="btn btn-outline-secondary">Сбросить</button>
        </form>
    </section>

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
    {{--    <script src="/b/app-assets/vendors/js/extensions/dropzone.min.js"></script>--}}
    {{--    <script src="{{asset('/b/app-assets/vendors/js/ui/prism.min.js')}}"></script>--}}
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



    <script type="text/javascript" src="/b/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/b/CKE/ckfinder.js"></script>
    <script type="text/javascript">
        if (typeof CKEDITOR == 'undefined') {
            document.write('Error');
        } else {
            var editor = CKEDITOR.replace('editor1',
                {
                    toolbar : [
                        ['Source', '-', 'NewPage', 'Preview'], ['PasteText', 'PasteFromWord', '-', 'SpellChecker', 'Scayt'],
                        ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], '/', ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
                        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                        ['Link', 'Unlink', 'Anchor'], ['Image', 'Table', 'HorizontalRule', 'SpecialChar'], '/', [, 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize', 'ShowBlocks', '-', 'About']
                    ]
                });
            CKFinder.setupCKEditor(editor, '/CKE/');
        }
    </script>
    {{--    <script src="{{asset("/b/app-assets/js/)}}"></script>--}}



    <script src="/b/fileuploader/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="/b/fileuploader/js/plugins/filetype.min.js" type="text/javascript"></script>
    <script src="/b/fileuploader/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="/b/fileuploader/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="/b/fileuploader/js/fileinput.js" type="text/javascript"></script>
    <script src="/b/fileuploader/js/locales/ru.js" type="text/javascript"></script>

    <script src="/b/fileuploader/themes/gly/theme.js" type="text/javascript"></script>
    <script src="/b/fileuploader/themes/fa5/theme.js" type="text/javascript"></script>
    <script src="/b/fileuploader/themes/explorer-fa5/theme.js" type="text/javascript"></script>


    <script>
        $('#file-up').fileinput({
            initialPreview: [
                @foreach($product->fotos as $img)
                    "{{ asset(Storage::disk('product')->url('/300/'). $img->full_name_file)}}",
                @endforeach
            ],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                    @foreach($product->fotos  as $img)
                    {{--                    @php $size=Storage::size(Storage::disk('local')->path('.gitignore'));  @endphp--}}
                    @php //$size=Storage::size('d:\OSPanel\domains\laminat\public\storage\images\product\100\a784704d-e4e9-4c30-b7ff-ac1c0a01ec14.jpg');  @endphp
                {
                    size: "", width: "120px", url: "{{route('backend.photo.delete',[$img->id , '_token' => csrf_token()])}}"
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


            allowedFileExtensions: ['jpg', 'png', 'gif']
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

@endsection
