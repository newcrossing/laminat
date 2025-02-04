@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Пользователи')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/page-users.css')}}">
@endsection

@section('content')

    <!-- Zero configuration table -->
    <section class="invoice-list-wrapper">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Пользователи</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Логин</th>
                                        <th>E-mail</th>
                                        <th>Роли</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr class="">
                                            <td></td>
                                            <td>{{$user->id }}</td>
                                            <td>
                                                <a href="{{route('backend.user.edit',$user->id)}}">{{$user->login }}</a>
                                                <div class="font-small-2">{{$user->name }}</div>
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <div class="badge badge-glow badge-info">{{$role->name}}</div>
                                                @endforeach
                                            </td>
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
    <script src="{{asset('/b/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>

@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script type="text/javascript">
        // init data table
        if ($(".invoice-data-table").length) {
            var dataListView = $(".invoice-data-table").DataTable({
                columnDefs: [
                    {"width": "10%", "targets": 1},


                    {
                        targets: 0,
                        className: "control"
                    },

                    {
                        targets: [0, 1],
                        orderable: false
                    },
                ],
                order: [1, 'desc'],
                dom:
                    '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns d-flex align-items-center">><"clear">rt<"bottom"p>',
                language: {
                    search: "",
                    searchPlaceholder: "Поиск"
                },
                select: {
                    style: "multi",
                    selector: "td:first-child",
                    items: "row"
                },
                responsive: {
                    details: {
                        type: "column",
                        target: 0
                    }
                }
            });
        }
    </script>
@endsection
