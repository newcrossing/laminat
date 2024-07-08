@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Документы')

{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('adm/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('adm/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('adm/app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
@endsection

{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <a href="{{route('doc.create')}}" class="btn btn-primary mb-1 ">
                                <i class="bx bx-plus"></i>&nbsp; Добавить
                            </a>
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th><span class="align-middle">ID #</span></th>
                                        <th>Название</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($docs as $doc)
                                        <tr>

                                            <td>
                                                <a href="{{asset('app-invoice-view')}}">{{ $doc->id }}</a>
                                            </td>
                                            <td>
                                                <i class="bx bxs-circle {{($doc->pub)?'success':'danger'}}  font-small-1 mr-50"></i>
                                                <a class="readable-mark-icon" href="{{route('doc.edit',$doc->id)}}">
                                                    {{ Str::limit(  $doc->getShotName() , 90)  }}
                                                </a>
                                                <br>
                                                <small>{{ Str::limit( $doc->name , 400)  }}</small>

                                            </td>
                                            <td>
                                                <small class="text-muted">{{$doc->created_at->format('d.m.Y')}}</small>
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
    <script src="/adm/app-assets/js/datatable-log.js"></script>
@endsection
