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
        @if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <span>  {{session('success')}}  </span>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-error"></i>
                    <span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
                </div>
            </div>
        @endif


        <form action="{{ (isset($product->id))? route('product.update',$product->id):route('product.store')  }}" method="POST">
            @csrf
            @if(isset($product->id))
                @method('PUT')
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">{{($product->name)?:"Новый продукт"}}</h4>
                    {{--                <p class="text-muted">Orders placed across your store</p>--}}
                </div>
                <div class="d-flex align-content-center flex-wrap gap-2">
                    <div class="px-0 mr-1">
                        <button type="submit" name="redirect" value="delete" class="btn btn-outline-danger ">
                            <i class='bx bx-x-circle'></i> Удалить
                        </button>
                    </div>
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
                                               placeholder="Название">
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
                            <div class="invoice-action-btn mb-1">
                                <label class="form-label">Цена за упаковку</label>
                                <input type="text" class="form-control" name="price" value="{{old('price',$product->price)}}" placeholder="руб.">
                            </div>

                            <div class="invoice-action-btn mb-1">
                                <label class="form-label">Площадь упаковки</label>
                                <input type="text" class="form-control" name="square" value="{{old('square',$product->square)}}" placeholder="м. кв.">
                            </div>

                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="public" class="custom-control-input" id="paymentTerm" {{!empty($product->public)?'checked':''}}>
                                    <label class="custom-control-label" for="paymentTerm"> </label>
                                </div>
                            </div>
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
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
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

    <script type="text/javascript">
        $(document).ready(function () {

            $('button#save').bind('click', function () {


                $('button#save').html('<span class="spinner-border spinner-border-sm" ></span> Сохранение...')
                $('button#save').attr('disabled', 'disabled');
                let id = $('#id').val()
                let name = $('#name').val()
                console.log('id=' + id)
                var arr = {id: id, name: name, _token: '{{ csrf_token() }}'};

                $.ajax({
                    {{--url: '{{route('backend.product.update')}}',--}}
                    method: 'post',
                    dataType: 'json',
                    data: arr,
                    async: false,
                    success: function (data) {
                        console.log(data);
                        obj = JSON.parse(data);
                        toastr.success('Данные сохранены на сервере. ' + obj, 'Сохранено');
                        $('button#save').html(" <i class='bx bx-save'></i><span>Сохранить</span>")
                        $('button#save').removeAttr('disabled');


                    },
                    error: function (jqXHR, ee, tt) {

                        $('button#save').html(" <i class='bx bx-save'></i><span>Сохранить</span>")
                        toastr.error(jqXHR.responseJSON, 'Ошибка сохранения');
                        //  $('button#save').removeAttr('disabled');
                        console.log(jqXHR.responseJSON);
                    }


                });
            });
        });
    </script>

    <script type="text/javascript" src="/b/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/b/CKE/ckfinder.js"></script>

    <script type="text/javascript">
        if (typeof CKEDITOR == 'undefined') {
            document.write('Error');
        } else {
            var editor = CKEDITOR.replace('editor1',
                {
                    toolbar: [
                        ['Source', '-', 'NewPage', 'Preview'], ['PasteText', 'PasteFromWord', '-', 'SpellChecker', 'Scayt'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], '/', ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Table', 'HorizontalRule', 'SpecialChar'], '/', [, 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize', 'ShowBlocks', '-', 'About']
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
    <script>$.fn.fileinput.defaults.theme = 'fa5';</script>

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
{{--                    @php $size=Storage::size(Storage::disk('product')->path('/300/'). $img->full_name_file);  @endphp--}}
                    @php $size=Storage::size('d:\OSPanel\domains\laminat\public\storage\images\product\100\a784704d-e4e9-4c30-b7ff-ac1c0a01ec14.jpg');  @endphp
                {
                  size:"{{$size}}",  width: "120px", url: "{{route('backend.photo.delete',[$img->id , '_token' => csrf_token()])}}"
                },
                @endforeach
            ],
            deleteUrl: "/site/file-delete",
            uploadUrl: '{!! route('backend.photo.upload', ['id' => $product->id,'model'=> 'product']) !!}',
            overwriteInitial: false,
            maxFileSize: 10000,
            //showUpload: false,
            maxFileCount: 3,
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
