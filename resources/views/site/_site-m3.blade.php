@extends('layouts.app-site')
@section('content')
@push('css_scripts')
<link href="{{ asset('css/client/m3.css') }}" rel="stylesheet" type="text/css" />
@endpush
<section class="parralaxSection"></section>
@if(isset($brand->brand_settings))
@if($brand->brand_settings->slider_section_m3)
    <div class="scrollEffect">
    <section class="bannerSectionM2">
    <div class="container-fluid">
        @if(($brand->slider_section->count()))
        <div class="row">

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($brand->slider_section as $value)
                    @if($value->mime_type == 'video')
                    <div class="swiper-slide" data-slide-type="vdo">
                        <video id="my-player" loop="true" autoplay="autoplay" muted>
                            <source src="{{ asset('storage/'.$value->file_path) }}" type="video/mp4">
                            </source>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">
                                    supports HTML5 video
                                </a>
                            </p>
                        </video>
                    </div>
                    @else
                    <div class="swiper-slide" data-slide-type="img">
                        <img src="{{ asset('storage/'.$value->file_path) }}" />
                        <p style="background: url({{ asset('images/site/transformer.png') }}) repeat;" class="slider-cont fs_obj">
                            <strong style="font-size: 13.8817px;
                     line-height: 100%; ">{{$value->title}}</strong>
                        </p>
                    </div>
                    @endif
                    @endforeach


                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next" style="background: url('/images/site/prev_next.png') -45px -45px no-repeat transparent;"></div>
                <div class="swiper-button-prev" style="background: url('/images/site/prev_next.png') 0px -45px no-repeat transparent;"></div>
            </div>
        </div>
        @endif
    </div>
</section>
    </div>
@endif
@if($brand->brand_settings->section2_m3)
    @if($brand->section2)
    <div class="scrollEffect">
        <section class="m2NewsSection">
            <div class="newsSection mt-5 pt-5">

                <div class="container text-center">
                    <h5 class="text-uppercase" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">{{$brand->section2->heading}}</h5>
                    <div data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1200">
                        {!! $brand->section2->description  !!}</h5>
</div>
</div>
<div class="col" data-aos-easing="linear" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
@if($brand->section2->btn_show)
<div class="mt-4 mb-2 text-center">
    <a target="_blank"   href="{{$brand->section2->btn_link}}"><button class="main_btn btn_blue" >{{$brand->section2->btn_text}}</button></a>
</div>
@endif
</div>
</div>
</section>
</div>
@endif
@endif
@if($brand->brand_settings->product_section_m3)
    @if($brand->product_m3)
        <div>
            <div class="container-fluid">
                <div class="row products">
                    @foreach($brand->product_m3 as $value)
                     @if($value->single_image)
                    <div class="hovereffect col-sm-12  p-0">
                        <img src="{{ asset('storage/'.$value->image1) }}" alt="" class="img-fluid mx-auto d-block"
                             style="min-width:200px">
                        <div class="overlay">
                            <div class="mozaOverlayText text-left">
                                <div class="mozText">
                                    <p>{!! $value->description !!}</p>
                                </div>
                                @if($value->btn_show)
                                <div class="mozBtn">
                                    <a href="{{$value->btn_link}}" target="_blank" class="info">{{$value->btn_text}}</a>
                                </div>
                                 @endif
                            </div>
                        </div>
                    </div>
                     @else
                    <div class="hovereffect  col-sm-6  p-0">
                        <img src="{{ asset('storage/'.$value->image1) }}" alt="" class="img-fluid mx-auto d-block"
                             style="min-width:200px">
                        <div class="overlay">
                            <div class="mozaOverlayText text-left">
                                <div class="mozText">
                                    {!! $value->description !!}
                                </div>
                                @if($value->btn_show)
                                    <div class="mozBtn">
                                        <a href="{{$value->btn_link}}" target="_blank" class="info">{{$value->btn_text}}</a>
                                    </div>
                                 @endif
                            </div>
                        </div>
                    </div>
                    <div class="hovereffect  col-sm-6  p-0">
                        <img src="{{ asset('storage/'.$value->image2) }}" alt="" class="img-fluid mx-auto d-block"
                             style="min-width:200px">
                        <div class="overlay">
                            <div class="mozaOverlayText text-left">
                                <div class="mozText">
                                    {!! $value->description !!}
                                </div>
                                @if($value->btn_show)
                                    <div class="mozBtn">
                                        <a href="{{$value->btn_link}}" target="_blank" class="info">{{$value->btn_text}}</a>
                                    </div>
                                 @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
   @endif

@if($brand->brand_settings->bg_description_m3)

       <div class="page-obsbot-meet page-obsbot-cv1 meet-common-text" data-v-153fe206="">
           <div class="bg-transition gray-bg black-bg" data-v-153fe206="">
               <div id="intelligent_framing" class="section-screen-text-wrapper section-screen-text-wrapper--dark-flow"
                    data-v-6fd0f91b="" data-v-153fe206="">
                   @if($brand->bg_description_m3)
                   <div class="bg-area-osbot" data-v-6fd0f91b="">
                       <div style="background-image: url({{ asset('storage/'.$brand->bg_description_m3->bg_image) }}) !important;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    background-position: 39%;"
                            class="section-screen-text backgroundApplyKid height-100vh h-100vh" >

                           <div class="darker-bg" data-v-6fd0f91b=""></div>
                           <div class="container w1200" data-v-6fd0f91b="" data-aos-easing="linear" data-aos="fade-up"
                                data-aos-duration="1000">
                               <h2 class="hero-title common-text--h1 __sfx-fade-in-up">{{$brand->bg_description_m3->heading}}</h2>
                               <p class="hero-subtitle common-text--para __sfx-fade-in-up" data-v-6fd0f91b="" data-aos-easing="linear"
                                  data-aos="fade-up" data-aos-duration="1500">
                                   {!! $brand->bg_description_m3->description  !!}
                               </p>
                           </div>
                       </div>
                       <div class="dark-flow-up" data-v-6fd0f91b="">
                           <div class="dark-flow-up__transparent" data-v-6fd0f91b=""></div>
                           <div class="dark-flow-up__dark" data-v-6fd0f91b=""></div>
                       </div>
                   </div>
                   @endif

                       @if($brand->brand_settings->slider2_m3)
                   <section style="background-color: #000">
                       <div class="scroll-slider">
                           <div class="scroll-wrapper">
                               @if(isset($brand->slider2[0]))
                                   @foreach($brand->slider2 as $value)
                               <article class="item scroll-slide">
                                   <div class="scroll-line"></div>
                                   <div class="thumbContainer">
                                       {!! $value->left_description !!}
                                       {!! $value->right_description !!}
                                       @if($value->mime_type == 'video')
                                       <video
                                           src="{{ asset('storage/'.$value->image) }}"
                                           poster="https://staticmedia.remo-ai.com/4f65c2634fa4422988fd6260cb21406e/snapshots/242dcd6b286845eb99a7d4110192d9d6-00001.jpg"
                                           autoplay="autoplay" loop="loop" x5-playsinline="" playsinline="" webkit-playsinline=""
                                           preload="preload" muted="muted" class="b-lazy inner-video b-loaded" data-v-4a279559=""
                                           data-v-f9b1cc82=""></video>
                                       @else
                                           <img src="{{ asset('storage/'.$value->image) }}" />
                                       @endif
                                   </div>
                               </article>
                                   @endforeach
                               @endif
                           </div>
                       </div>
                   </section>
                     @endif
               </div>
               @if($brand->brand_settings->product_description_m3)
                @if($brand->product_description)
               <div class="section-dual-omni height-100vh" data-v-800533da="" data-v-153fe206="">
                   <div class="container w1200 layout-lr" data-v-800533da="">
                       <div class="layout-lr__left" data-v-800533da="" data-aos-easing="linear" data-aos="fade-right"
                            data-aos-duration="1000" data-aos-delay="2000">
                           <div
                              style="background-image: url({{ asset('storage/'.$brand->product_description->background_image) }}) !important;
                                    background-repeat: no-repeat;"
                              data-ratio="0.65" class="auto-ratio-box section-dual-omniBG" data-v-f9b1cc82="" data-v-800533da=""
                                lazy="loaded">
                               <div class="__height-box" style="padding-bottom:65.00%;" data-v-f9b1cc82=""></div>
                               <div class="__box-content" data-v-f9b1cc82=""></div>
                           </div>
                       </div>
                       <div class="layout-lr__right" data-v-800533da="" data-aos-easing="linear" data-aos="fade-left"
                            data-aos-duration="1000" data-aos-delay="2000">
                          {!! $brand->product_description->description1 !!}
                       </div>
                   </div>
               </div>
               <div class="bg-area-osbot h-100vh" data-v-6fd0f91b="">
                   <div class="container w1200 pb-5" data-v-c678f1c0="">
                       <div class="section-text-image w1200" data-v-e1b6eaaa="" data-v-c678f1c0="">
                           <div class="section-content" data-v-e1b6eaaa="">
                               <!---->
                               <div class="main-text-wrap main-text-wrap--layout-lr" data-v-e1b6eaaa="">
                                   {!! $brand->product_description->description2 !!}
                                   {!! $brand->product_description->description3 !!}
                               </div>
                               <div data-ratio="0.5" class="auto-ratio-box media-box" data-v-f9b1cc82="" data-v-4ebf90a4=""
                                    data-v-e1b6eaaa="" lazy="loaded" class="cpu">
                                   <div class="__height-box" style="padding-bottom:50.00%;" data-v-f9b1cc82=""></div>
                                   <div class="__box-content" data-v-f9b1cc82="">
                                       <div class="bg-layer" data-v-f9b1cc82="" data-v-4ebf90a4="" data-aos="fade-up"
                                            data-aos-duration="2000" data-aos-easing="linear" data-aos-delay="2000">
                                           <img src="{{ asset('storage/'.$brand->product_description->image) }}" class="img-fluid" />
                                       </div>
                                   </div>
                               </div>
                               <!---->
                           </div>
                       </div>
                   </div>
                   <!---->
               </div>
                @endif
               @endif
           </div>
       </div>

@endif

@if($brand->brand_settings->fullwidth_video_section_m3)
    @if(!empty($brand->banner_section))
        <section data-layer="main-video"
                 class="bg-white position-relative section-screen-text-wrapper section-screen-text-wrapper--dark-flow sticky-section">
            <div class="section-screen-text">
                <div class="container w1200">
                    <div class="videoText">
                       {!! $brand->banner_section->video_description !!}
                        <div class="videoIconM3 mt-1" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">
                            <svg width="80" height="80" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 4.5C13.2478 4.5 4.5 13.2478 4.5 24C4.5 34.7522 13.2478 43.5 24 43.5C34.7522 43.5 43.5 34.7522 43.5 24C43.5 13.2478 34.7522 4.5 24 4.5ZM18.75 32.25V15.75L32.25 24L18.75 32.25Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="shopify-section-main-video" class="shopify-section beforeNone">
                    <div class="video-player bg-black" data-section-id="main-video" data-section-type="banner">
                        <video class="video-js" autoplay="autoplay" loop="loop" playsinline="" id="playVideoM3" controls
                               poster="./dist/assets/img/poster.JPG">
                            <source src="{{ asset('storage/'.$brand->banner_section->fullwidth_video) }}" type="video/mp4" id="main-video">
                        </video>


                    </div>
                </div>
            </div>
    </section>
    @endif
@endif
@if($brand->brand_settings->accordian_section_m3)
    @if($brand->button_accordian_section)
        <div class="cover-container">
            <div class="" id="about" style="overflow:hidden;padding:0px 150px ">
                <div class="row aaa">
                    <div class="d-flex w-100 p-3 mx-auto flex-column bannertop">
                        <div class="insidecontainermiddlepage">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="offset-sm-1 col-sm-5 col-xs-12">
                                    <h3 data-aos-easing="linear" data-aos="fade-right" data-aos-delay="500">
                                        {{$brand->button_accordian_section->title}}</h3>
                                    <p data-aos-easing="linear" data-aos="fade-right" data-aos-duration="700">
                                        {!! $brand->button_accordian_section->description !!}</p>
                                    @if($brand->button_accordian_section->show_button)
                                        <button class="main_btn btn_blue mt-3 " data-aos-easing="linear" data-aos="fade-right"
                                                data-aos-duration="800">Read More</button>
                                    @endif
                                </div>
                                <div class="col-sm-5  col-xs-12 text-center">
                                    <div class="fleximgblock">
                                        <img src="{{ asset('storage/'.$brand->button_accordian_section->image) }}" data-aos-easing="linear" data-aos="fade-left"
                                             data-aos-delay="1000" style="width: 249px;height: 249px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endif
@if($brand->brand_settings->fullwidth_image_section1_m3)
    @if(isset($brand->banner_section->fullwidth_banner1_fixed))
        <div class="">
            <div class="parallaxThree focus">
                <section style="
                    background: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_fixed) }} );
                    width: 100%;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-attachment: fixed;
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 700px;
                    background-position: center top;" class="sectionGlassBlack position-relative">
                    @if($brand->section6)
                    <div  class="m2GlassText" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">
                        <div class="sec2_right">
                            <h2 class="head_underline left mb-1 pb-1 text-white">{{$brand->section6->heading}}</h2>
                            {!! $brand->section6->description !!}
                        </div>
                    </div>
                     @endif
                </section>
            </div>
        </div>
@endif
@endif
@if($brand->brand_settings->article_section_m3)
    @if(isset($brand->article_section[0]))
        <div class="scrollEffect">
            <div class="blog-archive h-100vh">
                <div class="ba-hero">
                    <header class="section-header text-center" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title">News and recent articles</h2>
                        <p class="subline">e-mark &amp; e-mark create</p>
                    </header>

                </div>
                <div class="ba-content masonry" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="2000">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($brand->article_section as $key => $value)
                                <div class="col-lg-3 col-sm-3 col-12">
                                    <article class="ba-item pa-item">
                                        <div class="ba-item-link" target="_blank">
                                            <h1 class="ba-item-title">{{$value->heading}}</h1>
                                            <img src="{{ asset('storage/'.$value->image) }}" class="w-100" />
                                            @if($value->btn_show)
                                                <div class="ba-item-button-container pa-item-button-container">
                                                    <span class="button light"><a href="{{$value->btn_link}}" target="_blank" class="text-white">{{$value->btn_text}}</a></span>
                                                </div>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @endforeach



                        </div>
                        <div class="row">
                            <div class="col-12 mx-auto text-center">
                                <div class="mb-4">
                                    <button class="main_btn btn_blue">Show More</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif
@endif

@if($brand->brand_settings->fullwidth_image_section2_m3)
    <section class="sectionFour">
        <div class="container-fluid">
            @if(isset($brand->banner_section->fullwidth_banner2_fixed))
                <div class="row">
                    <div style="
                        background: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner2_fixed) }} );
                        height: 100vh;
                        width: 100vw;
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-attachment: fixed;
                        background-position: center;
                        "></div>
                </div>
            @endif
        </div>
    </section>
@endif

@if($brand->brand_settings->news_blogs_section_m3)
    @if(isset($brand->news_section[0]))
        <section class="newsSection spacing">
            <section class="sec_2">
                <div class="container-fluid text-center">
                    <div class="main_head" data-aos="fade-up" data-aos-delay="500" data-aos-duration="500">
                        <h2 class="head_underline">News and Blogs</h2>

                    </div>
                    <div class="s2_bot">
                        <div class="row">
                            @foreach($brand->news_section as $key => $value)
                                <div class="col-md-3" data-aos-easing="linear" data-aos="fade-up" data-aos-delay="600"
                                     data-aos-duration="600">
                                    <div class="s2_img">
                                        <div class="news-overlay">&nbsp;</div>
                                        <a href="{{route('mysite.news.index',['brand' => $brand->slug,'design' => $brand->brand_design_id,'id' => $value->id])}}">  <img class="box-image" src="{{ asset('storage/'.$value->image) }}" alt=""></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                            <div class="mt-4 mb-2">
                                <!--                        <button class="main_btn btn_blue">Show Older</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    @endif
@endif

@endif
@endsection
@push('scripts')

<script src="{{ asset('js/site/TweenMax.min.js')}}"></script>
<script src="{{ asset('js/site/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('js/site/animation.gsap.js')}}"></script>
<script >
    $(document).ready(function () {
        var vidm3 = document.getElementById("playVideoM3");
        if(typeof(vid) != 'undefined' && vid != null) {
            vidm3.pause();
            $('.videoIconM3').on('click', function () {
                vidm3.play();
                $('.videoIconM3').hide();
            });
            vidm3.addEventListener('pause', (event) => {
                vidm3.pause();
                $('.videoIconM3').show();
            });
        }
        AOS.init();
        var VIDEO_PLAYING_STATE = {
            "PLAYING": "PLAYING",
            "PAUSE": true
            , controls: true
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
        player.on('ended', function () {
            next()
        })
        // swiper object
        swiper.on('slideChangeTransitionEnd', function () {
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

    });

 !(function ($) {

        'use strict';

        var $slider = $('.scroll-slider'),
            $slides = $('.scroll-slide'),
            $sliderWrapper = $('.scroll-wrapper'),
            $firstSlide = $slides.first();

        var settings = {},
            resizing = false,
            scrollController = null,
            scrollTween = null,
            scrollTimeline = null,
            progress = 0,
            scrollScene = null;

        function scrollSlider(options) {

            // Default
            settings = $.extend({
                slider: '.scroll-slider',
                sliderWrapper: '.scroll-wrapper',
                slides: '.scroll-slide',
                slideWidth: null,
                slideHeight: null,
            }, options);

            // Set dimensions
            setDimensions();

            // On resize
            $(window).on('resize', function () {
                clearTimeout(resizing);
                resizing = setTimeout(function () {
                    setDimensions();
                }, 250);
            });

        }

        function setDimensions() {

            settings.slideWidth = $firstSlide.width();
            settings.slideHeight = $firstSlide.height();

            console.log(settings.slideWidth);
            console.log(settings.slideHeight);

            // Calculate slider width and height
            settings.sliderWidth = Math.ceil((settings.slideWidth * $slides.length));
            settings.sliderHeight = $firstSlide.outerHeight(true);

            // Set slider width and height
            $sliderWrapper.width(settings.sliderWidth);
            //$sliderWrapper.height(settings.sliderHeight);

            // Set scene
            setScene();

            //resizing = false;
        }

        function setScene() {

            var xDist = -$slides.width() * ($slides.length - 1),
                tlParams = { x: xDist, ease: Power2.easeInOut };
            console.log('d', xDist)
            if (scrollScene != null && scrollTimeline != null) {

                progress = 0;
                scrollScene.progress(progress);

                scrollTimeline = new TimelineMax();
                scrollTimeline.to($sliderWrapper, 1, tlParams);

                scrollScene.setTween(scrollTimeline);

                scrollScene.refresh();

            } else {
                // Init ScrollMagic controller
                scrollController = new ScrollMagic.Controller();

                //Create Tween
                scrollTimeline = new TimelineMax();
                scrollTimeline.to($sliderWrapper, 1, tlParams);
                scrollTimeline.progress(progress);

                // Create scene to pin and link animation
                scrollScene = new ScrollMagic.Scene({
                    triggerElement: settings.slider,
                    triggerHook: "onLeave",
                    duration: settings.sliderWidth
                })
                    .setPin(settings.slider)
                    .setTween(scrollTimeline)
                    .addTo(scrollController)
                    .on('start', function (event) {
                        scrollTimeline.time(100);
                    });
            }

        }

        $(document).ready(function () {
            scrollSlider();
        });

    })(jQuery);

</script>

@endpush
