@extends('front.layouts.main')

@section('title','Произволители напольных покрытий - "Пол России"')
@section('keywords','Произволители каталог фирм ламинта паркет напольных покрытий ')
@section('description','Пол России - производители напольных покрытий. Большой ассортимент, расширенная гарантия на товар!')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">{{$firm->name}}</h1>
                {{--                <h4 class="page-subtitle">Elements</h4>--}}
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">


                <section class=" mb-8 show-code-action">
                    <div class="title-link-wrapper">
                        <h2 class="title title-link"> {{$firm->name}}                        </h2>
                        <a class="btn btn-dark btn-link btn-icon-right">
                            @if($img =  $firm->fotos()->first())
                                <img src="{{  Croppa::url($img->getUrlForCroppa(),null,45)}}" class="mr-4" style="float: left" alt="{{$firm->name}}">
                            @endif
                        </a>
                    </div>
                    <p class="font-size-lg">
                        {!! $firm->text !!}
                    </p>
                </section>
                @if($firm->collections)
                    <div class="tags">
                        <label class="text-dark mr-2 font-weight-bold">Коллекции:</label>
                        @foreach($firm->collections as $collection)
                            <span class="tag">{{$collection->name}} </span>
                        @endforeach
                    </div>
                @endif
                <section class="mt-5 mb-8 iconbox-section ">
                    <div class="row">
                        <div class="col-2">
                            @foreach($firm->files as $file)
                                <div class="icon-box icon-colored-circle icon-border-box text-center">
                                        <span class="icon-box-icon text-white">
                                            <i class="w-icon-download"></i>
                                        </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">{{$file->name}}</h4>
                                        <p>{{$file->getSize()}}</p>
                                        <a href="{{Storage::disk('files')->url($file->full_name_file)}}" target="_blank">Скачать
                                            <i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </div>
                </section>

                @foreach($types as $type)
                    <div class="title-link-wrapper">
                        <h2 class="title title-link">{{$type->name}} ({{count($type->productsPublic)}})
                        </h2>
                        <a href="{{route('type.index',['slug_type'=> $type->slug,'slug_firm'=>$firm->slug])}}" class="btn btn-dark btn-link btn-icon-right text-normal">Посмотреть все <i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                        <x-front.products.card :products="$type->productsPublic" :col="2"/>
                    </div>
                @endforeach

                <!-- End of Element Section -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
