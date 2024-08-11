@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Параметры ')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/b/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/b/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/b/app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
    <!-- invoice list -->
    <section class="invoice-list-wrapper">

        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="{{route('backend.attribute.create')}}" class="btn btn-primary glow invoice-create" role="button"
               aria-pressed="true">Создать</a>
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
                    <th>Опиции</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td></td>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td class="">
                            <a class="readable-mark-icon"
                               href="{{route('backend.attribute.edit',$item->id)}}">{{ Str::limit($item->name, 40)  }}</a><br>
                            <div class="small"> {{ Str::limit($item->slug , 40)  }}</div>
                        </td>
                        <td class="">
                            @foreach($item->attributeOptions as $attributeOption)
                                <div class="small">{{$attributeOption->value}}</div>
                            @endforeach
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
                    {"width": "2%", "targets": 1},
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
