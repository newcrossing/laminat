<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count">2</span>
        </i>
        <span class="cart-label">Корзина </span>
    </a>
    <div class="dropdown-box">
        <div class="cart-header">
            <span>Корзина покупок</span>
            <a href="#" class="btn-close">Закрыть<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products">
            <div class="product product-cart">
                <div class="product-detail">
                    <a href="" class="product-name">Beige knitted
                        elas<br>tic
                        runner shoes</a>
                    <div class="price-box">
                        <span class="product-quantity">1</span>
                        <span class="product-price">$25.68</span>
                    </div>
                </div>
                <figure class="product-media">
                    <a href="">
                        <img src="/assets/images/cart/product-1.jpg" alt="product" height="84"
                             width="94"/>
                    </a>
                </figure>
                <button class="btn btn-link btn-close" aria-label="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="product product-cart">
                <div class="product-detail">
                    <a href="" class="product-name">Blue utility
                        pina<br>fore
                        denim dress</a>
                    <div class="price-box">
                        <span class="product-quantity">1</span>
                        <span class="product-price">$32.99</span>
                    </div>
                </div>
                <figure class="product-media">
                    <a href="">
                        <img src="/assets/images/cart/product-2.jpg" alt="product" width="84"
                             height="94"/>
                    </a>
                </figure>
                <button class="btn btn-link btn-close" aria-label="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="cart-total">
            <label>Subtotal:</label>
            <span class="price">$58.67</span>
        </div>

        <div class="cart-action">
            <a href="{{route('cart')}}" class="btn btn-dark btn-outline btn-rounded">Смотреть корзину</a>
            <a href="{{route('order')}}" class="btn btn-primary  btn-rounded">Оформить</a>
        </div>
    </div>
    <!-- End of Dropdown Box -->
</div>