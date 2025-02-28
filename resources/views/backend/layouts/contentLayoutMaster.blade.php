<!DOCTYPE html>


<html class="loading" data-textdirection="rtl">

<!-- BEGIN: Head-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title') - Админка</title>
    <link rel="apple-touch-icon" href="{{asset('/b/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/b/app-assets/images/ico/favicon.ico')}}">

    {{-- Include core + vendor Styles --}}
    @include('backend.panels.styles')
    @livewireStyles
</head>
<!-- END: Head-->

@include('backend.layouts.verticalLayoutMaster')

</html>
