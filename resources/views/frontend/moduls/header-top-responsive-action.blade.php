<!-- Header Top responsive Action -->
<div class="col d-lg-none ">
    <div class="ec-header-bottons">
        <!-- Header User Start -->
        <div class="ec-header-user dropdown">
            <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                        src="assets/images/icons/user.svg" class="svg_img header_svg" alt=""/></button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('backend.login')}}">Войти</a></li>
                <li><a class="dropdown-item" href="/log-viewer">Логи</a></li>
            </ul>
        </div>
        <!-- Header User End -->
        <!-- Header Cart Start -->
        <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
            <div class="header-icon">
                <img src="assets/images/icons/wishlist.svg" class="svg_img header_svg" alt=""/></div>
            <span class="ec-header-count">4</span>
        </a>
        <!-- Header Cart End -->
        <!-- Header Cart Start -->
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><img src="assets/images/icons/cart.svg"
                                          class="svg_img header_svg" alt=""/></div>
            <span class="ec-header-count cart-count-lable">3</span>
        </a>
        <!-- Header Cart End -->
        <!-- Header menu Start -->
        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
            <img src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon"/>
        </a>
        <!-- Header menu End -->
    </div>
</div>
<!-- Header Top responsive Action -->