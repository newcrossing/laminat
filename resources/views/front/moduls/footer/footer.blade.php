<footer class="footer appear-animate" data-animation-options="{            'name': 'fadeIn'        }">

    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="/" class="logo-footer">
                            <img src="/assets/images/logo.svg" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">Остались вопросы?</p>
                            <a href="tel:{{config('contact.phone_min')}}" class="widget-about-call">{{config('contact.phone')}}</a>
                            <a href="email:{{config('contact.email')}}" class="widget-about-call">{{config('contact.email')}}</a>
                            <p class="widget-about-desc">Время работы: 10:00 - 20:00 <br>
                                {{config('contact.adress')}}
                            </p>
                            <p class="widget-about-desc"></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Компания</h3>
                        <ul class="widget-body">
                            <li><a href="">О нас</a></li>
                            <li><a href="{{route('contact.index')}}">Контакты</a></li>
                            <li><a href="/info/postavshhikam/">Поставщикам</a></li>
                            <li><a href="">Партнерам</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Услуги</h4>
                        <ul class="widget-body">
                            <li><a href="#">Замер</a></li>
                            <li><a href="">Укладка</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Службы</h4>
                        <ul class="widget-body">
                            <li><a href="#">Оплата</a></li>
                            <li><a href="">Доставка</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">© Интернет-магазин polrossii.ru 2025.</p>
            </div>
        </div>
    </div>
</footer>