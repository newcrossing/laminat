@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Точки продаж')
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

    <div class="invoice-create-btn mb-1">
        <a href="/admin/point/create" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true">
            Создать</a>
    </div>
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Точки продаж</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Ссылка</th>
                                        <th>Активна</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($points as $point)
                                        <tr>
                                            <td>{{$point->id }}</td>
                                            <td>
                                                <a href="{{route('point.edit',$point->id)}}">{{$point->address }}</a><br>
                                            </td>
                                            <td>{{$point->link}}</td>
                                            <td>
                                                <i class="bx bxs-circle {{($point->active)?'success':'danger'}}  font-small-1 mr-50"></i>
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
