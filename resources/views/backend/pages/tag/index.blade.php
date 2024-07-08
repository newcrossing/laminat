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
        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="/admin/tag/create" class="btn btn-primary glow invoice-create" role="button"
               aria-pressed="true">
                Создать</a>
        </div>
        <!-- Options and filter dropdown button-->
        <div class="table-responsive">
            <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th></th>

                    <th>
                        <span class="align-middle">ID #</span>
                    </th>
                    <th>Название</th>


                </tr>
                </thead>
                <tbody>

                @foreach ($tags as $tag)
                    <tr>
                        <td></td>

                        <td>
                            {{ $tag->id }}
                        </td>
                        <td>
                            <i class="bx bxs-circle {{($tag->active)?'success':'danger'}}  font-small-1 mr-50"></i>
                            <a class="readable-mark-icon"
                               href="{{route('tag.edit',$tag->id)}}">{{ Str::limit($tag->name, 40)  }}</a><br>
                            {{ Str::limit($tag->slug , 40)  }}
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
    <script type="text/javascript">
        // init data table
        if ($(".invoice-data-table").length) {
            var dataListView = $(".invoice-data-table").DataTable({
                columnDefs: [
                    {"width": "10%", "targets": 0},


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
                        target: 1
                    }
                }
            });
        }
    </script>
@endsection
