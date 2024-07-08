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
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/css/pages/app-invoice.css">
@endsection
@section('content')


    <section class="invoice-list-wrapper">
        @if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <span>
                                               {{session('success')}}
                                                </span>
                </div>
            </div>
    @endif
    <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="{{route('post.create')}}" class="btn btn-primary glow invoice-create" role="button"
               aria-pressed="true"
            >Создать статью</a
            >
        </div>
        <!-- Options and filter dropdown button-->

        <div class="table-responsive">
            <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th width="20">ID</th>
                    <th>
                        <span class="align-middle">Название </span>
                    </th>
                    <th>Дата</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>


                @foreach ($posts as $post)
                    <tr>
                        <td></td>
                        <td>{{ $post->id }}</td>

                        <td>
                            <i class="bx bxs-circle {{($post->active)?'success':'danger'}}  font-small-1 mr-50"></i>
                            <a class="readable-mark-icon" data-toggle="tooltip" data-placement="top" title=""
                               data-original-title="{{$post->name}}"
                               href="{{route('post.edit',$post->id)}}">{{ Str::limit($post->name, 70)  }}</a>
                        </td>
                        <td><small class="text-muted">{{$post->date_public->format('d.m.Y')}}</small></td>


                        <td>
                            <div class="invoice-action">

                                <form action="{{route('post.destroy',$post->id)}}" method="post"
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-light-danger mr-1 mb-0">
                                        <i class="bx bx-trash-alt"></i></button>
                                </form>


                            </div>

                        </td>
                    </tr>


                @endforeach

                </tbody>
            </table>
        </div>
    </section>




@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <!-- BEGIN: Page JS-->
    <script src="/adm/app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->
@endsection
