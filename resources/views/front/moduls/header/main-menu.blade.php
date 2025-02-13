<nav class="main-nav">
    <ul class="menu active-underline">
        <li>
            <a href="{{route('home')}}">Главная</a>
        </li>
        <li>
            <a href="{{route('uslugi.index')}}">Услуги</a>
        </li>
        <li>
            <a href="#">Сотрудничество</a>
            <ul>
                <li><a href="/info/postavshhikam">Поставщикам</a></li>
                <li><a href="/info/partneram">Партнерам</a></li>
            </ul>
        </li>
        <li>
            <a href="#" style="text-transform: none">Оплата и доставка</a>
            <ul>
                <li><a href="/info/oplata">Оплата</a></li>
                <li><a href="/info/dostavka">Доставка</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('contact.index')}}">Контакты</a>
        </li>

    </ul>
</nav>