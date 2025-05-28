<div>
    @if($banners->count())
        <div class="mb-5 swiper-container swiper-theme show-code-action swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
             data-swiper-options="{
                            'spaceBetween': 10,
                            'slidesPerView': 1,
                            'autoplay': {'delay': 8000,'disableOnInteraction': false},
                            'breakpoints': {'576': {'slidesPerView': 2},'992': {'slidesPerView': 2}}
                        }">
            <div class="swiper-wrapper " id="swiper-wrapper-e5ccb74f4f1e10f4d" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                {{$urlCurrent}}
                @foreach($banners as $banner)
                    <div class="swiper-slide category-wrap swiper-slide-active" role="group" aria-label="1 / 3" style="width: 400px; margin-right: 20px;">
                        <div class="category category-absolute category-default overlay-zoom">
                            <a href="{{$banner->url}}">
                                <figure>
                                    <img src="{{  Croppa::url($banner->fotoOne()->getUrlForCroppa(),640,200,['quadrant'])}}"
                                         style="background-color: #423D39;min-height: 150px;"/>
                                </figure>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets" style="display: none;">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    @endif
</div>
