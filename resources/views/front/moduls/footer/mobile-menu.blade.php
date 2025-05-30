<div class="sticky-footer sticky-content fix-bottom">
    <a href="/" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Главная</p>
    </a>
    <a href="/" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Магазин</p>
    </a>
    <a href="{{route('wishlist')}}" class="sticky-link">
        <i class="w-icon-heart"></i>
        <p>Избранное</p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="{{route('cart')}}" class="sticky-link">
            <i class="w-icon-cart"></i>
            <p>Корзина</p>
        </a>
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>Поиск</p>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Поиск" required/>
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>