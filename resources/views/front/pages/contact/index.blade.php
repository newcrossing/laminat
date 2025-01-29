@extends('front.layouts.main')

@section('title','Контакты  | Интернет-магазин напольных покрытий «Пол России»')
@section('description',"Контакты, мы рады помочь вам в выборе напольных покрытий. Звоните, наши специалисты окажут вам всестороннюю помощь в выборе")

@section('vendor-styles')

@endsection


@section('page-styles')
@endsection

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Контакты</h1>
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

                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3">
                        Контактная информация
                    </h3>
                    <p class="text-center">Если у вас остались вопросы свяжитесь с нами</p>
                </section>

                <!-- End of Contact Title Section -->

                <section class="contact-information-section mb-10">
                    <div class=" swiper-container swiper-theme " data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                        <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-email">
                                        <i class="w-icon-envelop-closed"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">E-mail </h4>
                                    <p>{{config('contact.email')}}</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-headphone">
                                        <i class="w-icon-headphone"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Телефон</h4>
                                    <p>{{config('contact.phone')}}</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Адрес</h4>
                                    <p style="white-space: normal;">{{config('contact.adress')}}</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon ">
                                        <i class="w-icon-hotline" style="font-size: 5.1rem;"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Время работы</h4>
                                    <p>10:00 - 21:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">

                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Люди обычно задают такие вопросы</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse1" class="collapse">Как я могу оплатить заказ?</a>
                                    </div>
                                    <div id="collapse1" class="card-body expanded">
                                        <p class="mb-0">
                                            Если вы уже определились с выбором декора, то можете оформить заказ.
                                            Вы можете сделать это на нашем сайте, заполнив корзину, или в шоу-руме. Мы предлагаем различные способы оплаты, чтобы вам было удобно.
                                            Оплата возможна Банковской картой, По QR-коду, Наличными.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse2" class="expand">Куда я могу заказаь достаку?</a>
                                    </div>
                                    <div id="collapse2" class="card-body collapsed">
                                        <p class="mb-0">
                                            Доставка осуществляется по Москве и Московской области. Тарифы на доставку можете
                                            увидеть на странице "Доставка"
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <script type="text/javascript" charset="utf-8" async
                                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac8ce9ebdbd70ef829bb5100e960f23dfe0ed7b16eee3178975605564e2b1b573&amp;width=640&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Сообщение директору</h4>
                            <form class="form contact-us-form" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Имя *</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ваше имя" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Телефон *</label>
                                    <input type="text" name="phone" placeholder="Номер телефона" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_1">E-mail</label>
                                    <input type="email" name="email" placeholder="Адрес электронной почты" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Комментарий / Вопрос </label>
                                    <textarea name="comment" cols="30" rows="5" class="form-control" placeholder="Оставьте свой комментарий или вопрос" required></textarea>
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
