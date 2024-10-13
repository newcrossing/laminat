<!-- Related Product Start -->
<section class="section ec-releted-product section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Похожие товары</h2>
                    <h2 class="ec-title">Похожие товары</h2>
                    <p class="sub-title">Товары схожие с выбранным</p>
                </div>
            </div>
        </div>
        <div class="row margin-minus-b-30">
            <!-- Related Product Content -->
           <x-products.card :products="$products" />
        </div>
    </div>
</section>
<!-- Related Product end -->