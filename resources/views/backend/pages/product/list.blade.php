@extends('backend.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Продукция ')

{{-- vendor style --}}
@section('vendor-styles')
@endsection

{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    <!-- invoice list -->
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

    <livewire:backend.product />

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
@endsection

{{-- page scripts --}}
@section('page-scripts')
@endsection
