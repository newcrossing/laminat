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
        <form action="{{ (isset($attribute_option->id))? route('backend.attribute-option.update',$attribute_option->id):route('backend.attribute-option.store')  }}" method="POST">
            @csrf
            @if(isset($attribute_option->id))
                @method('PUT')
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">{{($attribute_option->value)?:"Новый продукт"}}</h4>
                    {{--                    <p class="text-muted">{{($product->article)?"Артикул: ".$product->article:""}}</p>--}}
                </div>
                <div class="d-flex align-content-center flex-wrap gap-2">
                    <div class="px-0 mr-1">
                        <button type="submit" name="redirect" value="delete" class="btn btn-outline-danger ">
                            <i class='bx bx-x-circle'></i> Удалить
                        </button>
                    </div>
                    <a class="btn btn-primary mr-1" href="{{route('backend.attribute-option.index')}}">
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
                            <h5 class="card-tile mb-0">Информация </h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">

                                <!-- logo and title -->
                                <div class="row mb-1">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1">
                                        <label>Название </label>
                                        <input type="text" name="value" class="form-control @error('value') is-invalid  @enderror" value="{{old('value',$attribute_option->value)}}"
                                               placeholder="Название" autocomplete="off" autofocus required>
                                        @error('value')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-12">
                                        <label class="form-label">Параметр</label>
                                        <select class="custom-select @error('attribute_id') is-invalid  @enderror" name="attribute_id">
                                            @foreach(\App\Models\Attribute::all() as $attribute)
                                                <option value="{{$attribute->id}}" @selected(@$attribute_option->attribute->id == $attribute->id)>{{$attribute->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('attribute_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
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
                            <h5 class="card-tile mb-0">Параметр</h5>
                        </div>
                        @if(isset($attribute_option->id))
                            <div class="card-body pb-0 pt-0">

                                <a href="{{route('backend.attribute.edit',$attribute_option->attribute->id)}}" class="text-bold-600">
                                    {{$attributeRoot->name}}
                                </a>
                                <ul>
                                    @foreach($attributeRoot->attributeOptions()->orderBy('value')->get() as  $atr)
                                        <li><a href="{{route('backend.attribute-option.edit',$atr->id)}}">{{$atr->value}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </form>
    </section>

    <hr>
    <hr>
    @if(!empty($attributeRoot->id))

        <section class="invoice-edit-wrapper">
            <form action="{{ route('backend.attribute-option.store')  }}" method="POST">
                @csrf
                <div class="row">
                    <!-- invoice view page -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Добавить новую опцию в параметр: <span class="text-primary">{{$attributeRoot->name}} </span></h5>
                            </div>
                            <div class="card-content">
                                <div class="card-body pb-0 mx-25">

                                    <!-- logo and title -->
                                    <div class="row mb-1">
                                        <div class="col-sm-12 col-12 order-2 order-sm-1">
                                            <label>Название </label>
                                            <input type="text" name="value" class="form-control @error('value') is-invalid  @enderror" value=""
                                                   placeholder="Название" autocomplete="off" autofocus required>
                                            @error('value')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row mb-1">


                                        <div class="col-12">
                                            <label class="form-label">Параметр</label>
                                            <select class="custom-select @error('attribute_id') is-invalid  @enderror" name="attribute_id">
                                                @foreach(\App\Models\Attribute::all() as $attribute)
                                                    <option value="{{$attribute->id}}" @selected(@$attribute_option->attribute->id == $attribute->id)>{{$attribute->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('attribute_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <button type="submit" class="btn btn-success ">
                                <i class='bx bx-save'></i> Добавить
                            </button>

                        </div>

                    </div>

                </div>
            </form>
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

@endsection
