@extends('frontend.layouts.main')

@section('title','Изменение объявления')

@section('vendor-styles')

@endsection


@section('page-styles')
@endsection

@section('content')
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">


                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Контакты</h2>
                        <h2 class="ec-title">Контакты</h2>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success ml-3 mr-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="ec-common-wrapper">
                    <div class="ec-contact-leftside">
                        <div class="ec-contact-container">
                            <div class="ec-contact-form typography ">

                                <h6 class="ec-fw-bold ec-fc">Отправить сообщение менеджеру</h6>
                                <form action="" method="post">
                                    @csrf
                                    <span class="ec-contact-wrap">
                                        <label>Имя *</label>
                                        <input type="text" name="name" placeholder="" required/>
                                    </span>

                                    <span class="ec-contact-wrap">
                                        <label>Телефон *</label>
                                        <input type="text" name="tel" placeholder="" required/>
                                    </span>

                                    <span class="ec-contact-wrap">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="" required/>
                                    </span>

                                    <span class="ec-contact-wrap">
                                        <label>Комментарий / Вопрос </label>
                                        <textarea name="comment" placeholder="Оставьте свой комментарий или вопрос" required></textarea>
                                    </span>

                                    <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-primary" type="submit">Отправить</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ec-contact-rightside">
                        <div class="ec_contact_map">
                            <div class="ec_map_canvas">
                                <script type="text/javascript" charset="utf-8" async
                                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac8ce9ebdbd70ef829bb5100e960f23dfe0ed7b16eee3178975605564e2b1b573&amp;width=640&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
                            </div>
                        </div>
                        <div class="ec_contact_info" style="">
                            <h1 class="ec_contact_info_head">Контакты</h1>
                            <ul class="align-items-center">
                                <li class="ec-contact-item">
                                    <i class="ecicon eci-map-marker" aria-hidden="true"></i>
                                    <span>Адрес :</span>{{config('contact.adress')}}
                                </li>
                                <li class="ec-contact-item align-items-center">
                                    <i class="ecicon eci-phone" aria-hidden="true"></i><span>Телефон :</span>
                                    <a href="tel:{{config('contact.phone_min')}}">{{config('contact.phone')}}</a></li>
                                <li class="ec-contact-item align-items-center">
                                    <i class="ecicon eci-envelope" aria-hidden="true"></i><span>Email :</span>
                                    <a href="mailto:{{config('contact.email')}}">{{config('contact.email')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page-scripts')
@endsection
