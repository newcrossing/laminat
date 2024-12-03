@if($sliders->count())
    <section class="intro-section mt-4">
        <div class="swiper-container swiper-theme animation-slider" data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000,
                        'disableOnInteraction': false
                    }
                }">
            <div class="swiper-wrapper row gutter-no cols-1">
                @foreach($sliders as $slider)
                    <div class="swiper-slide banner banner-fixed content-center intro-slide intro-slide1"
                         style="background-image: url({{  Croppa::url($slider->fotos()->first()->getUrlForCroppa(),1920,800,['quadrant'])}}); background-color: #EEF4F4;">
                        <div class="container">
                            <div class="banner-content d-inline-block y-50" style="max-width: 50%;">
                                <div class="slide-animate" data-animation-options="{
                                        'name': 'zoomIn', 'duration': '1s'
                                    }">
                                    @isset($slider->text)
                                        <h5 class="banner-subtitle text-uppercase font-weight-bold">
                                            {{$slider->text}}
                                        </h5>
                                    @endisset
                                    @isset($slider->h1)
                                        <h3 class="banner-title text-capitalize ls-25">
                                            <span class="text-primary">{{$slider->h1}}</span><br>
                                            @isset($slider->h2)
                                                {{$slider->h2}}
                                            @endisset
                                        </h3>
                                    @endisset

                                    @isset($slider->link)
                                            <a href="{{$slider->link}}"
                                               class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                                                Перейти<i class="w-icon-long-arrow-right"></i>
                                            </a>
                                    @endisset

                                </div>
                            </div>
{{--                            <figure class=" " style="position: absolute;--}}
{{--    left: 0px;--}}
{{--    top: 0px;"--}}

{{--                                    >--}}
{{--                                <img src="{{  Croppa::url($slider->fotos()->first()->getUrlForCroppa(),1920,800,['quadrant'])}}" alt=""--}}
{{--                                    >--}}
{{--                            </figure>--}}
                        </div>
                    </div>
                    <!-- End of Intro Slide 1 -->
                @endforeach
            </div>
            <div class="custom-dots swiper-img-dots appear-animate">
                @foreach($sliders as $slider)
                <a href="#" class=" @if ($loop->first) active @endif">
                    <img src="{{  Croppa::url($slider->fotos()->first()->getUrlForCroppa(),70,70,['quadrant'])}}" alt="Dot" width="70" height="70"/>
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endif