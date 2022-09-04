@extends('layouts.app-site')
@section('content')
<section class="parralaxSection"></section>
@if(isset($brand->brand_settings))
@if($brand->brand_settings->banner_slider_section)
<section class="bannerSection">
    <div class="container-fluid">
        @if(($brand->slider_section->count()))
        <div class="row">
            <a class="book" href="{{route('mysite.flipbook.index',['brand' => $brand->slug,'design' => $brand->brand_design_id])}}"></a>
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
                        <div class="setTextPosition">
                            <p class="captionh2" style="color:{{$value->colour}}">{{$value->title}}</p>
                            <p class="captiondesc" style="color:{{$value->colour}}">{{$value->description}}</p>
                        </div>
                    </div>
                    @else
                    <div class="swiper-slide" data-slide-type="img"><img src="{{ asset('storage/'.$value->file_path) }}" />

                        <div class="setTextPosition">
                            <p class="captionh2" style="color:{{$value->colour}}">{{$value->title}}</p>
                            <p class="captiondesc" style="color:{{$value->colour}}">{{$value->description}}</p>
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
@endif
@if($brand->brand_settings->icon_section)
<section class="productCarousel mt-10 mb-10 pt-5 pb-5">
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center howToGap">
            @if($brand->icon_section)
            @foreach($brand->icon_section as $value)
            <div data-aos-easing="linear" data-aos="fade-up" data-aos-delay="200">
                <div class="item_s4">
                    <div class="hover-detail overlay"></div>
                    <div class="sec3_bot ">
                        <div class="sec3_box ">
                            <a href="{{route('mysite.icon.index',['brand' => $brand->slug,'design' => $brand->brand_design_id,'id' => $value->id])}}"> <img src="{{ asset('storage/'.$value->file_path) }}" alt=""></a>
                            <h3 class="head_underline_small">{{$value->title}}</h3>
                            <span class="underline_head"></span>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

</section>
@endif
@if($brand->brand_settings->product_section)
<section class="productSection mt-5" data-aos="fade-up" data-aos-duration="2500">
    @if($brand->product_section)
    <div id="owl-carousel2" class="owl-carousel">
        @foreach($brand->product_section as $value)
        <div class="item">
            <div class="item_s4"> <img src="{{ asset('storage/'.$value->product_image) }}" alt="">
                <div class="product-detail overlay">
                    <div class="product-title">{{$value->title}}</div>
                </div>
                <div class="product-logo"><img src="{{ asset('storage/'.$value->product_logo) }}" alt=""></div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endif
@if($brand->brand_settings->logo_description_section)
<section class="ebarkSection mb-5">
    @if($brand->logo_title_section)
    <section>
        <div class="container text-center">
            <div class="row">
                <div class="col mb-5" data-aos="fade-up" data-aos-duration="2000">
                    <div class="emark-text">
                        <div class="text">{{$brand->logo_title_section->title1}}</div>
                        <img src="{{ asset('storage/'.$brand->logo_title_section->logo) }}" alt="ebark" style="width: 150px;">
                        <div class="text">{{$brand->logo_title_section->title2}}</div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2500">
                <div class="col">
                    <div class="sec2_right">
                        {!! $brand->logo_title_section->description !!}
                        <!--                        <h2 class="head_underline left mb-1">A New Level Of Document Security</h2>
                        <p>
                            The falsification of documents is easier than ever before.</p>
                        <p>Documents can be ordered illegally via the internet or simply forged on the basis of a suitable
                            template .</p>

                        <p>The damage to the economy and society is immense.</p>
                        <p>With the emark secure we provide a unique solution for forgery-proof protection and easy verification
                            of important physical and digital documents, fully mobile and useable everywhere.</p>-->

                        <div class="mt-4">
                            <a href="{{route('mysite.middle-banner.index',['brand' => $brand->slug,'design' => $brand->brand_design_id])}}"><button class="main_btn btn_blue">Read More</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</section>
@endif
@if($brand->brand_settings->logo_icon_and_description_with_boxes_section)
<section class="sectionThree" style="overflow:hidden">
    @if($brand->boxicon_section)
    <section class="sec_3" id="choose">
        <div class="container">
            <div class="sec3_bot">
                <div class="row">
                    @foreach($brand->boxicon_section as $key => $value)
                    @if($key == 0 || $key == 3)
                    <div class="col-lg-4 col-md-6 col-xs-12" data-aos-duration="1000" data-aos="fade-right">
                        @endif
                        @if($key == 1 || $key == 4)
                        <div class="col-lg-4 col-md-6 col-xs-12" data-aos-duration="1000" data-aos="fade-up">
                            @endif
                            @if($key == 2 || $key == 5)
                            <div class="col-lg-4 col-md-6 col-xs-12" data-aos-duration="1000" data-aos="fade-left">
                                @endif
                                <div class="sec3_box">
                                    <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                    <h3 class="head_underline_small">{{$value->title}}</h3>
                                    <span class="underline_head"></span>
                                    {!! $value->description !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</section>
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
@if(isset($brand->banner_section))
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
