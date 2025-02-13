@extends('front.layouts.main')

@section('title',"Скидки на напольные покрытия - Пол России")
@section('keywords','Скидки, акции, напольные покрытия')
@section('description',"В интернет-магазине «Пол России» вы найдёте широкий выбор напольных покрытий по выгодным ценам и скидки. Мы предоставляем расширенную гарантию на все товары.")

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Скидки</h1>
                <h4 class="page-subtitle text-normal">на напольные покрытия</h4>
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
                    <div class="tab tab-with-title tab-nav-boxed">
                        <h2 class="title">Напольные покрытия со скидкой</h2>
                        <ul class="nav nav-tabs tags">
                            @foreach($types as $type)
                                <li class="">
                                    <a class="tag text-normal bg-grey" href="#{{$type->slug}}">{{$type->name}} ({{count($type->productsPublic)}})</a>
                                </li>
                            @endforeach
                        </ul>
                        <div>
                            Преображайте свой дом с нашими эксклюзивными скидками на напольные покрытия! Только сейчас у вас есть уникальная возможность приобрести качественные
                            материалы для пола по специальным ценам. Выберите подходящий тип продукции.
                        </div>
                    </div>
                </section>

                @forelse ($types as $type)
                    <div class="title-link-wrapper">
                        <h2 class="title title-link" id="{{$type->slug}}">{{$type->name}} ({{count($type->productsPublic)}}) </h2>
                        <a href="{{route('type.index',['slug_type'=> $type->slug])}}" class="btn btn-dark btn-link btn-icon-right text-normal">Посмотреть все
                            <i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                    <div class="product-wrapper row cols-2 cols-sm-3 cols-md-4 cols-lg-6  ">
                        <x-front.products.card :products="$type->productsPublic" no_col="true"/>
                    </div>
                    <div class="btn-wrap show-code-action text-center mb-5">
                        <a href="#" class="btn btn-outline light">Смотреть все</a>
                    </div>
                @empty
                    <div class="alert alert-warning alert-simple alert-inline show-code-action">
                        <h4 class="alert-title">Упс!</h4> На данный момент товары по скидке отсутствуют.
                    </div>
                @endforelse

                <!-- End of Element Section -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
