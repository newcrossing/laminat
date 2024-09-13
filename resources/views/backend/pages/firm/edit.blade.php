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
        <form action="{{ (isset($firm->id))? route('backend.firm.update',$firm->id):route('backend.firm.store')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($firm->id))
                @method('PUT')
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-1">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">{{($firm->name)?:"Новый продукт"}}</h4>
                    {{--                    <p class="text-muted">{{($product->article)?"Артикул: ".$product->article:""}}</p>--}}
                </div>
                <div class="d-flex align-content-center flex-wrap gap-2">
                    <div class="px-0 mr-1">
                        <button type="submit" name="redirect" value="delete" class="btn btn-outline-danger ">
                            <i class='bx bx-x-circle'></i> Удалить
                        </button>
                    </div>
                    <a class="btn btn-primary mr-1" href="{{route('backend.firm.index')}}">
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
                                        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" value="{{old('name',$firm->name)}}"
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
                                        <label class="form-label">Ссылка</label>
                                        <input type="text" class="form-control @error('slug') is-invalid  @enderror" name="slug" value="{{old('slug',$firm->slug)}}">
                                        @error('slug')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label class="form-label">Короткое описание</label>
                                            <textarea name="description" class="form-control" rows="8" placeholder="">{{old('description',$firm->description)}}</textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label class="form-label">Описание</label>
                                        <textarea id="editor1" name="text">{{old('text',$firm->text)}}</textarea>
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
                        <div class="card-body pb-0 pt-0">

                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="public" class="custom-control-input" id="public" @checked(old('public', $firm->public)) >
                                    <label class="custom-control-label" for="public"> </label>
                                </div>
                            </div>


                        </div>
                    </div>
                    @if($firm->id)
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Файлы сертификатов и пр.</h5>
                            </div>
                            <div class="card-body pb-0 pt-0">

                                <fieldset class="form-group">
                                    <label for="basicInputFile">Выберите файлы</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="files[]" multiple>
                                        <label class="custom-file-label" for="inputGroupFile01">Выберите файлы</label>
                                    </div>
                                </fieldset>
                                <div class="row app-file-recent-access">
                                    @foreach($firm->files as $file)
                                        {{--                                        "{{ asset(Storage::disk('product')->url('/300/'). $img->full_name_file)}}",--}}
                                        <div class="col-md-6 col-6">
                                            <div class="card border shadow-none mb-1 app-file-info">
                                                <div class="card-content">
                                                    <div class="app-file-content-logo card-img-top mt-1">

                                                        <img class="d-block mx-auto" src="/b/app-assets/images/icon/pdf.png" height="38" width="30" alt="Card image cap">
                                                    </div>
                                                    <div class="card-body p-50">
                                                        <div class="app-file-recent-details">
                                                            <div class="app-file-name font-size-small font-weight-bold">
                                                                <a target="_blank"
                                                                   href="{{Storage::disk('files')->url($file->full_name_file)}}"> {{$file->name.".".$file->extension}}</a>
                                                            </div>
                                                            @if(!Storage::disk('files')->exists($file->full_name_file))
                                                                <div class="app-file-size font-size-small text-danger mb-25"> Нет на сервере</div>
                                                            @endif
                                                            <div class="app-file-size font-size-small text-muted mb-25"> {{$file->getSize()}} </div>
                                                            <div class="app-file-last-access font-size-small text-muted">{{$file->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

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
    @include('backend.panels.library.ckeditor.js')
    @include('backend.panels.library.fileuploader.js')

    <script>
        $('#file-up').fileinput({
            initialPreview: [
                @foreach($firm->fotos as $img)
                    "{{ asset(Storage::disk('product')->url('/300/'). $img->full_name_file)}}",
                @endforeach
            ],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                    @foreach($firm->fotos  as $img)
                    {{--                    @php $size=Storage::size(Storage::disk('local')->path('.gitignore'));  @endphp--}}
                    @php //$size=Storage::size('d:\OSPanel\domains\laminat\public\storage\images\product\100\a784704d-e4e9-4c30-b7ff-ac1c0a01ec14.jpg');  @endphp
                {
                    size: "", width: "120px", url: "{{route('backend.photo.delete',[$img->id , '_token' => csrf_token()])}}"
                },
                @endforeach
            ],
            deleteUrl: "/site/file-delete",
            uploadUrl: '{!! route('backend.photo.upload', ['id' => $firm->id,'model'=> 'firm']) !!}',
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
