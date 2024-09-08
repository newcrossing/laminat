<!-- Header start  -->
<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">

                {{--                @include('frontend.moduls.header-top-social')            --}}

                @include('frontend.moduls.header-top-message')

                @include('frontend.moduls.header-top-responsive-action')

            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->

    @include('frontend.moduls.header-bottom')
    @include('frontend.moduls.menu')


</header>
<!-- Header End  -->