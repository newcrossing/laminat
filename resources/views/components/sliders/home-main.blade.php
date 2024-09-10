{{--Слайдер на главную старницу --}}
<!-- Main Slider Start -->
@if($sliders->count())
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="ec-slide-item swiper-slide d-flex ">
                        @if($img =  $slider->fotos()->first())
                            <img src="{{  Croppa::url($img->getUrlForCroppa(),1920,800,['quadrant'])}}" class="ec-slide-my">
                        @endif
                        <div class="container align-self-center">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                    <div class="ec-slide-content slider-animation">
                                        @isset($slider->h1)
                                            <h1 class="ec-slide-title" style=";">{{$slider->h1}}</h1>
                                        @endisset
                                        @isset($slider->h2)
                                            <h2 class="ec-slide-stitle">{{$slider->h2}}</h2>
                                        @endisset
                                        @isset($slider->text)
                                            <p style="  text-stroke: 2px #FFFFFF; font-size: 26px; font-weight: bolder;   text-shadow: 1px 0 1px #ffffff,
    0 1px 1px #ffffff,
    -1px 0 1px #ffffff,
    0 -1px 1px #ffffff;">{{$slider->text}}</p>
                                        @endisset
                                        @isset($slider->link)
                                            <a href="{{$slider->link}}" class="btn btn-lg btn-secondary">Перейти</a>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->
@endif