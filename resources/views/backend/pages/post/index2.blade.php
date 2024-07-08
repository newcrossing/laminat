@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Статьи')
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
    <!-- invoice list -->
    <section class="invoice-list-wrapper">
        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="/admin/post/create" class="btn btn-primary glow invoice-create" role="button"
               aria-pressed="true">
                Создать статью</a>
        </div>
        <!-- Options and filter dropdown button-->
        <div class="table-responsive">
            <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>
                        <span class="align-middle">ID #</span>
                    </th>
                    <th>Название</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($posts as $post)

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{asset('app-invoice-view')}}">{{ $post->id }}</a>
                        </td>
                        <td>
                            <i class="bx bxs-circle {{($post->pub)?'success':'danger'}}  font-small-1 mr-50"></i>
                            <a class="readable-mark-icon" data-toggle="tooltip" data-placement="top" title=""
                               data-original-title="{{$post->name}}"
                               href="{{route('post.edit',$post->id)}}">{{ Str::limit($post->name, 40)  }}</a></td>
                        <td><small class="text-muted">{{$post->date_public->format('d.m.Y')}}</small></td>


                        <td>
                            <div class="invoice-action">
                                <a href="/post/{{ $post->id }}" class="invoice-action-view mr-1">
                                    <i class="bx bx-show-alt"></i>
                                </a>
                                {{-- <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                                     <i class="bx bx-x"></i>
                                 </a>--}}
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
    <script src="{{asset('/adm/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script type="text/javascript" >

        // init data table
        if ($(".invoice-data-table").length) {
            var dataListView = $(".invoice-data-table").DataTable({
                columnDefs: [
                    {
                        targets: 0,
                        className: "control"
                    },

                    {
                        targets: [0, 1, 2],
                        orderable: false
                    },
                ],
                order: [2, 'desc'],
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
