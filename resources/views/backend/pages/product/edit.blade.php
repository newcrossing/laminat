@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактирование')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}  ">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/b/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/b/app-assets/css/pages/app-invoice.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/plugins/file-uploaders/dropzone.css')}}  ">
{{--    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />--}}

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
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Изображения</h4>
            </div>
            <div class="card-content">
                <div class="card-body">


                    <form action="/backend/upload/photo" class="dropzone dropzone-area" id="my_great_dropzone" method="post">
                        <div class="dz-message">Drop Files Here To Upload</div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" value="{{$product->id}}" />

                    </form>
                </div>
            </div>
        </div>
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
{{--    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>--}}
{{--    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>--}}


    <script>
        Dropzone.options.myGreatDropzone = {

            // camelized version of the `id`
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 20, // MB
            url: "/backend/upload/photo",
            addRemoveLinks: true,
            init: function() {
                let myDropzone = this;

                // If you only have access to the original image sizes on your server,
                // and want to resize them in the browser:
                let mockFile = { name: "Filename 2", size: 12345 };
                let resizeThumbnail = false;
                myDropzone.displayExistingFile(mockFile, "http://laminat/public/56a01a1e-4181-44f1-9b38-9a95a65a03c9.jpg");
                let mockFile2 = { name: "Filename 2", size: 12345 };
                let resizeThumbnail2 = false;
                myDropzone.displayExistingFile(mockFile2, "http://laminat/public/56a01a1e-4181-44f1-9b38-9a95a65a03c9.jpg");


                this.on("removedfile", function(file) {
                    console.log(file.dataURL)
                    $.post("delete-file.php?id=" + file.serverId);

                });


            }




        };




    </script>


@endsection
