@extends('layouts.app-site')
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
@if($brand->brand_settings->section2_m2)
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
                            <a  href="{{$value->btn_link}}" target="_blank"><button class="main_btn btn_red mt-3" data-aos-easing="linear" data-aos="fade-right"
                                    data-aos-duration="1400">{{$value->btn_text}}
                                M4000</button>
                            </a>
                            @endif
                            <div class="m2Communicator__img" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1500">
                                <img src="{{ asset('storage/'.$value->right_product_image1) }}" />
                                <img src="{{ asset('storage/'.$value->right_product_image2) }}" />
                                <img src="{{ asset('storage/'.$value->right_product_image3) }}" />
                                <img src="{{ asset('storage/'.$value->right_product_image4) }}" />
                            </div>
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
@if($brand->brand_settings->section5_m2)
@if($brand->section5)
<div class="scrollEffect">
    <section class="sectionGlassWhite position-relative" data-aos-easing="linear" data-aos="fade-up"
             data-aos-duration="1500">
        <div class="m2GlassText">
            <div class="sec2_right">
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
    </section>
</div>
@endif
@endif
@if($brand->brand_settings->section6_m2)
    @if($brand->section6)
<div class="scrollEffect">
    <div class="parallaxThree focus" style="background: url('{{ asset('storage/'.$brand->banner_section->fullwidth_banner1_fixed) }}');
    height: 100vh;
    width: 100vw;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;">
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

@if(isset($brand->banner_section))
    <section class="sectionFour">
    <div class="container-fluid">
    @if(isset($brand->banner_section->fullwidth_banner1_fixed))
    <div class="row">
    <div style="
    background-image: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_fixed) }} );
    height: 64vh;
    width: 100%;
    background-repeat: no-repeat;
    background-size: contain;
    background-attachment: fixed;
    "></div>
    </div>
    @endif
    </div>
    </section>
@endif
@if($brand->brand_settings->title_description_with_accordian_section)
<div class="container-fluid" id="about" style="overflow:hidden">
<div class="row aaa">
<div class="cover-container d-flex w-100 p-3 mx-auto flex-column bannertop">
@if($brand->button_accordian_section)
<div class="insidecontainermiddlepage">
<div class="row">
<div class="offset-sm-1 col-sm-5 col-xs-12">
    <h3>{{$brand->button_accordian_section->title}}</h3>
    {!! $brand->button_accordian_section->description !!}
    <button class="main_btn btn_blue mt-3">Read More</button>
</div>
<div class="col-sm-5  col-xs-12 text-center">
    <div class="fleximgblock wow fadeInRight">
        <img src="{{ asset('storage/'.$brand->button_accordian_section->image) }}">
    </div>
</div>

</div>
</div>
@endif
</div>
</div>
</div>
@endif

<section class="sectionSeven " data-aos="fade-up" data-aos-duration="1500">
<div class="container">

</div>
</section>
@if(isset($brand->banner_section))
<section class="sectionFour">
<div class="container-fluid">
@if(isset($brand->banner_section->fullwidth_banner2_fixed))
<div class="row">
<div style="
    background: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner2_fixed) }} );
    height: 59vh;
    width: 100vw;
    background-repeat: no-repeat;
    background-size: contain;
    background-attachment: fixed;
    background-position: center;
    "></div>
</div>
@endif
</div>
</section>
@endif
@if($brand->brand_settings->news_blogs_section)
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

@if(isset($brand->banner_section))
<section class="sectionFour">
<div class="container-fluid">
@if(isset($brand->banner_section->fullwidth_banner1_unfixed))
<div class="row">
<div style="
    background-image: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_unfixed) }} );
    height: 64vh;
    width: 100%;
    background-repeat: no-repeat;
    background-size: contain;
    background-attachment: fixed;
    "></div>
</div>
@endif
</div>
</section>
@endif
@endif
@endsection
@push('scripts')
<script src="{{ asset('js/site/main.js')}}"></script>
@endpush