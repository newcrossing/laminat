@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Логирование')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/extensions/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Активность </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Логин</th>
                                        <th>Действие</th>

                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($logs as $log)
                                        <tr>
                                            <td>{{$log->id }}</td>
                                            <td>
                                                @isset($log->user_login)
                                                    <div
                                                        class="badge badge-primary d-inline-flex align-items-center mr-1 mb-1">
                                                        <i class="bx bx-user    font-size-small mr-25"></i>
                                                        <span>{{$log->user_login}}</span>
                                                    </div>
                                                @endisset

                                            </td>
                                            <td>
                                                <div
                                                    class="  text-{{ ($log->result!='info')?$log->result:''  }} ">{!! $log->subject!!}</div>
                                                <small class="">{{$log->url}}</small>
                                                <a href="#" class="font-small-1 basic-alert"
                                                   dtext="IP:{{$log->ip}}, Метод:{{$log->method}}, Браузер: {{$log->agent}}, {{$log->parametrs}}">параметры</a>
                                            </td>
                                            <td class="font-small-1">{{$log->created_at->format('H:i  d.m.Y ')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->

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
    <script src="/adm/app-assets/js/datatable-log.js"></script>

    <script src="/adm/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.basic-alert').on('click', function () {
                var text = $(this).attr('dtext')
                Swal.fire({
                    title: 'Параметры',
                    text: text,
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
            });
        });
    </script>

@endsection
