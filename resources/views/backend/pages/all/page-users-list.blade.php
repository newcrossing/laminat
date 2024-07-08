@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users List')
{{-- vendor styles --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('adm/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('adm/app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
    <!-- users list start -->
    <section class="users-list-wrapper">

        <div class="users-list-table">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- datatable start -->
                        <div class="table-responsive">
                            <table id="users-list-datatable" class="table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Название</th>



                                    <th>Публикация</th>
                                    <th width="80px">edit</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td><a href="admin/post/{{ $post->id }}">{{ $post->name }}</a></td>



                                        <td><span class="badge badge-light-success">Active</span></td>
                                        <td><a href="{{asset('page-users-edit')}}"><i class="bx bx-edit-alt"></i></a>
                                            <button type="button" class="btn btn-icon  mr-1 mb-1">
                                                <i class="bx bx-trash-alt"></i></button>

                                        </td>
                                    </tr>





                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- datatable ends -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('adm/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('adm/app-assets/js/scripts/pages/page-users.js')}}"></script>
@endsection
