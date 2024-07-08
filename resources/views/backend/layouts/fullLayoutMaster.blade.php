<!DOCTYPE html>



<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Маша</title>


    {{-- Include core + vendor Styles --}}
    @include('backend.panels.styles')
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body  class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">

        <div class="content-body">
         @yield('content')
        </div>
      </div>
    </div>
    <!-- END: Content-->

    {{-- scripts --}}
    @include('backend.panels.scripts')

  </body>
  <!-- END: Body-->
</html>
