@extends('layouts.app-site')
@section('content')
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
                        <div class="m2BannerText">
                            <div class="container text-center">
                                <h5 class="text-uppercase">{{$value->title}}
                                </h5>
                                <div><small class="text-uppercase mt-5 mb-5">{{$value->description}}</small></div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="swiper-slide" data-slide-type="img"><img src="{{ asset('storage/'.$value->file_path) }}" />
                    <div class="m2BannerText">
                        <div class="container text-center">
                            <h5 class="text-uppercase">{{$value->title}}
                            </h5>
                            <div><small class="text-uppercase mt-5 mb-5">{{$value->description}}</small></div>
                        </div>
                    </div>
                    </div>
                    @endif
                    @endforeach


                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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
                                       <div class="container w1200 mb-2" data-v-4c27d85c="">
                                           <div class="text-wrapper" data-v-4c27d85c="" data-aos-easing="linear" data-aos="fade-up"
                                                data-aos-duration="500">
                                               <div data-v-4c27d85c="">
                                                   {!! $value->left_description !!}
                                                   {!! $value->right_description !!}

                                               </div>

                                           </div>
                                       </div>
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
    <div class="scrollEffect">
    <section data-layer="main-video" class="bg-white">
        @if(isset($brand->banner_section->fullwidth_video))
            <div id="shopify-section-main-video" class="shopify-section">
                <div class="video-player bg-black" data-section-id="main-video" data-section-type="banner">
                    <video class="video-js" autoplay="" loop="" playsinline="" id="playVideo" controls>
                        <source src="{{ asset('storage/'.$brand->banner_section->fullwidth_video) }}" type="video/mp4" id="main-video">
                    </video>
                    <div class="video-preview-wrapper">
                        <!-- <img class="video-preview-overlay" src="//cdn.shopify.com/s/files/1/0065/3606/9223/t/5/assets/main-video-overlay.png?2453" alt=""> -->
                        <div class="video-preview-overlay"></div>

                        <video class="video-preview w-full" autoplay="" loop="" playsinline="" muted="">
                            <source src="{{ asset('storage/'.$brand->banner_section->fullwidth_video) }}" type="video/mp4">
                        </video>
                    </div>
                    <button class="play-toggle">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 4.5C13.2478 4.5 4.5 13.2478 4.5 24C4.5 34.7522 13.2478 43.5 24 43.5C34.7522 43.5 43.5 34.7522 43.5 24C43.5 13.2478 34.7522 4.5 24 4.5ZM18.75 32.25V15.75L32.25 24L18.75 32.25Z" fill="white"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </section>
    </div>
@endif
@if($brand->brand_settings->accordian_section_m3)
    @if($brand->button_accordian_section)
    <div class="scrollEffect">
        <div class="cover-container">
            <div class="container" id="about" style="overflow:hidden">
                <div class="row aaa">
                    <div class="d-flex w-100 p-3 mx-auto flex-column bannertop">
                        <div class="insidecontainermiddlepage">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <h3 data-aos-easing="linear" data-aos="fade-right" data-aos-delay="500">{{$brand->button_accordian_section->title}}</h3>
                                    <p data-aos-easing="linear" data-aos="fade-right" data-aos-duration="700">
                                        {!! $brand->button_accordian_section->description !!}
                                    </p>
                                   @if($brand->button_accordian_section->show_button)
                                    <button class="main_btn btn_blue mt-3" data-aos-easing="linear" data-aos="fade-right"
                                            data-aos-duration="800">Read
                                        More</button>
                                    @endif
                                </div>
                                <div class="col-sm-6  col-xs-12 text-right">
                                    <div class="fleximgblock">
                                        <img src="{{ asset('storage/'.$brand->button_accordian_section->image) }}" data-aos-easing="linear" data-aos="fade-left"
                                             data-aos-delay="1000">
                                    </div>
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
    <section class="sectionFour">
        <div class="container-fluid">
            @if(isset($brand->banner_section->fullwidth_banner1_fixed))
                <div class="row">
                    <div style="
                        background: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_fixed) }} );
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
<section class="newsSection spacing">
<section class="sec_2">
<div class="container-fluid text-center">
<div class="main_head" data-aos="fade-up" data-aos-delay="500" data-aos-duration="500">
<h2 class="head_underline">News and Blogs</h2>

</div>
<div class="s2_bot">
<div class="row">
@if($brand->news_section)
@foreach($brand->news_section as $key => $value)
<div class="col-md-3" data-aos-easing="linear" data-aos="fade-up" data-aos-delay="600"
     data-aos-duration="600">
    <div class="s2_box">
        <div class="s2_img">
            <a href="{{route('mysite.news.index',['brand' => $brand->slug,'design' => $brand->brand_design_id,'id' => $value->id])}}">  <img class="box-image" src="{{ asset('storage/'.$value->image) }}" alt=""></a>
        </div>
    </div>
</div>
@endforeach
@endif
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
@if($brand->brand_settings->article_section_m3)
@if($brand->article_section)
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
                            <a href="#" class="ba-item-link" target="_blank">
                                <h1 class="ba-item-title">{{$value->heading}}</h1>
                                <img src="{{ asset('storage/'.$value->image) }}" />
                                @if($value->btn_show)
                                <div class="ba-item-button-container pa-item-button-container">
                                    <span class="button light">{{$value->btn_text}}</span>
                                </div>
                                @endif
                            </a>
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


@endif
@endsection
@push('scripts')
<script src="{{ asset('js/site/main.js')}}"></script>
@endpush
