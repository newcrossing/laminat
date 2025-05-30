@extends('front.layouts.main')

@section('title','Избранное')
@section('description','Избранное в интернет-магазине Пол России.')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('content')
    <main class="main wishlist-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Избранное</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <livewire:front.wishlists.index/>
        </div>
        <!-- End of PageContent -->
    </main>

@endsection

@section('page-scripts')
@endsection
