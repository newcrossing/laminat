@extends('backend.layouts.contentLayoutMaster')

@section('title','Алгоритм')

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
    <div class="invoice-create-btn mb-1">
        <a href="{{route('step.create')}}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true">
            Создать</a>
    </div>
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Алгоритм</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Номер</th>
                                        <th>Название</th>
                                        <th>Ссылка</th>
                                        <th>Активна</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($steps as $step)
                                        <tr>
                                            <td>{{$step->number }}</td>
                                            <td>
                                                <a href="{{route('step.edit',$step->id)}}">{{$step->name }}</a><br>
                                            </td>
                                            <td></td>
                                            <td>
                                                <i class="bx bxs-circle {{($step->active)?'success':'danger'}}  font-small-1 mr-50"></i>
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
@endsection

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

@section('page-scripts')
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>
@endsection
