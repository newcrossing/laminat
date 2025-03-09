@extends('front.layouts.main')

@section('title','Страница не найдена')

@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="demo1.html">Главная</a></li>
                    <li>Ошибка 404</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content error-404">
            <div class="container">
                <div class="banner">
                    <figure>
                        <img src="/assets/images/pages/404.png" alt="Error 404" width="820" height="460"/>
                    </figure>
                    <div class="banner-content text-center">
                        <h2 class="banner-title">
                            <span class="text-secondary">Упс...</span> Что-то пошло не так
                        </h2>
                        <p class="text-light">Страница не найдена. Возможно, в указанном URL-адресе допущена орфографическая ошибка или страница, которую вы ищете, больше не
                            существует</p>
                        <a href="/" class="btn btn-dark btn-rounded btn-icon-right">Вернуться на главную<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

@endsection


