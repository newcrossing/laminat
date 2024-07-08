@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Пользователи')
{{-- vendor style --}}
@section('vendor-styles')

    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    <!-- account setting page start -->
    <section id="page-account-settings">
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
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- left menu section -->
                    <!-- right content section -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                             aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form action="{{  route('admin.user.create_many')  }}" method="POST">
                                                @csrf


                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <fieldset>
                                                            <div class="input-group">
                                                                <input type="text" name="number" class="form-control" value="10" aria-describedby="button-addon2">
                                                                <div class="input-group-append" id="button-addon2">
                                                                    <button class="btn btn-primary" type="submit">Сгенерировать</button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                                @isset($arr)
                                                    <div class="alert alert-warning mb-2" role="alert">
                                                        Будьте внимательны. Эти данные показываются один раз. Скопируйте их при необходимости.
                                                    </div>

                                                    @foreach ($arr as $ar)
                                                        <h6>{{$ar['login']}}|{{$ar['password']}}|{{$ar['qr']}}</h6>
                                                    @endforeach
                                                @endisset


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page ends -->




@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>


@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>

@endsection
