<!-- WebFont.js -->
<script>
    WebFontConfig = {
        google: {families: ['Poppins:400,500,600,700']}
    };
    (function (d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = '/assets/js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/assets/fonts/wolmart.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">
<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="/assets/vendor/fontawesome-free/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.min.css">

<!-- Plugin CSS -->
<link rel="stylesheet" type="text/css" href="/assets/vendor/magnific-popup/magnific-popup.min.css">
<link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/photoswipe/photoswipe.min.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/photoswipe/default-skin/default-skin.min.css">
<!-- Swiper's CSS -->
<link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">

<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

<link rel="stylesheet" href="/assets/css/toastr.css">

@yield('vendor-styles')