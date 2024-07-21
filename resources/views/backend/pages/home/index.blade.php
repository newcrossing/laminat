@extends('backend.layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Главная')
{{-- vendor scripts --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/b/app-assets/css/pages/widgets.css')}}">
@endsection
@section('content')

    <section id="dashboard-ecommerce">
        <div class="row">
            <!-- Greetings Content Starts -->
            <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Congratulations John!</h3>
                        <p class="mb-0">Best seller of the month</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="dashboard-content-left">
                                    <h1 class="text-primary font-large-2 text-bold-500">$89k</h1>
                                    <p>You have done 57.6% more sales today.</p>
                                    <button type="button" class="btn btn-primary glow">View Sales</button>
                                </div>
                                <div class="dashboard-content-right">
                                    <img src="../../../app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Multi Radial Chart Starts -->
            <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Visits of 2019</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body" style="position: relative;">
                            <div id="multi-radial-chart" style="min-height: 218px;"><div id="apexchartsuj191q1p" class="apexcharts-canvas apexchartsuj191q1p light" style="width: 379px; height: 218px;"><svg id="SvgjsSvg1236" width="379" height="218.00000000000003" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1238" class="apexcharts-inner apexcharts-graphical" transform="translate(99, -10)"><defs id="SvgjsDefs1237"><clipPath id="gridRectMaskuj191q1p"><rect id="SvgjsRect1239" width="185" height="207" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskuj191q1p"><rect id="SvgjsRect1240" width="185" height="207" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath></defs><g id="SvgjsG1242" class="apexcharts-radialbar"><g id="SvgjsG1243"><g id="SvgjsG1244" class="apexcharts-tracks"><g id="SvgjsG1245" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 91.4864126118422 24.650001185723283" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9770000000000016" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 91.4864126118422 24.650001185723283"></path></g><g id="SvgjsG1247" class="apexcharts-radialbar-track apexcharts-track" rel="2"><path id="apexcharts-radialbarTrack-1" d="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 91.48887352607501 38.75000097096799" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9770000000000016" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 91.48887352607501 38.75000097096799"></path></g><g id="SvgjsG1249" class="apexcharts-radialbar-track apexcharts-track" rel="3"><path id="apexcharts-radialbarTrack-2" d="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 91.49133444030784 52.850000756212715" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9770000000000016" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 91.49133444030784 52.850000756212715"></path></g></g><g id="SvgjsG1251"><g id="SvgjsG1256" class="apexcharts-series apexcharts-radial-series" seriesName="Target" rel="1" data:realIndex="0"><path id="SvgjsPath1257" d="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 13.649999999999977 102.50000000000001" fill="none" fill-opacity="0.85" stroke="rgba(90,141,238,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.100000000000001" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="270" data:value="75" index="0" j="0" data:pathOrig="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 13.649999999999977 102.50000000000001"></path></g><g id="SvgjsG1258" class="apexcharts-series apexcharts-radial-series" seriesName="Mart" rel="2" data:realIndex="1"><path id="SvgjsPath1259" d="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 30.870147086183934 82.80016660859707" fill="none" fill-opacity="0.85" stroke="rgba(255,91,92,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.100000000000001" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" data:angle="288" data:value="80" index="0" j="1" data:pathOrig="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 30.870147086183934 82.80016660859707"></path></g><g id="SvgjsG1260" class="apexcharts-series apexcharts-radial-series" seriesName="Ebay" rel="3" data:realIndex="2"><path id="SvgjsPath1261" d="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 51.33230622928383 73.3164622236787" fill="none" fill-opacity="0.85" stroke="rgba(253,172,65,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.100000000000001" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-2" data:angle="306" data:value="85" index="0" j="2" data:pathOrig="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 51.33230622928383 73.3164622236787"></path></g><circle id="SvgjsCircle1252" r="42.661500000000004" cx="91.5" cy="102.5" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1253" class="apexcharts-datalabels-group" transform="translate(0, 0)" style="opacity: 1;"><text id="SvgjsText1254" font-family="IBM Plex Sans" x="91.5" y="127.5" text-anchor="middle" dominant-baseline="auto" font-size="15px" fill="#828d99" class="apexcharts-datalabel-label" style="font-family: &quot;IBM Plex Sans&quot;;">Total Visits</text><text id="SvgjsText1255" font-family="Rubik" x="91.5" y="103.5" text-anchor="middle" dominant-baseline="auto" font-size="30px" fill="#373d3f" class="apexcharts-datalabel-value" style="font-family: Rubik;">80%</text></g></g></g></g><line id="SvgjsLine1262" x1="0" y1="0" x2="183" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1263" x1="0" y1="0" x2="183" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
                            <ul class="list-inline d-flex justify-content-around mb-0">
                                <li> <span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
                                <li> <span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
                                <li> <span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
                            </ul>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 431px; height: 266px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12 dashboard-users">
                <div class="row  ">
                    <!-- Statistics Cards Starts -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-6 col-12 dashboard-users-success">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                <i class="bx bx-briefcase-alt font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">New Products</div>
                                            <h3 class="mb-0">1.2k</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-user font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">New Users</div>
                                            <h3 class="mb-0">45.6k</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Revenue Growth Chart Starts -->
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('/b/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('/b/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('/b/app-assets/js/scripts/cards/widgets.js')}}"></script>
@endsection
