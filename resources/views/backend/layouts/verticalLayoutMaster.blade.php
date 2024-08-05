<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns {{--- menu-collapsed---}}
menu-collapsed
    dark-layout
fixed static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
@include('backend.panels.navbar')
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@include('backend.panels.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    {{-- Application page structure --}}
    @if(config('admin.isContentSidebar') === true)
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    @yield('sidebar-content')
                </div>
            </div>
            <div class="content-right">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                        <div class="content-header-left col-12 mb-2 mt-1">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h5 class="content-header-title float-left pr-1 mb-0">Date &amp; Time Picker</h5>
                                    <div class="breadcrumb-wrapper col-12">
                                        <ol class="breadcrumb p-0 mb-0">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="bx bx-home-alt"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Form Elements</a>
                                            </li>
                                            <li class="breadcrumb-item active">Date &amp; Time Picker
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body">

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- others page structures --}}
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            @include('backend.panels.message')


            <div class="content-header row">
                @if(config('admin.pageHeader')=== true && isset($breadcrumbs))
                    @include('backend.panels.breadcrumbs')
                @endif
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    @endif
</div>
<!-- END: Content-->
@if( config('admin.isCustomizer') === true && !empty(config('admin.isCustomizer')))
    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block">
        <a class="customizer-close" href="#"><i class="bx bx-x"></i></a>
        <a class="customizer-toggle" href="#"><i class="bx bx-cog bx bx-spin white"></i></a>
        @include('backend.pages.customizer-content')
    </div>
    <!-- End: Customizer-->

@endif


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('backend.panels.footer')
<!-- END: Footer-->

@include('backend.panels.scripts')
</body>
<!-- END: Body-->
