@extends('layouts.app-site')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

@section('content')

<section class="parralaxSection"></section>

@if(isset($brand->brand_settings))

@if($brand->brand_settings->slider_section_m2)

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

                            <div class="container-fluid text-right">

                                <h5 class="text-uppercase">{{$value->title}}

                                </h5>

                                <div><small class="text-uppercase mt-5 mb-5">{{$value->description}}</small></div>

                            </div>

                        </div>

                    </div>

                    @else

                    <div class="swiper-slide" data-slide-type="img"><img src="{{ asset('storage/'.$value->file_path) }}" />

                        <div class="m2BannerText">

                            <div class="container-fluid text-right">

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

                <div class="swiper-button-next" style="background: url('/images/site/prev_next.png') -45px -45px no-repeat transparent;"></div>

                <div class="swiper-button-prev" style="background: url('/images/site/prev_next.png') 0px -45px no-repeat transparent;"></div>

            </div>

        </div>

        @endif

    </div>

</section>

    </div>

@endif

@if($brand->brand_settings->section2_m2)

    @if($brand->section2)

    <div class="scrollEffect">

        <section class="m2NewsSection">

            <div class="newsSection mt-5 pt-5">



                <div class="container text-center">

                <div data-aos="fade-up" data-aos-duration="2000" class="col aos-init">

                    <img src="{{ asset('images/m2-2-logo.png') }}" class="img-fluid" style="width: 565px; height: auto;">

                </div>
                    <h5 class="text-uppercase" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000" style="padding-top: 67px;">{{$brand->section2->heading}}</h5>

                        {!! $brand->section2->description  !!}</h5>

                    </div>

<div class="col" data-aos-easing="linear" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">

@if($brand->section2->btn_show)

<div class="mt-4 mb-2 text-center">

    <a class="main_btn btn_blue" target="_blank"   href="{{$brand->section2->btn_link}}">{{$brand->section2->btn_text}}</a>

</div>

@endif

</div>

</div>

</section>

</div>

@endif

@endif

@if($brand->brand_settings->product_section_m2)

    @if($brand->product_m2)

    @foreach($brand->product_m2 as $value)

    <div class="scrollEffect">

        <section class="m2CommunicatorOne" style="    height: 100vh;

    width: 100%;

    background: url('{{ asset('storage/'.$value->background_image) }}');

    background-repeat: no-repeat;

    background-size: cover;

    box-shadow: 1px 2px 3px 36px #000;

    /* margin-top: 60px;">

            <div class="container-fluid px-0">

                <div class="row">

                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">

                        <div class="greyLeft ">

                            {!! $value->left_description !!}

                            <div class="img-container w-100" data-aos-easing="linear" data-aos="fade-left" data-aos-duration="1500">

                                <img src="{{ asset('storage/'.$value->left_product_image) }}" class="img-fluid">

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 text-left">

                        <div class="greyRight">

                            {!! $value->right_description !!}

                            @if($value->btn_show)

                             <a href="{{ $brand->product_design->slug === 'p1' ? '/product-details/p1' : ($brand->product_design->slug === 'p2' ? '/product-details/p2' : ($brand->product_design->slug === 'p3' ? '/product-details/p3' : $value->btn_link)) }}" target="_blank">
                                <button class="main_btn btn_red mt-3" data-aos-easing="linear" data-aos="fade-right"

                                    data-aos-duration="1400">{{$value->btn_text}}

                                </button>

                            </a>

                            @endif

                            @if(isset($value->right_product_image1) || isset($value->right_product_image2) || isset($value->right_product_image3) || isset($value->right_product_image4))
                            <div class="m2Communicator__img" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1500">
                                @if(isset($value->right_product_image1))
                                    <img src="{{ asset('storage/'.$value->right_product_image1) }}" />
                                @endif

                                @if(isset($value->right_product_image2))
                                    <img src="{{ asset('storage/'.$value->right_product_image2) }}" />
                                @endif

                                @if(isset($value->right_product_image3))
                                    <img src="{{ asset('storage/'.$value->right_product_image3) }}" />
                                @endif

                                @if(isset($value->right_product_image4))
                                    <img src="{{ asset('storage/'.$value->right_product_image4) }}" />
                                @endif
                            </div>
                        @endif


                        </div>

                    </div>

                </div>



            </div>

        </section>

    </div>

    @endforeach

    @endif

   @endif

@if($brand->brand_settings->fullwidth_video_section_m2)

    @if(!empty($brand->banner_section))

    <div class="scrollEffect">

    <section data-layer="main-video" class="bg-white">



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

    </section>

    </div>

    @endif

@endif

@if($brand->brand_settings->section5_m2)

@if($brand->section5)

<div class="scrollEffect">

    <section class="sectionGlassWhite position-relative" data-aos-easing="linear" data-aos="fade-up"

             data-aos-duration="1500" style="height: 100vh;">

        <div class="m2GlassText" style="height: 10vh;">

            <div class="sec2_right aos-init aos-animate" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">

                <h2 class="head_underline left mb-1 pb-1">{{$brand->section5->heading}}</h2>

                {!! $brand->section5->description !!}

            </div>

        </div>

        <div class="container-fluid">

            <img src="{{ asset('storage/'.$brand->section5->image) }}" class="m2GlassPosition">

            @if($brand->section5->btn_show)

            <div class="col">

                <div class="mt-4 mb-2 text-center">



                    <a href="{{$brand->section5->btn_link}}" target="_blank"><button class="main_btn btn_blue">{{$brand->section5->btn_text}}</button></a>

                </div>

            </div>

             @endif

        </div>

        <div class="extender-wrapper aos-init aos-animate" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">
            <div class="button-wrapper">
                <p>
                    <a class="m2togg-btn" data-bs-toggle="collapse" href="#m2accessories-toggle" role="button" aria-expanded="false" aria-controls="m2accessories-toggle">
                    TECHNICAL SPECIFICATIONS <i class="fa fa-plus me-2"></i>
                    </a>
                </p>
            </div>
            <div class="collapse" id="m2accessories-toggle">
                <div class="card card-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
            </div>
        </div>

    </section>

</div>

@endif

@endif

@if($brand->brand_settings->section6_m2)

    @if($brand->section6)

<div class="scrollEffect">

    <div class="parallaxThree focus" style="background-image: url('{{ asset('storage/'.$brand->banner_section->fullwidth_banner1_fixed) }}');

    width: 100%;

    background-repeat: round;

    background-position: center top;

    background-attachment: fixed;

    background-size: cover;

    height: 100vh;">

        <section class="sectionGlassBlack position-relative">

            <div class="m2GlassText" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">

                <div class="sec2_right">

                    <h2 class="head_underline left mb-1 pb-1 text-white">{{$brand->section6->heading}}</h2>

                    {!! $brand->section6->description !!}

                </div>

            </div>

        </section>

    </div>

</div>

@endif

@endif



@if($brand->brand_settings->accordian_section_m2)

    @if($brand->button_accordian_section)
    <div class="scrollEffect">
        <div class="cover-container">

            <div class="" id="about" style="overflow:hidden;padding:0px 150px;width:95%;">

                <div class="row">

                    <div class="d-flex w-100 p-3 mx-auto flex-column bannertop">

                        <div class="insidecontainermiddlepage">

                            <div class="d-flex">

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

                                             data-aos-delay="1000" style="width: 270px !important;height: 270px !important;">

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



@if($brand->brand_settings->fullwidth_image_section2_m2)
<div class="scrollEffect">
    <section class="sectionFour">

        <div class="container-fluid">

            @if(isset($brand->banner_section->fullwidth_banner2_fixed))

                <div class="row">

                    <div style="

                        background-image: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner2_fixed) }} );

                        width: 100%;

                        background-repeat: round;

                        background-position: center top;

                        background-attachment: fixed;

                        background-size: cover;

                        height: 100vh;

                        "></div>

                </div>

            @endif

        </div>

    </section>
</div>

@endif



@if($brand->brand_settings->news_blogs_section_m2)

    @if(isset($brand->news_section[0]))
    <div class="scrollEffect">
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
    </div>
    @endif

@endif

@if(isset($brand->banner_section) && $brand->brand_settings->fullwidth_image_section3_m2)
<div class="scrollEffect">
    <section class="sectionFour">

        <div class="container-fluid">

            @if(isset($brand->banner_section->fullwidth_banner1_unfixed))

                <div class="row">

                    <div style="

                        background-image: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_unfixed) }} );

                        width: 100%;

                        background-repeat: round;

                        background-position: center top;

                        background-attachment: fixed;

                        background-size: cover;

                        height: 100vh;

                        "></div>

                </div>

            @endif

        </div>

    </section>
</div>

@endif

@if($brand->brand_settings->article_section_m2)

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

                <div class="row m2-last">

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

                    <!-- <div class="col-12 mx-auto text-center">

                        <div class="mb-4">

                            <button class="main_btn btn_blue">Show More</button>

                        </div>

                    </div> -->

                    <div class="extender-wrapper">
                        <div class="button-wrapper">
                            <p>
                                <a class="m2togg-btn" data-bs-toggle="collapse" href="#m2accessories-toggle" role="button" aria-expanded="false" aria-controls="m2accessories-toggle">
                                TECHNICAL SPECIFICATIONS <i class="fa fa-plus me-2"></i>
                                </a>
                            </p>
                        </div>
                        <div class="collapse" id="m2accessories-toggle">
                            <div class="card card-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
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





@endif

@endsection


@push('scripts')

<script src="{{ asset('js/site/main.js?version=1.1')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>

@endpush

