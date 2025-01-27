<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Поиск" required/>
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Меню</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Категории</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/">Услуги</a></li>
                    <li>
                        <a href="">Сотрудничество</a>
                        <ul>
                            <li><a href="#">Поставщикам</a></li>
                            <li><a href="#">Партнерам</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Оплата и доставка</a>
                        <ul>
                            <li><a href="#">Оплата</a></li>
                            <li><a href="#">Доставка</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('contact.index')}}">Контакты</a></li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @foreach(\App\Models\Type::withWhereHas('productsPublic')->public()->get() as $type)
                        <li>
                            <a href="{{route('type.index',$type->slug)}}"> {{$type->name}} </a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{route('manufacture.list')}}"> Производители </a>
                    </li>
                    <li>
                        <a href=""> Скидки </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>