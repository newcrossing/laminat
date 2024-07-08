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
        <h3>{{$doc->getShotName() }}</h3>
        <form action="{{route('admin.doc.izm.update',$doc->id) }}" method="POST">
            @csrf


            <div class="row">
                <!-- invoice view page -->
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0 mx-25">


                                <!-- Zero configuration table -->
                                <section id="basic-datatable">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body card-dashboard">

                                                        <div class="table-responsive">
                                                            <table class="table zero-configuration">
                                                                <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    {{--                                                                    <th><span class="align-middle">ID #</span>--}}
                                                                    </th>
                                                                    <th>Название</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach ($docs as $d)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <input type="checkbox" class="checkbox-input" id="checkbox{{ $d->id }}" name="chek[]" value="{{ $d->id }}">
                                                                                <label for="checkbox{{ $d->id }}"></label>
                                                                            </div>
                                                                        </td>
                                                                        {{--                                                                        <td>--}}
                                                                        {{--                                                                            <a href="{{asset('app-invoice-view')}}">{{ $d->id }}</a>--}}
                                                                        {{--                                                                        </td>--}}
                                                                        <td>
                                                                            <a class="readable-mark-icon" href="{{route('doc.edit',$d->id)}}" title="{{ $d->name  }}">
                                                                                {{ Str::limit(  $d->getShotName() , 90)  }}
                                                                            </a>
                                                                        </td>


                                                                    </tr>
                                                                @endforeach
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!--/ Zero configuration table -->


                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <!-- invoice action  -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card invoice-action-wrapper shadow-none border">
                        <div class="card-body">

                            <div class="invoice-action-btn mb-1 d-flex">
                                <div class="preview w-50 mr-50">
                                    <button type="submit" name="redirect" value="save" class="btn btn-success btn-block" title="Сохранить">
                                        <i class='bx bx-save'></i>
                                    </button>
                                </div>
                                <div class="save w-50">
                                    <button type="submit" name="redirect" value="apply" class="btn btn-primary btn-block invoice-send-btn" title="Применить">
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
                                    <a href="#" onclick="window.open('/admin/doc-izm', '_blank', 'location=yes,height=770,width=820,scrollbars=yes,status=yes');" class="btn btn-warning btn-block">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


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
                                            <a href="{{route('admin.doc.izm',$doc->id)}}?del={{$izm->id}}" class="text-success font-small-2">{{$izm->getShotName()}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


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
