@extends('front.layouts.main')

@section('title',$info->name)

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{$info->name}}</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content mb-8">
            <div class="container">
                <div class=" ">
                    <div class="main-content ">
                        <div class="post post-grid post-single">
                            <figure class="post-media br-sm">

                            </figure>
                            <div class="post-details">
                               {!! $info->text !!}
                            </div>
                        </div>









                    </div>
                    <!-- End of Main Content -->

                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('page-scripts')
@endsection
