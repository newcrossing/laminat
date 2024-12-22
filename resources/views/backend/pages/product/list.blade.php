@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Продукция ')
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
            <a href="{{route('backend.product.create')}}" class="btn btn-primary glow invoice-create" role="button"
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
                    <th>Тип продукции</th>
                    <th>Цена за м.</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td></td>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td class="">
                            <i class="bx bxs-circle {{($product->public)?'success':'danger'}}  font-small-1 mr-50"></i>
                            <a class="readable-mark-icon"
                               href="{{route('backend.product.edit',$product->id)}}">{{ Str::limit($product->name, 40)  }}
                            </a>
                            <br>
                            <div class="small"> {{ Str::limit($product->slug , 40)  }}</div>

                        </td>
                        <td class="">
                            {{$product->type->name}}
                            <div class="small text-muted">{{$product->collection->firm->name}}, {{$product->collection->name}} </div>
                        </td>
                        <td class="text-bold-600">
                            <div class="text-success"> {{ Number::format($product->actualPriceMetr(),locale: 'ru')}} <sub>руб.</sub></div>
                            @if($product->oldPriceMetr())
                                <div>
                                    <del> {{ Number::format($product->oldPriceMetr(),locale: 'ru')}}</del>
                                    <sub>руб.</sub>
                                </div>
                            @endif
                        </td>
                        <td class="text-bold-600">
                            <a href="{{route('backend.product.copy',$product->id)}}" class="invoice-action-edit cursor-pointer" title="Сделать дубликат">
                                <i class="bx bx-copy"></i>
                            </a>
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
