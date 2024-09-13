<!-- Footer Start -->
<footer class="ec-footer section-space-mt">
    <div class="footer-container">
        <div class="footer-offer">
            <div class="container">
                <div class="row">
                    <div class="text-center footer-off-msg">
                        <span>Лимитированная коллекция </span><a href="#" target="_blank">посмотеть детали</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo">
                                <a href="#">
                                    <img src="/assets/images/logo/footer-logo.png" alt="">
                                    <img class="dark-footer-logo" src="/assets/images/logo/dark-logo.png" alt="Site Logo" style="display: none;"/>
                                </a>
                            </div>
                            <h4 class="ec-footer-heading">Контакты</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        {{config('contact.adress_min')}}
                                    </li>
                                    <li class="ec-footer-link">
                                        <span>Телефон:</span>
                                        <a href="tel:{{config('contact.phone_min')}}">{{config('contact.phone')}}</a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <span>Email:</span>
                                        <a href="mailto:{{config('contact.email')}}">{{config('contact.email')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Информация</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="about-us.html">О нас</a></li>
                                    <li class="ec-footer-link"><a href="faq.html">Вопросы</a></li>
                                    <li class="ec-footer-link"><a href="#">Delivery Information</a></li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Аккаунт</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="#">Мой аккаунт</a></li>
                                    <li class="ec-footer-link"><a href="#">История заказа</a></li>
                                    <li class="ec-footer-link"><a href="#">Избранное</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Услуги</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="#">Оплата</a></li>
                                    <li class="ec-footer-link"><a href="#">Доставка </a></li>
                                    <li class="ec-footer-link"><a href="#">Возврат</a></li>
                                    <li class="ec-footer-link"><a href="#">Укладка</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-news">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Рассылка</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        Получайте мгновенную информацию о наших новых продуктах и специальных акциях!
                                    </li>
                                </ul>
                                <div class="ec-subscribe-form">
                                    <form id="ec-newsletter-form" name="ec-newsletter-form" method="post" action="#">
                                        <div id="ec_news_signup" class="ec-form">
                                            <input class="ec-email" type="email" required=""
                                                   placeholder="Укажите свой e-mail" name="ec-email" value=""/>
                                            <button id="ec-news-btn" class="button btn-primary" type="submit"
                                                    name="subscribe" value="">
                                                <i class="ecicon eci-paper-plane-o" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->
                    <div class="col text-left footer-bottom-left">
                        <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer social End -->
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">© Интернет-магазин Polrossii.ru 2024. Все права защищены.
                                <a class="site-name text-upper" href="#">
                                    <span>При копировании материалов прямая ссылка на сайт обязательна.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    {{--                    <div class="col footer-bottom-right">--}}
                    {{--                        <div class="footer-bottom-payment d-flex justify-content-end">--}}
                    {{--                            <div class="payment-link">--}}
                    {{--                                <img src="/assets/images/icons/payment.png" alt="">--}}
                    {{--                            </div>--}}

                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->