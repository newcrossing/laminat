@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Документ')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/pickers/pickadate/pickadate.css">
@endsection
{{-- page styles --}}
@section('page-styles')

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
        @if(session('message'))
            <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-error-circle"></i>
                    <span> {{session('message')}}  </span>
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

        <form action="{{ (isset($doc->id))? route('doc.update',$doc->id):route('doc.store')  }}" method="POST">
            @csrf
            @if(isset($doc->id))
                @method('PUT')
            @endif
            @isset($selVersion)
                <input type="hidden" name="id_for_save" value="{{$selVersion}}">
            @endisset

            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">
                                <div class="invoice-subtotal pt-50">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Чей документ </h6>
                                                <input type="text" name="preamble_name" class="form-control"
                                                       value="{{old('preamble_name',$doc->preamble_name)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Номер </h6>
                                                <input type="text" name="nomer" class="form-control"
                                                       value="{{old('nomer',$doc->nomer)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">О чем </h6>
                                                <input type="text" name="short_name" class="form-control"
                                                       value="{{old('short_name',$doc->short_name)}}">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1">
                                        <h6 class="">Название
                                            @if(!empty($doc->id))
                                                <a href="/doc/{{$doc->id}}" target="_blank"><i
                                                        class="bx bx-link-external"></i></a>
                                            @endif
                                        </h6>
                                        <textarea name="name" class="form-control  "
                                                  rows="3">{{old('name',$doc->name)}}</textarea>
                                    </div>

                                </div>
                                <hr>


                                <!-- user profile nav tabs feed start -->

                                <div class="row invoice-info">
                                    <div class="col-lg-12 col-md-12 mt-25">
                                        <textarea class="ckeditor " cols="80" id="editor1"
                                                  name="text">{{old('text',$curText)}}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="invoice-subtotal pt-50">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Теги </h6>
                                                <select name="tags[]" class="select2-customize-result form-control"
                                                        multiple="multiple" id="select2-customize-result">
                                                    @foreach ($tags as $tag)
                                                        <option @if(in_array($tag->id,$sTags)) selected
                                                                @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Примечание </h6>
                                                <textarea name="annotation" class="form-control"
                                                          rows="3">{{old('annotation',$doc->annotation)}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Описание </h6>
                                                <textarea name="description" class="form-control"
                                                          rows="3">{{old('description',$doc->description)}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="invoice-subtotal pt-50">

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Мета заголовок </h6>
                                                <input type="text" name="meta_title" class="form-control"
                                                       value="{{old('meta_title',$doc->meta_title)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <h6 class="invoice-to">Мета описание</h6>
                                                <textarea name="meta_disc" class="form-control"
                                                          rows="5">{{old('text',$doc->meta_disc)}}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- user profile nav tabs feed ends -->
                            </div>

                        </div>

                    </div>
                </div>

                <hr/>
                <hr/>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-body">

                            <div class="invoice-action-btn mb-1 d-flex">
                                <div class="preview w-50 mr-50">
                                    <button type="submit" name="redirect" value="save" class="btn btn-success btn-block"
                                            title="Сохранить">
                                        <i class='bx bx-save'></i>
                                    </button>
                                </div>
                                <div class="save w-50">
                                    <button type="submit" name="redirect" value="apply"
                                            class="btn btn-primary btn-block invoice-send-btn" title="Применить">
                                        <i class="bx bx-send"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="invoice-action-btn mb-1 d-flex">
                                <div class="preview w-50 mr-50">
                                    <a href="/admin/doc/create" class="btn btn-success btn-block">
                                        <i class='bx bx-plus'></i>
                                    </a>
                                </div>
                                <div class="save w-50">
                                    <a href="#"
                                       onclick="window.open('/admin/doc-izm/{{$doc->id}}', '_blank', 'location=yes,height=770,width=1000,scrollbars=yes,status=yes');"
                                       class="btn btn-warning btn-block">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Опубликовать</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="pub" class="custom-control-input"
                                           id="checkedPub" {{!empty($doc->pub)?'checked':''}}>
                                    <label class="custom-control-label" for="checkedPub"> </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if(isset($edition) && $edition->count())
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Редакции </h4>
                                <a class="heading-elements-toggle">
                                    <i class="bx bx-dots-vertical font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="bx bx-chevron-down"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">


                                    @foreach($edition as $izm)
                                        <div>


                                            @if (empty($izm->document->date_vst))
                                                <span
                                                    class=" @if($izm->id == $selVersion) spinner-grow @endif bullet bullet-warning   bullet-sm cursor-pointer"
                                                    title="Дата еще не установлена {{$izm->document->date_vst}}">  </span>
                                                <a href="{{route('doc.edit',$doc->id)}}?izm={{$izm->id}}"
                                                   class="text-warning font-small-2">{{$izm->document->getShotName()}}</a>
                                            @elseif ($izm->document->date_vst->format('Y-m-d') > date('Y-m-d') || empty($izm->document->date_vst))
                                                <span
                                                    class=" @if($izm->id == $selVersion) spinner-grow @endif bullet bullet-info  bullet-sm cursor-pointer"
                                                    title="еще не вступил в силу {{$izm->document->date_vst}}">  </span>
                                                <a href="{{route('doc.edit',$doc->id)}}?izm={{$izm->id}}"
                                                   class="text-info font-small-2">{{$izm->document->getShotName()}}</a>
                                            @elseif($izm->document->date_vst->format('Y-m-d') <= date('Y-m-d') && empty($flag))
                                                <span
                                                    class=" @if($izm->id == $selVersion) spinner-grow @endif bullet bullet-success bullet-sm cursor-pointer"
                                                    title="Действущая редакция"></span>
                                                <a href="{{route('doc.edit',$doc->id)}}?izm={{$izm->id}}"
                                                   class="text-success font-small-2">{{$izm->document->getShotName(). ' - '.$izm->id }}</a>
                                                @php
                                                    // прошли текущию версию, дальше прошлые
                                                    $flag = true;
                                                @endphp
                                            @elseif($izm->document->date_vst->format('Y-m-d') <= date('Y-m-d'))
                                                <span
                                                    class=" @if($izm->id == $selVersion) spinner-grow @endif bullet bullet-danger bullet-sm cursor-pointer"
                                                    title="Прошлые редакция"></span>
                                                <a href="{{route('doc.edit',$doc->id)}}?izm={{$izm->id}}"
                                                   class="text-danger font-small-2">{{$izm->document->getShotName()}}</a>
                                            @endif

                                        </div>
                                    @endforeach
                                    <div>
                                        <span
                                            class=" @if($selVersion == 0) spinner-grow @endif bullet bullet-warning   bullet-sm cursor-pointer"
                                            title="">  </span>
                                        <a href="{{route('doc.edit',$doc->id)}}?izm=0"
                                           class="text-warning font-small-2 ">Первоначальная
                                            версия</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($toEdition) && $toEdition->count())
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Изменяет </h4>
                                <a class="heading-elements-toggle">
                                    <i class="bx bx-dots-vertical font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="bx bx-chevron-down"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    @foreach($toEdition as $izm)
                                        <div>
                                            <span class="  bullet bullet-success   bullet-sm cursor-pointer">  </span>
                                            <a href="{{route('doc.edit',$izm->id)}}"
                                               class="text-success font-small-2">{{$izm->getShotName()}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="invoice-payment">
                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_pod) text-success @endisset">Дата подписания</label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_pod" class="form-control pickadate-months-year"
                                       placeholder="Выберите дату"
                                       value="{{isset($doc->date_pod)?$doc->date_pod->format('d/m/Y'):''}}"/>
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_pub) text-success @endisset">Дата публикации </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_pub" class="form-control pickadate-months-year"
                                       placeholder="Выберите дату"
                                       value="{{isset($doc->date_pub)?$doc->date_pub->format('d/m/Y'):''}}"/>
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_vst) text-success @endisset">Дата вступления в силу </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_vst"
                                       value="{{isset($doc->date_vst)?$doc->date_vst->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>

                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_end_vst) text-success @endisset"> Дата окончания
                                действия </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_end_vst"
                                       value="{{isset($doc->date_end_vst)?$doc->date_end_vst->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>
                        <hr>
                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_npub) text-success @endisset"> Начало публикации на
                                сайте </label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_npub"
                                       value="{{isset($doc->date_npub)?$doc->date_npub->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>
                        <div class="invoice-payment-option mb-2">
                            <label class="@isset($doc->date_kpub) text-success @endisset">Окончание публикации на
                                сайте</label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="date_kpub"
                                       value="{{isset($doc->date_kpub)?$doc->date_kpub->format('d/m/Y'):''}}"
                                       class="form-control  pickadate-months-year" placeholder="Выберите дату">
                                <div class="form-control-position"><i class='bx bx-calendar'></i></div>
                            </fieldset>
                        </div>


                        <div class="invoice-terms">
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Уведомить </span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" name="notify" id="clientNote"
                                        {{!empty($doc->notify)?'checked':''}}
                                        {{($doc->notify_at)?'disabled':''}} >
                                    <label class="custom-control-label" for="clientNote"> </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">На главную</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" id="paymentstub"
                                           name="in_main" {{!empty($doc->in_main)?'checked':''}}>
                                    <label class="custom-control-label" for="paymentstub"> </label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="invoice-terms">
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Удалить - консультант</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" name="delete_consultant" class="custom-control-input"
                                           id="delete_consultant">
                                    <label class="custom-control-label" for="delete_consultant"> </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Удалить ссылки</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" name="delete_a" id="delete_a">
                                    <label class="custom-control-label" for="delete_a"> </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-50">
                                <span class="invoice-terms-title">Удалить пробелы</span>
                                <div class="custom-control custom-switch custom-switch-glow">
                                    <input type="checkbox" class="custom-control-input" id="delete_probel"
                                           name="delete_probel">
                                    <label class="custom-control-label" for="delete_probel"> </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection




{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/adm/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/adm/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="/adm/app-assets/vendors/js/forms/select/select2.full.js"></script>

    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <!-- END: Page Vendor JS-->
@endsection


{{-- page scripts --}}
@section('page-scripts')
    <!-- BEGIN: Page JS-->
    <script src="/adm/app-assets/js/doc.edit.js"></script>
    <script src="/adm/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->
    <script type="text/javascript" src="/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/CKE/ckfinder.js"></script>

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
    <script type="text/javascript">


        $(document).ready(function () {


            //$('.zero-configuration').DataTable();

            /********************************************
             *        js of Order by the grouping        *
             ********************************************/

            var groupingTable = $('.zero-configuration').DataTable({
                bAutoWidth: false,
                "order": [
                    [1, 'desc']
                ],
            });
        });
    </script>

@endsection
