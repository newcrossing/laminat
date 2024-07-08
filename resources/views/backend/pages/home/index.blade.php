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
                            <div id="multi-radial-chart" style="min-height: 218px;"><div id="apexchartsfaz0rmch" class="apexcharts-canvas apexchartsfaz0rmch light" style="width: 379px; height: 218px;"><svg id="SvgjsSvg1236" width="379" height="218.00000000000003" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1238" class="apexcharts-inner apexcharts-graphical" transform="translate(99, -10)"><defs id="SvgjsDefs1237"><clipPath id="gridRectMaskfaz0rmch"><rect id="SvgjsRect1239" width="185" height="207" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskfaz0rmch"><rect id="SvgjsRect1240" width="185" height="207" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath></defs><g id="SvgjsG1242" class="apexcharts-radialbar"><g id="SvgjsG1243"><g id="SvgjsG1244" class="apexcharts-tracks"><g id="SvgjsG1245" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 91.4864126118422 24.650001185723283" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9770000000000016" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 91.4864126118422 24.650001185723283"></path></g><g id="SvgjsG1247" class="apexcharts-radialbar-track apexcharts-track" rel="2"><path id="apexcharts-radialbarTrack-1" d="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 91.48887352607501 38.75000097096799" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9770000000000016" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 91.48887352607501 38.75000097096799"></path></g><g id="SvgjsG1249" class="apexcharts-radialbar-track apexcharts-track" rel="3"><path id="apexcharts-radialbarTrack-2" d="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 91.49133444030784 52.850000756212715" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="3.9770000000000016" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 91.49133444030784 52.850000756212715"></path></g></g><g id="SvgjsG1251"><g id="SvgjsG1256" class="apexcharts-series apexcharts-radial-series" seriesName="Target" rel="1" data:realIndex="0"><path id="SvgjsPath1257" d="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 13.649999999999977 102.50000000000001" fill="none" fill-opacity="0.85" stroke="rgba(90,141,238,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.100000000000001" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="270" data:value="75" index="0" j="0" data:pathOrig="M 91.5 24.649999999999977 A 77.85000000000002 77.85000000000002 0 1 1 13.649999999999977 102.50000000000001"></path></g><g id="SvgjsG1258" class="apexcharts-series apexcharts-radial-series" seriesName="Mart" rel="2" data:realIndex="1"><path id="SvgjsPath1259" d="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 30.870147086183934 82.80016660859707" fill="none" fill-opacity="0.85" stroke="rgba(255,91,92,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.100000000000001" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" data:angle="288" data:value="80" index="0" j="1" data:pathOrig="M 91.5 38.74999999999997 A 63.75000000000003 63.75000000000003 0 1 1 30.870147086183934 82.80016660859707"></path></g><g id="SvgjsG1260" class="apexcharts-series apexcharts-radial-series" seriesName="Ebay" rel="3" data:realIndex="2"><path id="SvgjsPath1261" d="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 51.33230622928383 73.3164622236787" fill="none" fill-opacity="0.85" stroke="rgba(253,172,65,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.100000000000001" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-2" data:angle="306" data:value="85" index="0" j="2" data:pathOrig="M 91.5 52.84999999999997 A 49.65000000000003 49.65000000000003 0 1 1 51.33230622928383 73.3164622236787"></path></g><circle id="SvgjsCircle1252" r="42.661500000000004" cx="91.5" cy="102.5" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1253" class="apexcharts-datalabels-group" transform="translate(0, 0)" style="opacity: 1;"><text id="SvgjsText1254" font-family="IBM Plex Sans" x="91.5" y="127.5" text-anchor="middle" dominant-baseline="auto" font-size="15px" fill="#828d99" class="apexcharts-datalabel-label" style="font-family: &quot;IBM Plex Sans&quot;; fill: rgb(130, 141, 153);">Total Visits</text><text id="SvgjsText1255" font-family="Rubik" x="91.5" y="103.5" text-anchor="middle" dominant-baseline="auto" font-size="30px" fill="#373d3f" class="apexcharts-datalabel-value" style="font-family: Rubik;">80%</text></g></g></g></g><line id="SvgjsLine1262" x1="0" y1="0" x2="183" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1263" x1="0" y1="0" x2="183" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
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
                            <div class="col-xl-12 col-lg-6 col-12 dashboard-revenue-growth">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center pb-0">
                                        <h4 class="card-title">Revenue Growth</h4>
                                        <div class="d-flex align-items-end justify-content-end">
                                            <span class="mr-25">$25,980</span>
                                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body pb-0" style="position: relative;">
                                            <div id="revenue-growth-chart" style="min-height: 115px;"><div id="apexchartsod75dbzm" class="apexcharts-canvas apexchartsod75dbzm light" style="width: 369px; height: 100px;"><svg id="SvgjsSvg1266" width="369" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1268" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 10)"><defs id="SvgjsDefs1267"><linearGradient id="SvgjsLinearGradient1270" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1271" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1272" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1273" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskod75dbzm"><rect id="SvgjsRect1275" width="369" height="65" x="0" y="0" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskod75dbzm"><rect id="SvgjsRect1276" width="371" height="67" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath></defs><rect id="SvgjsRect1274" width="4.1" height="65" x="0" y="0" rx="0" ry="0" fill="url(#SvgjsLinearGradient1270)" opacity="1" stroke-width="0" stroke-dasharray="3" class="apexcharts-xcrosshairs" y2="65" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1319" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1320" class="apexcharts-xaxis-texts-g" transform="translate(0, -9)"><text id="SvgjsText1321" font-family="Helvetica, Arial, sans-serif" x="10.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1322" style="font-family: Helvetica, Arial, sans-serif;">0</tspan><title>0</title></text><text id="SvgjsText1323" font-family="Helvetica, Arial, sans-serif" x="30.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1324" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1325" font-family="Helvetica, Arial, sans-serif" x="51.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1326" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1327" font-family="Helvetica, Arial, sans-serif" x="71.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1328" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1329" font-family="Helvetica, Arial, sans-serif" x="92.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1330" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1331" font-family="Helvetica, Arial, sans-serif" x="112.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1332" style="font-family: Helvetica, Arial, sans-serif;">10</tspan><title>10</title></text><text id="SvgjsText1333" font-family="Helvetica, Arial, sans-serif" x="133.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1334" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1335" font-family="Helvetica, Arial, sans-serif" x="153.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1336" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1337" font-family="Helvetica, Arial, sans-serif" x="174.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1338" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1339" font-family="Helvetica, Arial, sans-serif" x="194.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1340" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1341" font-family="Helvetica, Arial, sans-serif" x="215.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1342" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1343" font-family="Helvetica, Arial, sans-serif" x="235.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1344" style="font-family: Helvetica, Arial, sans-serif;">15</tspan><title>15</title></text><text id="SvgjsText1345" font-family="Helvetica, Arial, sans-serif" x="256.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1346" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1347" font-family="Helvetica, Arial, sans-serif" x="276.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1348" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1349" font-family="Helvetica, Arial, sans-serif" x="297.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1350" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1351" font-family="Helvetica, Arial, sans-serif" x="317.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1352" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1353" font-family="Helvetica, Arial, sans-serif" x="338.25" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1354" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1355" font-family="Helvetica, Arial, sans-serif" x="358.75" y="89" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1356" style="font-family: Helvetica, Arial, sans-serif;">20</tspan><title>20</title></text></g></g><g id="SvgjsG1358" class="apexcharts-grid"><line id="SvgjsLine1360" x1="0" y1="65" x2="369" y2="65" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1359" x1="0" y1="1" x2="0" y2="65" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1278" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1279" class="apexcharts-series" seriesName="2019" rel="1" data:realIndex="0"><path id="undefined-0" d="M 8.2 65L 8.2 48.75Q 10.25 46.7 12.299999999999999 48.75L 12.299999999999999 65L 8.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 8.2 65L 8.2 48.75Q 10.25 46.7 12.299999999999999 48.75L 12.299999999999999 65L 8.2 65" pathFrom="M 8.2 65L 8.2 65L 12.299999999999999 65L 12.299999999999999 65L 12.299999999999999 65L 8.2 65" cy="48.75" cx="28.7" j="0" val="50" barHeight="16.25" barWidth="4.1"></path><path id="undefined-0" d="M 28.7 65L 28.7 42.25Q 30.75 40.2 32.8 42.25L 32.8 65L 28.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 28.7 65L 28.7 42.25Q 30.75 40.2 32.8 42.25L 32.8 65L 28.7 65" pathFrom="M 28.7 65L 28.7 65L 32.8 65L 32.8 65L 32.8 65L 28.7 65" cy="42.25" cx="49.2" j="1" val="70" barHeight="22.75" barWidth="4.1"></path><path id="undefined-0" d="M 49.2 65L 49.2 32.5Q 51.25 30.45 53.300000000000004 32.5L 53.300000000000004 65L 49.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 49.2 65L 49.2 32.5Q 51.25 30.45 53.300000000000004 32.5L 53.300000000000004 65L 49.2 65" pathFrom="M 49.2 65L 49.2 65L 53.300000000000004 65L 53.300000000000004 65L 53.300000000000004 65L 49.2 65" cy="32.5" cx="69.7" j="2" val="100" barHeight="32.5" barWidth="4.1"></path><path id="undefined-0" d="M 69.7 65L 69.7 26Q 71.75 23.95 73.8 26L 73.8 65L 69.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 69.7 65L 69.7 26Q 71.75 23.95 73.8 26L 73.8 65L 69.7 65" pathFrom="M 69.7 65L 69.7 65L 73.8 65L 73.8 65L 73.8 65L 69.7 65" cy="26" cx="90.2" j="3" val="120" barHeight="39" barWidth="4.1"></path><path id="undefined-0" d="M 90.2 65L 90.2 19.5Q 92.25 17.45 94.3 19.5L 94.3 65L 90.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 90.2 65L 90.2 19.5Q 92.25 17.45 94.3 19.5L 94.3 65L 90.2 65" pathFrom="M 90.2 65L 90.2 65L 94.3 65L 94.3 65L 94.3 65L 90.2 65" cy="19.5" cx="110.7" j="4" val="140" barHeight="45.5" barWidth="4.1"></path><path id="undefined-0" d="M 110.7 65L 110.7 32.5Q 112.75 30.45 114.8 32.5L 114.8 65L 110.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 110.7 65L 110.7 32.5Q 112.75 30.45 114.8 32.5L 114.8 65L 110.7 65" pathFrom="M 110.7 65L 110.7 65L 114.8 65L 114.8 65L 114.8 65L 110.7 65" cy="32.5" cx="131.2" j="5" val="100" barHeight="32.5" barWidth="4.1"></path><path id="undefined-0" d="M 131.2 65L 131.2 42.25Q 133.25 40.2 135.29999999999998 42.25L 135.29999999999998 65L 131.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 131.2 65L 131.2 42.25Q 133.25 40.2 135.29999999999998 42.25L 135.29999999999998 65L 131.2 65" pathFrom="M 131.2 65L 131.2 65L 135.29999999999998 65L 135.29999999999998 65L 135.29999999999998 65L 131.2 65" cy="42.25" cx="151.7" j="6" val="70" barHeight="22.75" barWidth="4.1"></path><path id="undefined-0" d="M 151.7 65L 151.7 39Q 153.75 36.95 155.79999999999998 39L 155.79999999999998 65L 151.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 151.7 65L 151.7 39Q 153.75 36.95 155.79999999999998 39L 155.79999999999998 65L 151.7 65" pathFrom="M 151.7 65L 151.7 65L 155.79999999999998 65L 155.79999999999998 65L 155.79999999999998 65L 151.7 65" cy="39" cx="172.2" j="7" val="80" barHeight="26" barWidth="4.1"></path><path id="undefined-0" d="M 172.2 65L 172.2 35.75Q 174.25 33.7 176.29999999999998 35.75L 176.29999999999998 65L 172.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 172.2 65L 172.2 35.75Q 174.25 33.7 176.29999999999998 35.75L 176.29999999999998 65L 172.2 65" pathFrom="M 172.2 65L 172.2 65L 176.29999999999998 65L 176.29999999999998 65L 176.29999999999998 65L 172.2 65" cy="35.75" cx="192.7" j="8" val="90" barHeight="29.25" barWidth="4.1"></path><path id="undefined-0" d="M 192.7 65L 192.7 29.25Q 194.75 27.2 196.79999999999998 29.25L 196.79999999999998 65L 192.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 192.7 65L 192.7 29.25Q 194.75 27.2 196.79999999999998 29.25L 196.79999999999998 65L 192.7 65" pathFrom="M 192.7 65L 192.7 65L 196.79999999999998 65L 196.79999999999998 65L 196.79999999999998 65L 192.7 65" cy="29.25" cx="213.2" j="9" val="110" barHeight="35.75" barWidth="4.1"></path><path id="undefined-0" d="M 213.2 65L 213.2 48.75Q 215.25 46.7 217.29999999999998 48.75L 217.29999999999998 65L 213.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 213.2 65L 213.2 48.75Q 215.25 46.7 217.29999999999998 48.75L 217.29999999999998 65L 213.2 65" pathFrom="M 213.2 65L 213.2 65L 217.29999999999998 65L 217.29999999999998 65L 217.29999999999998 65L 213.2 65" cy="48.75" cx="233.7" j="10" val="50" barHeight="16.25" barWidth="4.1"></path><path id="undefined-0" d="M 233.7 65L 233.7 42.25Q 235.75 40.2 237.79999999999998 42.25L 237.79999999999998 65L 233.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 233.7 65L 233.7 42.25Q 235.75 40.2 237.79999999999998 42.25L 237.79999999999998 65L 233.7 65" pathFrom="M 233.7 65L 233.7 65L 237.79999999999998 65L 237.79999999999998 65L 237.79999999999998 65L 233.7 65" cy="42.25" cx="254.2" j="11" val="70" barHeight="22.75" barWidth="4.1"></path><path id="undefined-0" d="M 254.2 65L 254.2 53.625Q 256.25 51.575 258.3 53.625L 258.3 65L 254.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 254.2 65L 254.2 53.625Q 256.25 51.575 258.3 53.625L 258.3 65L 254.2 65" pathFrom="M 254.2 65L 254.2 65L 258.3 65L 258.3 65L 258.3 65L 254.2 65" cy="53.625" cx="274.7" j="12" val="35" barHeight="11.375" barWidth="4.1"></path><path id="undefined-0" d="M 274.7 65L 274.7 29.25Q 276.75 27.2 278.8 29.25L 278.8 65L 274.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 274.7 65L 274.7 29.25Q 276.75 27.2 278.8 29.25L 278.8 65L 274.7 65" pathFrom="M 274.7 65L 274.7 65L 278.8 65L 278.8 65L 278.8 65L 274.7 65" cy="29.25" cx="295.2" j="13" val="110" barHeight="35.75" barWidth="4.1"></path><path id="undefined-0" d="M 295.2 65L 295.2 32.5Q 297.25 30.45 299.3 32.5L 299.3 65L 295.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 295.2 65L 295.2 32.5Q 297.25 30.45 299.3 32.5L 299.3 65L 295.2 65" pathFrom="M 295.2 65L 295.2 65L 299.3 65L 299.3 65L 299.3 65L 295.2 65" cy="32.5" cx="315.7" j="14" val="100" barHeight="32.5" barWidth="4.1"></path><path id="undefined-0" d="M 315.7 65L 315.7 30.875Q 317.75 28.825 319.8 30.875L 319.8 65L 315.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 315.7 65L 315.7 30.875Q 317.75 28.825 319.8 30.875L 319.8 65L 315.7 65" pathFrom="M 315.7 65L 315.7 65L 319.8 65L 319.8 65L 319.8 65L 315.7 65" cy="30.875" cx="336.2" j="15" val="105" barHeight="34.125" barWidth="4.1"></path><path id="undefined-0" d="M 336.2 65L 336.2 24.375Q 338.25 22.325 340.3 24.375L 340.3 65L 336.2 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 336.2 65L 336.2 24.375Q 338.25 22.325 340.3 24.375L 340.3 65L 336.2 65" pathFrom="M 336.2 65L 336.2 65L 340.3 65L 340.3 65L 340.3 65L 336.2 65" cy="24.375" cx="356.7" j="16" val="125" barHeight="40.625" barWidth="4.1"></path><path id="undefined-0" d="M 356.7 65L 356.7 39Q 358.75 36.95 360.8 39L 360.8 65L 356.7 65" fill="rgba(0,207,221,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 356.7 65L 356.7 39Q 358.75 36.95 360.8 39L 360.8 65L 356.7 65" pathFrom="M 356.7 65L 356.7 65L 360.8 65L 360.8 65L 360.8 65L 356.7 65" cy="39" cx="377.2" j="17" val="80" barHeight="26" barWidth="4.1"></path><g id="SvgjsG1280" class="apexcharts-datalabels"></g></g><g id="SvgjsG1299" class="apexcharts-series" seriesName="2018" rel="2" data:realIndex="1"><path id="undefined-1" d="M 8.2 48.75L 8.2 26Q 10.25 23.95 12.299999999999999 26L 12.299999999999999 48.75L 8.2 48.75" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 8.2 48.75L 8.2 26Q 10.25 23.95 12.299999999999999 26L 12.299999999999999 48.75L 8.2 48.75" pathFrom="M 8.2 48.75L 8.2 48.75L 12.299999999999999 48.75L 12.299999999999999 48.75L 12.299999999999999 48.75L 8.2 48.75" cy="26" cx="28.7" j="0" val="70" barHeight="22.75" barWidth="4.1"></path><path id="undefined-1" d="M 28.7 42.25L 28.7 26Q 30.75 23.95 32.8 26L 32.8 42.25L 28.7 42.25" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 28.7 42.25L 28.7 26Q 30.75 23.95 32.8 26L 32.8 42.25L 28.7 42.25" pathFrom="M 28.7 42.25L 28.7 42.25L 32.8 42.25L 32.8 42.25L 32.8 42.25L 28.7 42.25" cy="26" cx="49.2" j="1" val="50" barHeight="16.25" barWidth="4.1"></path><path id="undefined-1" d="M 49.2 32.5L 49.2 26Q 51.25 23.95 53.300000000000004 26L 53.300000000000004 32.5L 49.2 32.5" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 49.2 32.5L 49.2 26Q 51.25 23.95 53.300000000000004 26L 53.300000000000004 32.5L 49.2 32.5" pathFrom="M 49.2 32.5L 49.2 32.5L 53.300000000000004 32.5L 53.300000000000004 32.5L 53.300000000000004 32.5L 49.2 32.5" cy="26" cx="69.7" j="2" val="20" barHeight="6.5" barWidth="4.1"></path><path id="undefined-1" d="M 69.7 26L 69.7 16.25Q 71.75 14.2 73.8 16.25L 73.8 26L 69.7 26" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 69.7 26L 69.7 16.25Q 71.75 14.2 73.8 16.25L 73.8 26L 69.7 26" pathFrom="M 69.7 26L 69.7 26L 73.8 26L 73.8 26L 73.8 26L 69.7 26" cy="16.25" cx="90.2" j="3" val="30" barHeight="9.75" barWidth="4.1"></path><path id="undefined-1" d="M 90.2 19.5L 90.2 13Q 92.25 10.95 94.3 13L 94.3 19.5L 90.2 19.5" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 90.2 19.5L 90.2 13Q 92.25 10.95 94.3 13L 94.3 19.5L 90.2 19.5" pathFrom="M 90.2 19.5L 90.2 19.5L 94.3 19.5L 94.3 19.5L 94.3 19.5L 90.2 19.5" cy="13" cx="110.7" j="4" val="20" barHeight="6.5" barWidth="4.1"></path><path id="undefined-1" d="M 110.7 32.5L 110.7 3.25Q 112.75 1.2000000000000002 114.8 3.25L 114.8 32.5L 110.7 32.5" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 110.7 32.5L 110.7 3.25Q 112.75 1.2000000000000002 114.8 3.25L 114.8 32.5L 110.7 32.5" pathFrom="M 110.7 32.5L 110.7 32.5L 114.8 32.5L 114.8 32.5L 114.8 32.5L 110.7 32.5" cy="3.25" cx="131.2" j="5" val="90" barHeight="29.25" barWidth="4.1"></path><path id="undefined-1" d="M 131.2 42.25L 131.2 13Q 133.25 10.95 135.29999999999998 13L 135.29999999999998 42.25L 131.2 42.25" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 131.2 42.25L 131.2 13Q 133.25 10.95 135.29999999999998 13L 135.29999999999998 42.25L 131.2 42.25" pathFrom="M 131.2 42.25L 131.2 42.25L 135.29999999999998 42.25L 135.29999999999998 42.25L 135.29999999999998 42.25L 131.2 42.25" cy="13" cx="151.7" j="6" val="90" barHeight="29.25" barWidth="4.1"></path><path id="undefined-1" d="M 151.7 39L 151.7 19.5Q 153.75 17.45 155.79999999999998 19.5L 155.79999999999998 39L 151.7 39" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 151.7 39L 151.7 19.5Q 153.75 17.45 155.79999999999998 19.5L 155.79999999999998 39L 151.7 39" pathFrom="M 151.7 39L 151.7 39L 155.79999999999998 39L 155.79999999999998 39L 155.79999999999998 39L 151.7 39" cy="19.5" cx="172.2" j="7" val="60" barHeight="19.5" barWidth="4.1"></path><path id="undefined-1" d="M 172.2 35.75L 172.2 19.5Q 174.25 17.45 176.29999999999998 19.5L 176.29999999999998 35.75L 172.2 35.75" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 172.2 35.75L 172.2 19.5Q 174.25 17.45 176.29999999999998 19.5L 176.29999999999998 35.75L 172.2 35.75" pathFrom="M 172.2 35.75L 172.2 35.75L 176.29999999999998 35.75L 176.29999999999998 35.75L 176.29999999999998 35.75L 172.2 35.75" cy="19.5" cx="192.7" j="8" val="50" barHeight="16.25" barWidth="4.1"></path><path id="undefined-1" d="M 192.7 29.25L 192.7 29.25Q 194.75 27.2 196.79999999999998 29.25L 196.79999999999998 29.25L 192.7 29.25" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 192.7 29.25L 192.7 29.25Q 194.75 27.2 196.79999999999998 29.25L 196.79999999999998 29.25L 192.7 29.25" pathFrom="M 192.7 29.25L 192.7 29.25L 196.79999999999998 29.25L 196.79999999999998 29.25L 196.79999999999998 29.25L 192.7 29.25" cy="29.25" cx="213.2" j="9" val="0" barHeight="0" barWidth="4.1"></path><path id="undefined-1" d="M 213.2 48.75L 213.2 32.5Q 215.25 30.45 217.29999999999998 32.5L 217.29999999999998 48.75L 213.2 48.75" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 213.2 48.75L 213.2 32.5Q 215.25 30.45 217.29999999999998 32.5L 217.29999999999998 48.75L 213.2 48.75" pathFrom="M 213.2 48.75L 213.2 48.75L 217.29999999999998 48.75L 217.29999999999998 48.75L 217.29999999999998 48.75L 213.2 48.75" cy="32.5" cx="233.7" j="10" val="50" barHeight="16.25" barWidth="4.1"></path><path id="undefined-1" d="M 233.7 42.25L 233.7 22.75Q 235.75 20.7 237.79999999999998 22.75L 237.79999999999998 42.25L 233.7 42.25" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 233.7 42.25L 233.7 22.75Q 235.75 20.7 237.79999999999998 22.75L 237.79999999999998 42.25L 233.7 42.25" pathFrom="M 233.7 42.25L 233.7 42.25L 237.79999999999998 42.25L 237.79999999999998 42.25L 237.79999999999998 42.25L 233.7 42.25" cy="22.75" cx="254.2" j="11" val="60" barHeight="19.5" barWidth="4.1"></path><path id="undefined-1" d="M 254.2 53.625L 254.2 8.125Q 256.25 6.075 258.3 8.125L 258.3 53.625L 254.2 53.625" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 254.2 53.625L 254.2 8.125Q 256.25 6.075 258.3 8.125L 258.3 53.625L 254.2 53.625" pathFrom="M 254.2 53.625L 254.2 53.625L 258.3 53.625L 258.3 53.625L 258.3 53.625L 254.2 53.625" cy="8.125" cx="274.7" j="12" val="140" barHeight="45.5" barWidth="4.1"></path><path id="undefined-1" d="M 274.7 29.25L 274.7 13Q 276.75 10.95 278.8 13L 278.8 29.25L 274.7 29.25" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 274.7 29.25L 274.7 13Q 276.75 10.95 278.8 13L 278.8 29.25L 274.7 29.25" pathFrom="M 274.7 29.25L 274.7 29.25L 278.8 29.25L 278.8 29.25L 278.8 29.25L 274.7 29.25" cy="13" cx="295.2" j="13" val="50" barHeight="16.25" barWidth="4.1"></path><path id="undefined-1" d="M 295.2 32.5L 295.2 26Q 297.25 23.95 299.3 26L 299.3 32.5L 295.2 32.5" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 295.2 32.5L 295.2 26Q 297.25 23.95 299.3 26L 299.3 32.5L 295.2 32.5" pathFrom="M 295.2 32.5L 295.2 32.5L 299.3 32.5L 299.3 32.5L 299.3 32.5L 295.2 32.5" cy="26" cx="315.7" j="14" val="20" barHeight="6.5" barWidth="4.1"></path><path id="undefined-1" d="M 315.7 30.875L 315.7 24.375Q 317.75 22.325 319.8 24.375L 319.8 30.875L 315.7 30.875" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 315.7 30.875L 315.7 24.375Q 317.75 22.325 319.8 24.375L 319.8 30.875L 315.7 30.875" pathFrom="M 315.7 30.875L 315.7 30.875L 319.8 30.875L 319.8 30.875L 319.8 30.875L 315.7 30.875" cy="24.375" cx="336.2" j="15" val="20" barHeight="6.5" barWidth="4.1"></path><path id="undefined-1" d="M 336.2 24.375L 336.2 21.125Q 338.25 19.075 340.3 21.125L 340.3 24.375L 336.2 24.375" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 336.2 24.375L 336.2 21.125Q 338.25 19.075 340.3 21.125L 340.3 24.375L 336.2 24.375" pathFrom="M 336.2 24.375L 336.2 24.375L 340.3 24.375L 340.3 24.375L 340.3 24.375L 336.2 24.375" cy="21.125" cx="356.7" j="16" val="10" barHeight="3.25" barWidth="4.1"></path><path id="undefined-1" d="M 356.7 39L 356.7 39Q 358.75 36.95 360.8 39L 360.8 39L 356.7 39" fill="rgba(231,237,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskod75dbzm)" pathTo="M 356.7 39L 356.7 39Q 358.75 36.95 360.8 39L 360.8 39L 356.7 39" pathFrom="M 356.7 39L 356.7 39L 360.8 39L 360.8 39L 360.8 39L 356.7 39" cy="39" cx="377.2" j="17" val="0" barHeight="0" barWidth="4.1"></path><g id="SvgjsG1300" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1361" x1="0" y1="0" x2="369" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1362" x1="0" y1="0" x2="369" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1363" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1364" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1365" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1357" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 207, 221);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 237, 243);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 467px; height: 116px;"></div></div><div class="contract-trigger"></div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Revenue Growth Chart Starts -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-12 dashboard-order-summary">
                <div class="card">
                    <div class="row">
                        <!-- Order Summary Starts -->
                        <div class="col-md-8 col-12 order-summary border-right pr-md-0">
                            <div class="card mb-0">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Order Summary</h4>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-sm btn-light-primary mr-1">Month</button>
                                        <button type="button" class="btn btn-sm btn-primary glow">Week</button>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body p-0" style="position: relative;">
                                        <div id="order-summary-chart" style="min-height: 270px;"><div id="apexchartst3lf30pz" class="apexcharts-canvas apexchartst3lf30pz light" style="width: 597px; height: 270px;"><svg id="SvgjsSvg1370" width="597" height="270" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1372" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1371"><clipPath id="gridRectMaskt3lf30pz"><rect id="SvgjsRect1376" width="599.5" height="272.5" x="-1.25" y="-1.25" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskt3lf30pz"><rect id="SvgjsRect1377" width="599" height="272" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1383" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1384" stop-opacity="0.7" stop-color="rgba(90,141,238,0.7)" offset="0"></stop><stop id="SvgjsStop1385" stop-opacity="0.55" stop-color="rgba(226,236,255,0.55)" offset="0.8"></stop><stop id="SvgjsStop1386" stop-opacity="0.55" stop-color="rgba(226,236,255,0.55)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1393" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1394" stop-opacity="0.7" stop-color="rgba(90,141,238,0.7)" offset="0"></stop><stop id="SvgjsStop1395" stop-opacity="0.55" stop-color="rgba(90,141,238,0.55)" offset="0.8"></stop><stop id="SvgjsStop1396" stop-opacity="0.55" stop-color="rgba(90,141,238,0.55)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1375" x1="0" y1="0" x2="0" y2="270" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="270" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1398" class="apexcharts-xaxis" transform="translate(0, -50)"><g id="SvgjsG1399" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1400" font-family="Helvetica, Arial, sans-serif" x="0" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1401" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text><text id="SvgjsText1402" font-family="Helvetica, Arial, sans-serif" x="59.70000000000001" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1403" style="font-family: Helvetica, Arial, sans-serif;">1</tspan><title>1</title></text><text id="SvgjsText1404" font-family="Helvetica, Arial, sans-serif" x="119.4" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1405" style="font-family: Helvetica, Arial, sans-serif;">2</tspan><title>2</title></text><text id="SvgjsText1406" font-family="Helvetica, Arial, sans-serif" x="179.1" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1407" style="font-family: Helvetica, Arial, sans-serif;">3</tspan><title>3</title></text><text id="SvgjsText1408" font-family="Helvetica, Arial, sans-serif" x="238.79999999999998" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1409" style="font-family: Helvetica, Arial, sans-serif;">4</tspan><title>4</title></text><text id="SvgjsText1410" font-family="Helvetica, Arial, sans-serif" x="298.49999999999994" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1411" style="font-family: Helvetica, Arial, sans-serif;">5</tspan><title>5</title></text><text id="SvgjsText1412" font-family="Helvetica, Arial, sans-serif" x="358.19999999999993" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1413" style="font-family: Helvetica, Arial, sans-serif;">6</tspan><title>6</title></text><text id="SvgjsText1414" font-family="Helvetica, Arial, sans-serif" x="417.8999999999999" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1415" style="font-family: Helvetica, Arial, sans-serif;">7</tspan><title>7</title></text><text id="SvgjsText1416" font-family="Helvetica, Arial, sans-serif" x="477.5999999999999" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1417" style="font-family: Helvetica, Arial, sans-serif;">8</tspan><title>8</title></text><text id="SvgjsText1418" font-family="Helvetica, Arial, sans-serif" x="537.3" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1419" style="font-family: Helvetica, Arial, sans-serif;">9</tspan><title>9</title></text><text id="SvgjsText1420" font-family="Helvetica, Arial, sans-serif" x="597" y="299" text-anchor="middle" dominant-baseline="auto" font-size="12px" fill="#828d99" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1421" style="font-family: Helvetica, Arial, sans-serif;"></tspan><title></title></text></g></g><g id="SvgjsG1424" class="apexcharts-grid"><line id="SvgjsLine1426" x1="0" y1="270" x2="597" y2="270" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1425" x1="0" y1="1" x2="0" y2="270" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1379" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1380" class="apexcharts-series" seriesName="Weeks" data:longestSeries="true" rel="1" data:realIndex="0"><path id="undefined-0" d="M 0 270L 0 135C 20.895 135 38.80500000000001 96.42857142857144 59.7 96.42857142857144C 80.595 96.42857142857144 98.50500000000001 146.57142857142856 119.4 146.57142857142856C 140.29500000000002 146.57142857142856 158.205 104.14285714285711 179.10000000000002 104.14285714285711C 199.995 104.14285714285711 217.90500000000003 154.28571428571422 238.8 154.28571428571422C 259.695 154.28571428571422 277.605 19.28571428571422 298.5 19.28571428571422C 319.39500000000004 19.28571428571422 337.305 154.28571428571422 358.20000000000005 154.28571428571422C 379.095 154.28571428571422 397.00500000000005 115.71428571428567 417.90000000000003 115.71428571428567C 438.795 115.71428571428567 456.70500000000004 154.28571428571422 477.6 154.28571428571422C 498.49500000000006 154.28571428571422 516.4050000000001 38.571428571428555 537.3000000000001 38.571428571428555C 558.195 38.571428571428555 576.105 77.14285714285711 597 77.14285714285711C 597 77.14285714285711 597 77.14285714285711 597 270M 597 77.14285714285711z" fill="url(#SvgjsLinearGradient1383)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskt3lf30pz)" pathTo="M 0 270L 0 135C 20.895 135 38.80500000000001 96.42857142857144 59.7 96.42857142857144C 80.595 96.42857142857144 98.50500000000001 146.57142857142856 119.4 146.57142857142856C 140.29500000000002 146.57142857142856 158.205 104.14285714285711 179.10000000000002 104.14285714285711C 199.995 104.14285714285711 217.90500000000003 154.28571428571422 238.8 154.28571428571422C 259.695 154.28571428571422 277.605 19.28571428571422 298.5 19.28571428571422C 319.39500000000004 19.28571428571422 337.305 154.28571428571422 358.20000000000005 154.28571428571422C 379.095 154.28571428571422 397.00500000000005 115.71428571428567 417.90000000000003 115.71428571428567C 438.795 115.71428571428567 456.70500000000004 154.28571428571422 477.6 154.28571428571422C 498.49500000000006 154.28571428571422 516.4050000000001 38.571428571428555 537.3000000000001 38.571428571428555C 558.195 38.571428571428555 576.105 77.14285714285711 597 77.14285714285711C 597 77.14285714285711 597 77.14285714285711 597 270M 597 77.14285714285711z" pathFrom="M -1 771.4285714285714L -1 771.4285714285714L 59.7 771.4285714285714L 119.4 771.4285714285714L 179.10000000000002 771.4285714285714L 238.8 771.4285714285714L 298.5 771.4285714285714L 358.20000000000005 771.4285714285714L 417.90000000000003 771.4285714285714L 477.6 771.4285714285714L 537.3000000000001 771.4285714285714L 597 771.4285714285714"></path><path id="undefined-0" d="M 0 135C 20.895 135 38.80500000000001 96.42857142857144 59.7 96.42857142857144C 80.595 96.42857142857144 98.50500000000001 146.57142857142856 119.4 146.57142857142856C 140.29500000000002 146.57142857142856 158.205 104.14285714285711 179.10000000000002 104.14285714285711C 199.995 104.14285714285711 217.90500000000003 154.28571428571422 238.8 154.28571428571422C 259.695 154.28571428571422 277.605 19.28571428571422 298.5 19.28571428571422C 319.39500000000004 19.28571428571422 337.305 154.28571428571422 358.20000000000005 154.28571428571422C 379.095 154.28571428571422 397.00500000000005 115.71428571428567 417.90000000000003 115.71428571428567C 438.795 115.71428571428567 456.70500000000004 154.28571428571422 477.6 154.28571428571422C 498.49500000000006 154.28571428571422 516.4050000000001 38.571428571428555 537.3000000000001 38.571428571428555C 558.195 38.571428571428555 576.105 77.14285714285711 597 77.14285714285711" fill="none" fill-opacity="1" stroke="#5a8dee" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskt3lf30pz)" pathTo="M 0 135C 20.895 135 38.80500000000001 96.42857142857144 59.7 96.42857142857144C 80.595 96.42857142857144 98.50500000000001 146.57142857142856 119.4 146.57142857142856C 140.29500000000002 146.57142857142856 158.205 104.14285714285711 179.10000000000002 104.14285714285711C 199.995 104.14285714285711 217.90500000000003 154.28571428571422 238.8 154.28571428571422C 259.695 154.28571428571422 277.605 19.28571428571422 298.5 19.28571428571422C 319.39500000000004 19.28571428571422 337.305 154.28571428571422 358.20000000000005 154.28571428571422C 379.095 154.28571428571422 397.00500000000005 115.71428571428567 417.90000000000003 115.71428571428567C 438.795 115.71428571428567 456.70500000000004 154.28571428571422 477.6 154.28571428571422C 498.49500000000006 154.28571428571422 516.4050000000001 38.571428571428555 537.3000000000001 38.571428571428555C 558.195 38.571428571428555 576.105 77.14285714285711 597 77.14285714285711" pathFrom="M -1 771.4285714285714L -1 771.4285714285714L 59.7 771.4285714285714L 119.4 771.4285714285714L 179.10000000000002 771.4285714285714L 238.8 771.4285714285714L 298.5 771.4285714285714L 358.20000000000005 771.4285714285714L 417.90000000000003 771.4285714285714L 477.6 771.4285714285714L 537.3000000000001 771.4285714285714L 597 771.4285714285714"></path><g id="SvgjsG1381" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1432" r="0" cx="0" cy="0" class="apexcharts-marker w1lssurzf" stroke="#ffffff" fill="#5a8dee" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1382" class="apexcharts-datalabels"></g></g></g><g id="SvgjsG1389" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1390" class="apexcharts-series" seriesName="Months" data:longestSeries="true" rel="1" data:realIndex="1"><path id="undefined-0" d="M 0 123.42857142857144C 20.895 123.42857142857144 38.80500000000001 123.42857142857144 59.7 123.42857142857144C 80.595 123.42857142857144 98.50500000000001 173.57142857142856 119.4 173.57142857142856C 140.29500000000002 173.57142857142856 158.205 84.85714285714289 179.10000000000002 84.85714285714289C 199.995 84.85714285714289 217.90500000000003 173.57142857142856 238.8 173.57142857142856C 259.695 173.57142857142856 277.605 115.71428571428567 298.5 115.71428571428567C 319.39500000000004 115.71428571428567 337.305 38.571428571428555 358.20000000000005 38.571428571428555C 379.095 38.571428571428555 397.00500000000005 154.28571428571422 417.90000000000003 154.28571428571422C 438.795 154.28571428571422 456.70500000000004 192.8571428571429 477.6 192.8571428571429C 498.49500000000006 192.8571428571429 516.4050000000001 115.71428571428567 537.3000000000001 115.71428571428567C 558.195 115.71428571428567 576.105 231.42857142857144 597 231.42857142857144" fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1393)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="8" class="apexcharts-line" index="1" clip-path="url(#gridRectMaskt3lf30pz)" pathTo="M 0 123.42857142857144C 20.895 123.42857142857144 38.80500000000001 123.42857142857144 59.7 123.42857142857144C 80.595 123.42857142857144 98.50500000000001 173.57142857142856 119.4 173.57142857142856C 140.29500000000002 173.57142857142856 158.205 84.85714285714289 179.10000000000002 84.85714285714289C 199.995 84.85714285714289 217.90500000000003 173.57142857142856 238.8 173.57142857142856C 259.695 173.57142857142856 277.605 115.71428571428567 298.5 115.71428571428567C 319.39500000000004 115.71428571428567 337.305 38.571428571428555 358.20000000000005 38.571428571428555C 379.095 38.571428571428555 397.00500000000005 154.28571428571422 417.90000000000003 154.28571428571422C 438.795 154.28571428571422 456.70500000000004 192.8571428571429 477.6 192.8571428571429C 498.49500000000006 192.8571428571429 516.4050000000001 115.71428571428567 537.3000000000001 115.71428571428567C 558.195 115.71428571428567 576.105 231.42857142857144 597 231.42857142857144" pathFrom="M -1 771.4285714285714L -1 771.4285714285714L 59.7 771.4285714285714L 119.4 771.4285714285714L 179.10000000000002 771.4285714285714L 238.8 771.4285714285714L 298.5 771.4285714285714L 358.20000000000005 771.4285714285714L 417.90000000000003 771.4285714285714L 477.6 771.4285714285714L 537.3000000000001 771.4285714285714L 597 771.4285714285714"></path><g id="SvgjsG1391" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1433" r="0" cx="0" cy="0" class="apexcharts-marker wo1mjkfky" stroke="#ffffff" fill="#5a8dee" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1392" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1427" x1="0" y1="0" x2="597" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1428" x1="0" y1="0" x2="597" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1429" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1430" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1431" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1374" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1422" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1423" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(90, 141, 238);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(90, 141, 238);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 598px; height: 271px;"></div></div><div class="contract-trigger"></div></div></div>
                                </div>
                            </div>
                        </div>
                        <!-- Sales History Starts -->
                        <div class="col-md-4 col-12 pl-md-0">
                            <div class="card mb-0">
                                <div class="card-header pb-50">
                                    <h4 class="card-title">Sales History</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="sales-item-name">
                                                <p class="mb-0">Airpods</p>
                                                <small class="text-muted">30 min ago</small>
                                            </div>
                                            <div class="sales-item-amount">
                                                <h6 class="mb-0"><span class="text-success">+</span> $50</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="sales-item-name">
                                                <p class="mb-0">iPhone</p>
                                                <small class="text-muted">2 hour ago</small>
                                            </div>
                                            <div class="sales-item-amount">
                                                <h6 class="mb-0"><span class="text-danger">-</span> $59</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="sales-item-name">
                                                <p class="mb-0">Macbook</p>
                                                <small class="text-muted">1 day ago</small>
                                            </div>
                                            <div class="sales-item-amount">
                                                <h6 class="mb-0"><span class="text-success">+</span> $12</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-top pb-0">
                                        <h5>Total Sales</h5>
                                        <span class="text-primary text-bold-500">$82,950.96</span>
                                        <div class="progress progress-bar-primary progress-sm my-50">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="78" style="width:78%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Update Starts -->
            <div class="col-xl-4 col-md-6 col-12 dashboard-latest-update">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <h4 class="card-title">Latest Update</h4>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                2019
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                                <a class="dropdown-item" href="#">2019</a>
                                <a class="dropdown-item" href="#">2018</a>
                                <a class="dropdown-item" href="#">2017</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pb-1 ps">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-primary m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bxs-zap text-primary font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">Total Products</span>
                                            <small class="text-muted d-block">1.2k New Products</small>
                                        </div>
                                    </div>
                                    <span>10.6k</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-info m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-stats text-info font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">Total Sales</span>
                                            <small class="text-muted d-block">39.4k New Sales</small>
                                        </div>
                                    </div>
                                    <span>26M</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-danger m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-credit-card text-danger font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">Total Revenue</span>
                                            <small class="text-muted d-block">43.5k New Revenue</small>
                                        </div>
                                    </div>
                                    <span>15.89M</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-success m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-dollar text-success font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">Total Cost</span>
                                            <small class="text-muted d-block">Total Expenses</small>
                                        </div>
                                    </div>
                                    <span>1.25B</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-primary m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-user text-primary font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">Total Users</span>
                                            <small class="text-muted d-block">New Users</small>
                                        </div>
                                    </div>
                                    <span>1.2k</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-danger m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-edit-alt text-danger font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">Total Visits</span>
                                            <small class="text-muted d-block">New Visits</small>
                                        </div>
                                    </div>
                                    <span>4.6k</span>
                                </li>
                            </ul>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                    </div>
                </div>
            </div>
            <!-- Earning Swiper Starts -->
            <div class="col-xl-4 col-md-6 col-12 dashboard-earning-swiper" id="widget-earnings">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="card-title"><i class="bx bx-dollar font-medium-5 align-middle"></i> <span class="align-middle">Earnings</span></h5>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body py-1 px-0">
                            <!-- earnings swiper starts -->
                            <div class="widget-earnings-swiper swiper-container p-1 swiper-container-initialized swiper-container-horizontal">
                                <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-288.948px, 0px, 0px);">
                                    <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="repo-design" style="margin-right: 30px;">
                                        <i class="bx bx-pyramid mr-1 font-weight-normal font-medium-4"></i>
                                        <div class="swiper-text">
                                            <div class="swiper-heading">Repo Design</div>
                                            <small class="d-block">Gitlab</small>
                                        </div>
                                    </div>
                                    <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center swiper-slide-prev" id="laravel-temp" style="margin-right: 30px;">
                                        <i class="bx bx-sitemap mr-50 font-large-1"></i>
                                        <div class="swiper-text">
                                            <div class="swiper-heading">Designer</div>
                                            <small class="d-block">Women Clothes</small>
                                        </div>
                                    </div>
                                    <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center swiper-slide-active" id="admin-theme" style="margin-right: 30px;">
                                        <i class="bx bx-check-shield mr-50 font-large-1"></i>
                                        <div class="swiper-text">
                                            <div class="swiper-heading">Best Sellers</div>
                                            <small class="d-block">Clothing</small>
                                        </div>
                                    </div>
                                    <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center swiper-slide-next" id="ux-devloper" style="margin-right: 30px;">
                                        <i class="bx bx-devices mr-50 font-large-1"></i>
                                        <div class="swiper-text">
                                            <div class="swiper-heading">Admin Template</div>
                                            <small class="d-block">Global Network</small>
                                        </div>
                                    </div>
                                    <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="marketing-guide" style="margin-right: 30px;">
                                        <i class="bx bx-book-bookmark mr-50 font-large-1"></i>
                                        <div class="swiper-text">
                                            <div class="swiper-heading">Marketing Guide</div>
                                            <small class="d-block">Books</small>
                                        </div>
                                    </div>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            <!-- earnings swiper ends -->
                        </div>
                    </div>
                    <div class="main-wrapper-content">
                        <div class="wrapper-content" data-earnings="repo-design">
                            <div class="widget-earnings-scroll table-responsive ps">
                                <table class="table table-borderless widget-earnings-width mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Jerry Lter</h6>
                                                    <span class="font-small-2">Designer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="80" aria-valuemax="100" style="width:33%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-warning">- $280</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Pauly uez</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="80" aria-valuemax="100" style="width:10%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                    <span class="font-small-2">Marketing</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                    <span class="font-small-2">Degigner</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        </div>
                        <div class="wrapper-content" data-earnings="laravel-temp">
                            <div class="widget-earnings-scroll table-responsive">
                                <table class="table table-borderless widget-earnings-width mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Jesus Lter</h6>
                                                    <span class="font-small-2">Designer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80" aria-valuemax="100" style="width:28%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-info">- $280</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-success">+ $83</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                    <span class="font-small-2">Marketing</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="wrapper-content active" data-earnings="admin-theme">
                            <div class="widget-earnings-scroll table-responsive">
                                <table class="table table-borderless widget-earnings-width mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-25.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Mera Lter</h6>
                                                    <span class="font-small-2">Designer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="52" aria-valuemin="80" aria-valuemax="100" style="width:52%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-info">- $180</span></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-success">+ $553</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">jini mara</h6>
                                                    <span class="font-small-2">Marketing</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                    <span class="font-small-2">UX</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-danger">- $150</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="wrapper-content" data-earnings="ux-devloper">
                            <div class="widget-earnings-scroll table-responsive">
                                <table class="table table-borderless widget-earnings-width mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Drako Lter</h6>
                                                    <span class="font-small-2">Designer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="38" aria-valuemin="80" aria-valuemax="100" style="width:38%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-danger">- $280</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                    <span class="font-small-2">Marketing</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lvia Taylor</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="80" aria-valuemax="100" style="width:75%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-danger">- $360</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="wrapper-content" data-earnings="marketing-guide">
                            <div class="widget-earnings-scroll table-responsive">
                                <table class="table table-borderless widget-earnings-width mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-19.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">yono Lter</h6>
                                                    <span class="font-small-2">Designer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80" aria-valuemax="100" style="width:28%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-primary">- $270</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                    <span class="font-small-2">Marketing</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-primary">+ $225</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-75">
                                            <div class="media align-items-center">
                                                <a class="media-left mr-50" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-25.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                    <span class="font-small-2">Devloper</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-0 w-25">
                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-light-danger">- $350</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Marketing Campaigns Starts -->
            <div class="col-xl-8 col-12 dashboard-marketing-campaign">
                <div class="card marketing-campaigns">
                    <div class="card-header d-flex justify-content-between align-items-center pb-1">
                        <h4 class="card-title">Marketing campaigns</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-md-9 col-12">
                                    <div class="d-inline-block">
                                        <!-- chart-1   -->
                                        <div class="d-flex market-statistics-1" style="position: relative;">
                                            <!-- chart-statistics-1 -->
                                            <div id="donut-success-chart" style="min-height: 74.7073px;"><div id="apexchartsvi39b28s" class="apexcharts-canvas apexchartsvi39b28s light" style="width: 80px; height: 74.7073px;"><svg id="SvgjsSvg1436" width="80" height="74.70731707317074" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1438" class="apexcharts-inner apexcharts-graphical" transform="translate(14.5, 15)"><defs id="SvgjsDefs1437"><clipPath id="gridRectMaskvi39b28s"><rect id="SvgjsRect1439" width="55" height="77" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskvi39b28s"><rect id="SvgjsRect1440" width="55" height="77" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath></defs><g id="SvgjsG1442" class="apexcharts-pie" data:innerTranslateX="0" data:innerTranslateY="-25"><g id="SvgjsG1443" transform="translate(0, -5) scale(1)"><circle id="SvgjsCircle1444" r="13.897560975609759" cx="26.5" cy="26.5" fill="transparent"></circle><g id="SvgjsG1445" class="apexcharts-slices"><g id="SvgjsG1446" class="apexcharts-series apexcharts-pie-series" seriesName="Installation" rel="1" data:realIndex="0"><path id="SvgjsPath1447" d="M 26.5 6.6463414634146325 A 19.853658536585368 19.853658536585368 0 0 1 26.5 46.35365853658537 L 26.5 40.39756097560976 A 13.897560975609759 13.897560975609759 0 0 0 26.5 12.602439024390241 L 26.5 6.6463414634146325 z" fill="rgba(253,172,65,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="180" data:startAngle="0" data:strokeWidth="2" data:value="70" data:pathOrig="M 26.5 6.6463414634146325 A 19.853658536585368 19.853658536585368 0 0 1 26.5 46.35365853658537 L 26.5 40.39756097560976 A 13.897560975609759 13.897560975609759 0 0 0 26.5 12.602439024390241 L 26.5 6.6463414634146325 z"></path></g><g id="SvgjsG1448" class="apexcharts-series apexcharts-pie-series" seriesName="PagexViews" rel="2" data:realIndex="1"><path id="SvgjsPath1449" d="M 26.5 46.35365853658537 A 19.853658536585368 19.853658536585368 0 0 1 7.144114133755991 30.91785464001074 L 12.950879893629192 29.59249824800752 A 13.897560975609759 13.897560975609759 0 0 0 26.5 40.39756097560976 L 26.5 46.35365853658537 z" fill="rgba(0,207,221,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="77.14285714285711" data:startAngle="180" data:strokeWidth="2" data:value="30" data:pathOrig="M 26.5 46.35365853658537 A 19.853658536585368 19.853658536585368 0 0 1 7.144114133755991 30.91785464001074 L 12.950879893629192 29.59249824800752 A 13.897560975609759 13.897560975609759 0 0 0 26.5 40.39756097560976 L 26.5 46.35365853658537 z"></path></g><g id="SvgjsG1450" class="apexcharts-series apexcharts-pie-series" seriesName="ActivexUsers" rel="3" data:realIndex="2"><path id="SvgjsPath1451" d="M 7.144114133755991 30.91785464001074 A 19.853658536585368 19.853658536585368 0 0 1 26.496534882917288 6.646341765803143 L 26.497574418042102 12.602439236062198 A 13.897560975609759 13.897560975609759 0 0 0 12.950879893629192 29.59249824800752 L 7.144114133755991 30.91785464001074 z" fill="rgba(90,141,238,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="102.85714285714289" data:startAngle="257.1428571428571" data:strokeWidth="2" data:value="40" data:pathOrig="M 7.144114133755991 30.91785464001074 A 19.853658536585368 19.853658536585368 0 0 1 26.496534882917288 6.646341765803143 L 26.497574418042102 12.602439236062198 A 13.897560975609759 13.897560975609759 0 0 0 12.950879893629192 29.59249824800752 L 7.144114133755991 30.91785464001074 z"></path></g></g></g></g><line id="SvgjsLine1452" x1="0" y1="0" x2="53" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1453" x1="0" y1="0" x2="53" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(253, 172, 65);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 207, 221);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(90, 141, 238);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                            <!-- data -->
                                            <div class="statistics-data my-auto">
                                                <div class="statistics">
                                                    <span class="font-medium-2 mr-50 text-bold-600">25,756</span><span class="text-success">(+16.2%)</span>
                                                </div>
                                                <div class="statistics-date">
                                                    <i class="bx bx-radio-circle font-small-1 text-success mr-25"></i>
                                                    <small class="text-muted">May 12, 2019</small>
                                                </div>
                                            </div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 214px; height: 76px;"></div></div><div class="contract-trigger"></div></div></div>
                                    </div>
                                    <div class="d-inline-block">
                                        <!-- chart-2 -->
                                        <div class="d-flex mb-75 market-statistics-2" style="position: relative;">
                                            <!-- chart statistics-2 -->
                                            <div id="donut-danger-chart" style="min-height: 74.7073px;"><div id="apexchartszqciua0o" class="apexcharts-canvas apexchartszqciua0o light" style="width: 80px; height: 74.7073px;"><svg id="SvgjsSvg1456" width="80" height="74.70731707317074" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1458" class="apexcharts-inner apexcharts-graphical" transform="translate(14.5, 15)"><defs id="SvgjsDefs1457"><clipPath id="gridRectMaskzqciua0o"><rect id="SvgjsRect1459" width="55" height="77" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskzqciua0o"><rect id="SvgjsRect1460" width="55" height="77" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath></defs><g id="SvgjsG1462" class="apexcharts-pie" data:innerTranslateX="0" data:innerTranslateY="-25"><g id="SvgjsG1463" transform="translate(0, -5) scale(1)"><circle id="SvgjsCircle1464" r="13.897560975609759" cx="26.5" cy="26.5" fill="transparent"></circle><g id="SvgjsG1465" class="apexcharts-slices"><g id="SvgjsG1466" class="apexcharts-series apexcharts-pie-series" seriesName="Installation" rel="1" data:realIndex="0"><path id="SvgjsPath1467" d="M 26.5 6.6463414634146325 A 19.853658536585368 19.853658536585368 0 0 1 26.5 46.35365853658537 L 26.5 40.39756097560976 A 13.897560975609759 13.897560975609759 0 0 0 26.5 12.602439024390241 L 26.5 6.6463414634146325 z" fill="rgba(255,91,92,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="180" data:startAngle="0" data:strokeWidth="2" data:value="70" data:pathOrig="M 26.5 6.6463414634146325 A 19.853658536585368 19.853658536585368 0 0 1 26.5 46.35365853658537 L 26.5 40.39756097560976 A 13.897560975609759 13.897560975609759 0 0 0 26.5 12.602439024390241 L 26.5 6.6463414634146325 z"></path></g><g id="SvgjsG1468" class="apexcharts-series apexcharts-pie-series" seriesName="PagexViews" rel="2" data:realIndex="1"><path id="SvgjsPath1469" d="M 26.5 46.35365853658537 A 19.853658536585368 19.853658536585368 0 0 1 7.144114133755991 22.082145359989255 L 12.950879893629192 23.407501751992477 A 13.897560975609759 13.897560975609759 0 0 0 26.5 40.39756097560976 L 26.5 46.35365853658537 z" fill="rgba(130,141,153,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="102.85714285714289" data:startAngle="180" data:strokeWidth="2" data:value="40" data:pathOrig="M 26.5 46.35365853658537 A 19.853658536585368 19.853658536585368 0 0 1 7.144114133755991 22.082145359989255 L 12.950879893629192 23.407501751992477 A 13.897560975609759 13.897560975609759 0 0 0 26.5 40.39756097560976 L 26.5 46.35365853658537 z"></path></g><g id="SvgjsG1470" class="apexcharts-series apexcharts-pie-series" seriesName="ActivexUsers" rel="3" data:realIndex="2"><path id="SvgjsPath1471" d="M 7.144114133755991 22.082145359989255 A 19.853658536585368 19.853658536585368 0 0 1 26.496534882917288 6.646341765803143 L 26.497574418042102 12.602439236062198 A 13.897560975609759 13.897560975609759 0 0 0 12.950879893629192 23.407501751992477 L 7.144114133755991 22.082145359989255 z" fill="rgba(90,141,238,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="77.14285714285711" data:startAngle="282.8571428571429" data:strokeWidth="2" data:value="30" data:pathOrig="M 7.144114133755991 22.082145359989255 A 19.853658536585368 19.853658536585368 0 0 1 26.496534882917288 6.646341765803143 L 26.497574418042102 12.602439236062198 A 13.897560975609759 13.897560975609759 0 0 0 12.950879893629192 23.407501751992477 L 7.144114133755991 22.082145359989255 z"></path></g></g></g></g><line id="SvgjsLine1472" x1="0" y1="0" x2="53" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1473" x1="0" y1="0" x2="53" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 91, 92);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(130, 141, 153);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(90, 141, 238);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                            <!-- data-2 -->
                                            <div class="statistics-data my-auto">
                                                <div class="statistics">
                                                    <span class="font-medium-2 mr-50 text-bold-600">5,352</span><span class="text-danger">(-4.9%)</span>
                                                </div>
                                                <div class="statistics-date">
                                                    <i class="bx bx-radio-circle font-small-1 text-success mr-25"></i>
                                                    <small class="text-muted">Jul 26, 2019</small>
                                                </div>
                                            </div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 191px; height: 76px;"></div></div><div class="contract-trigger"></div></div></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 text-md-right">
                                    <button class="btn btn-sm btn-primary glow mt-md-2 mb-1">View Report</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive ps">
                        <!-- table start -->
                        <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
                            <thead>
                            <tr>
                                <th>Campaign</th>
                                <th>Growth</th>
                                <th>Charges</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="py-1 line-ellipsis">
                                    <img class="rounded-circle mr-1" src="../../../app-assets/images/icon/fs.png" alt="card" height="24" width="24">Fastrack Watches
                                </td>
                                <td class="py-1">
                                    <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>30%</span>
                                </td>
                                <td class="py-1">$5,536</td>
                                <td class="text-success py-1">Active</td>
                                <td class="text-center py-1">
                                    <div class="dropdown">
                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1 line-ellipsis">
                                    <img class="rounded-circle mr-1" src="../../../app-assets/images/icon/puma.png" alt="card" height="24" width="24">Puma Shoes
                                </td>
                                <td class="py-1">
                                    <i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>15.5%</span>
                                </td>
                                <td class="py-1">$1,569</td>
                                <td class="text-success py-1">Active</td>
                                <td class="text-center py-1">
                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1 line-ellipsis">
                                    <img class="rounded-circle mr-1" src="../../../app-assets/images/icon/nike.png" alt="card" height="24" width="24">Nike Air Jordan
                                </td>
                                <td class="py-1">
                                    <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>70.30%</span>
                                </td>
                                <td class="py-1">$23,859</td>
                                <td class="text-danger py-1">Closed</td>
                                <td class="text-center py-1">
                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1 line-ellipsis">
                                    <img class="rounded-circle mr-1" src="../../../app-assets/images/icon/one-plus.png" alt="card" height="24" width="24">Oneplus 7 pro
                                </td>
                                <td class="py-1">
                                    <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>10.4%</span>
                                </td>
                                <td class="py-1">$9,523</td>
                                <td class="text-success py-1">Active</td>
                                <td class="text-center py-1">
                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1 line-ellipsis">
                                    <img class="rounded-circle mr-1" src="../../../app-assets/images/icon/google.png" alt="card" height="24" width="24">Google Pixel 4 xl
                                </td>
                                <td class="py-1"><i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>-62.38%</span>
                                </td>
                                <td class="py-1">12,897</td>
                                <td class="text-danger py-1">Closed</td>
                                <td class="text-center py-1">
                                    <div class="dropup">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- table ends -->
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
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
