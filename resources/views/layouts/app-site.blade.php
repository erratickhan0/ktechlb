<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ktech Dashboard') }}</title>
    <link href="{{ asset('css/client/fonts/font-awesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/video-js.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/aos.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-client.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="{{ $class ?? '' }}">
    <div id="vue-host">

        @include('layouts.headers.site-header')
        <div class="main-content">
            @yield('content')
        </div>
        @include('layouts.footers.site-footer')

    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.slim.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/site/swiper.min.js')}}"></script>
    <script src="{{ asset('js/site/video.min.js')}}"></script>
    <script src="{{ asset('js/site/aos.js')}}"></script>
    <script src="{{ asset('js/site/FontAwesome.js')}}"></script>
    <script>
        $(document).ready(function() {

            $("#owl-demo").owlCarousel({
                navigation: true,
                autoplay: true,
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 3],
                    [1200, 3],
                    [1400, 3],
                    [1600, 3]
                ],
                pagination: false,
                navigationText: [
                    "<img class='newsleftarrow' src='dist/assets/img/left-arrow.png'>",
                    "<img class='newsrightarrow' src='dist/assets/img/right-arrow.png'>"
                ],
                afterInit: function(elem) {
                    var that = this
                    that.owlControls.prependTo(elem)
                }
            });
            // variable 
            var VIDEO_PLAYING_STATE = {
                "PLAYING": "PLAYING",
                "PAUSE": true,
                controls: true
            }
            var videoPlayStatus = VIDEO_PLAYING_STATE.PAUSE
            var timeout = null
            var waiting = 2500
            var swiper = new Swiper(
                '.swiper-container', {
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    effect: 'fade',
                    autoplay: {
                        delay: 5000,
                    },
                    speed: 3000,
                    breakpoints: {
                        // when window width is >= 320px
                        0: {
                            slidesPerView: 1
                        },
                        // when window width is >= 480px
                        768: {
                            slidesPerView: 1
                        },
                        // when window width is >= 640px
                        1200: {
                            slidesPerView: 1
                        }
                    }
                });

            // HTML5 vdo object
            var options = {};
            var player = videojs('my-player', options);
            player.on('ended', function() {
                next()
            })

            // swiper object
            swiper.on('slideChangeTransitionEnd', function() {
                var index = swiper.Index
                var currentSlide = $(swiper.slides[index])
                var currentSlideType = currentSlide.data('slide-type')

                // incase user click next before video ended
                if (videoPlayStatus === VIDEO_PLAYING_STATE.PLAYING) {
                    player.pause()
                }

                clearTimeout(timeout)


            })

            // global function
            function prev() {
                swiper.slidePrev();
            }

            function next() {
                swiper.slideNext();
            }


            AOS.init();
            $('#owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: false,
                margin: 20,
                items: 3,
                nav: false,
                dots: false,
                center: false,

                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            })

            /********Scroller**********/

            $(".scrollTo").on('click', function(e) {
                $('html, body').animate({
                    scrollTop: ($('#navbar4').offset().top)
                }, 1000);
            });

            $('#owl-carousel2').owlCarousel({
                loop: false,
                autoplay: false,
                autoplayTimeout: 5000,
                autoplayHoverPause: false,
                margin: 0,
                items: 5,
                nav: true,
                dots: false,
                center: false,

                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 3
                    },
                    1200: {
                        items: 5
                    }
                }
            })
            $(document).scroll(function() {
                var y = $(this).scrollTop();
                if (y > 1200) {
                    $('.scrollTo').fadeIn();
                } else {
                    $('.scrollTo').fadeOut();
                }
            });

            var vid = document.getElementById("playVideo");
            vid.pause();
            $('.play-toggle').on('click', function() {
                vid.play();
                $('.video-preview-wrapper,.play-toggle').hide();
            });
            vid.addEventListener('pause', (event) => {
                vid.pause();
                $('.video-preview-wrapper,.play-toggle').show();
            });
        });
    </script>

</body>

</html>