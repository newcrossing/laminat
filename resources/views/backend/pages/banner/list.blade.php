@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Баннеры')
{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
    <!-- invoice list -->
    <section class="invoice-list-wrapper">

        <div class="invoice-create-btn mb-1">
            <a href="{{route('backend.banner.create')}}" class="btn btn-primary glow invoice-create">Создать</a>
        </div>

        <livewire:backend.banner.index/>

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
@endsection
