@extends('front.layouts.main')

@section('title','Услуги  | Интернет-магазин напольных покрытий «Пол России»')
@section('description',"Услуги, мы рады помочь вам в выборе напольных покрытий. Звоните, наши специалисты окажут вам всестороннюю помощь в выборе")

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Услуги</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <x-front.main.breadcrumb :breadcrumbs="$breadcrumbs"/>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-icon alert-success alert-bg alert-inline show-code-action mb-3">
                        <h4 class="alert-title"><i class="fas fa-check"></i>Выполнено.</h4> {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error alert-bg alert-block alert-inline mb-4 ">
                        <h4 class="alert-title"><i class="w-icon-exclamation-triangle"></i>Ошибка!</h4> Некоторые поля некорректно заполнены.
                        <ul class="mt-0">
                            @foreach ($errors->all() as $error)
                                <li><span>{{ $error }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <section class="contact-section mt-4">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Полный пакет услуг</h4>
                            <p>В нашем интернет-магазине напольных покрытий "Пол России" мы стремимся сделать ваш процесс выбора и укладки полов максимально комфортным и точным.
                                Для этого мы предлагаем комплекс профессиональных услуг.</p>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                @foreach(\App\Enums\UslugiEnum::cases() as $case)
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#{{$case->value}}" class="expand">  <h6 class="mb-0">{{$case->name()}}</h6></a>
                                        </div>
                                        <div id="{{$case->value}}" class="card-body collapsed">
                                            <p class="mb-0">
                                               {!! $case->text() !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Заказать услугу</h4>
                            <form class="form contact-us-form" action="" method="post">
                                @csrf
                                <div class="mb-3">
                                    <div class="row cols-md-2">
                                        @foreach(\App\Enums\UslugiEnum::cases() as $case)
                                            <div class="mb-0">
                                                <div class="custom-radio">
                                                    <input type="checkbox" id="{{$case->name}}" class="custom-control-input" name="uslugi[]" value="{{$case->value}}">
                                                    <label for="{{$case->name}}" class="custom-control-label color-dark">{{$case->name()}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Имя *</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Ваше имя" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Телефон *</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Номер телефона" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_1">E-mail</label>
                                    <input type="email" name="email" value="{{old('email')}}" placeholder="Адрес электронной почты" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Комментарий / Вопрос </label>
                                    <textarea name="comment" cols="30" rows="5" class="form-control" placeholder="Оставьте свой комментарий или вопрос"
                                              required>{{old('comment')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message">Капча </label>
                                    <div class="row">
                                        <div class="col-4">
                                            <input id="captcha" type="text" class="form-control" placeholder="Введите капчу" name="captcha" required>
                                        </div>
                                        <div class="col-8">
                                            <span>{!! captcha_img() !!}</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Отправить</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->
            </div>
            <!-- End Map Section -->
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('page-scripts')
@endsection
