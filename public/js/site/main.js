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
        items: 4,
        nav: true,
        navText: ['<div class="swiper-button-prev" style="background: url(\'/images/site/prev_next.png\') 0px -45px no-repeat transparent;" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>', '<div class="swiper-button-next" style="background: url(\'/images/site/prev_next.png\') -45px -45px no-repeat transparent;" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>'],
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



    $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 1200) {
            $('.scrollTo').fadeIn();
        } else {
            $('.scrollTo').fadeOut();
        }
    });

    var vid = document.getElementById("playVideo");
    if(typeof(vid) != 'undefined' && vid != null) {
        vid.pause();
        $('.play-toggle').on('click', function () {
            vid.play();
            $('.video-preview-wrapper,.play-toggle').hide();
        });
        vid.addEventListener('pause', (event) => {
            vid.pause();
            $('.video-preview-wrapper,.play-toggle').show();
        });
    }
    AOS.init({
        easing: 'ease-out-back',
        duration: 1000
    });
});
