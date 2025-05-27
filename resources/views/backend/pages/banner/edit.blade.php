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
    <!-- app invoice View Page -->
    <section class="invoice-edit-wrapper">
        <form action="{{ (isset($banner->id))? route('backend.banner.update',$banner->id):route('backend.banner.store')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($banner->id))
                @method('PUT')
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">{{($banner->name)?:"Новый"}}</h4>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-2">
                    <div class="px-0 mr-1">
                        <button type="submit" name="redirect" value="delete" class="btn btn-outline-danger ">
                            <i class='bx bx-x-circle'></i> Удалить
                        </button>
                    </div>
                    <a class="btn btn-primary mr-1" href="{{route('backend.banner.index')}}">
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
                                        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror"
                                               value="{{old('name',$banner->name)}}" autofocus required/>
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-sm-8 col-12 order-2 order-sm-1">
                                        <label>Целевой URL</label>
                                        <input type="text" name="target_url" class="form-control @error('target_url') is-invalid  @enderror"
                                               value="{{old('target_url',$banner->target_url)}}">
                                        @error('target_url')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 col-12 order-2 order-sm-1">
                                        <label>Учитывать вложенность</label>
                                        <fieldset>
                                            <div class="checkbox">
                                                <input type="checkbox" class="checkbox-input" name="target_url_self" id="checkbox1"
                                                        @checked(old('target_url_self', $banner->target_url_self))>
                                                <label for="checkbox1">Учитывать </label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1">
                                        <label>URL </label>
                                        <input type="text" name="url" class="form-control @error('url') is-invalid  @enderror" value="{{old('url',$banner->url)}}">
                                        @error('url')
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
                            <h5 class="card-tile mb-0">Параметры</h5>
                        </div>
                        <div class="col">
                            <h6>Расположение</h6>
                            <fieldset class="form-group">
                                <select class="form-control" name="block">
                                    <option value="main-center" @selected(@$banner->block== 'main-center')>На главной в центре</option>
                                    <option value="main-left" @selected(@$banner->block== 'main-left')>На главной слева</option>
                                    <option value="main-right" @selected(@$banner->block== 'main-right')>На главной справа</option>
                                    <option value="type" @selected(@$banner->block== 'type')>В типе продукции</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="card-body pb-0 pt-0">
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="public" class="custom-control-input" id="public" @checked(old('public', $banner->public)) >
                                    <label class="custom-control-label" for="public"> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>
    @if($banner->id)
        <section class="invoice-edit-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content" style="margin: 20px">
                            <p class="text-warning">Грузим сюда одно изображение</p>
                            <form enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="file-loading">
                                    <input name="images[]" id="file-up" class="file" type="file" multiple data-min-file-count="1" data-theme="fa5">
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
    <script src={{asset('/b/app-assets/vendors/js/extensions/toastr.min.js')}}></script>
    <script src={{asset('/b/app-assets/js/scripts/extensions/toastr.js')}}></script>
    <script src="/b/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->

    @include('backend.panels.library.fileuploader.js')
    <script>
        $('#file-up').fileinput({
            initialPreview: [
                @foreach($banner->fotos as $img)
                    "{{  Croppa::url($img->getUrlForCroppa(),800)}}",
                @endforeach
            ],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                    @foreach($banner->fotos  as $img)
                {
                    size: "{{$img->getSize()}}", width: "120px", url: "{{route('backend.photo.delete',[$img->id , '_token' => csrf_token()])}}"
                },
                @endforeach
            ],
            deleteUrl: "/site/file-delete",
            uploadUrl: '{!! route('backend.photo.upload', ['id' => $banner->id,'model'=> 'banner']) !!}',
            overwriteInitial: false,
            maxFileSize: 1000000,
            //showUpload: false,
            maxFileCount: 1,
            initialCaption: "Жду изображения",
            maxFilePreviewSize: 10240,
            theme: 'bs5',
            language: 'ru',
            showCancel: false,
            showRemove: false,
            showUpload: true,
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif']
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

@endsection
