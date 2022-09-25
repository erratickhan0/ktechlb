@extends('layouts.app-site')
@section('content')
<section class="parralaxSection"></section>
@if(isset($brand->brand_settings))
@if($brand->brand_settings->banner_slider_section)
<section class="bannerSection">
    <div class="container-fluid">
        @if(($brand->slider_section->count()))
        <div class="row">
            <a style="    right: 10%;
    content: url({{asset('/images/book2.png')}});
    position: absolute;
    z-index: 3;
    bottom: -100px;
    width: 277px;
    transform: translate(-2%, -6%);
    transition: all 0.5s ease 0s;" class="book" href="{{route('mysite.flipbook.index',['brand' => $brand->slug,'design' => $brand->brand_design_id])}}"></a>
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
                <div class="swiper-button-next" style="background: url('/images/site/prev_next.png') -45px -45px no-repeat transparent;"></div>
                <div class="swiper-button-prev" style="background: url('/images/site/prev_next.png') 0px -45px no-repeat transparent;"></div>
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
<section class="productSection" >
    <div id="owl-carousel2" class="owl-carousel">
        @if($brand->product_section)
        @foreach($brand->product_section as $value)
        <div class="item">
            <div class="item_s4">  <img src="{{ asset('storage/'.$value->product_image) }}" alt="">
                <div class="product-detail overlay">
                    <div class="product-title">{{--{{$value->title}}--}}</div>
                </div>
                <div class="product-logo"><img src="{{ asset('storage/'.$value->product_logo) }}" alt=""></div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
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
@if(isset($brand->banner_section) && $brand->brand_settings->fullwidth_image_section1)
    <section class="sectionFour">
        <div class="container-fluid">
            @if(isset($brand->banner_section->fullwidth_banner1_fixed))
                <div class="row">
                    <div style="
                        background-image: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_fixed) }} );
                        width: 100%;
                        background-repeat: no-repeat;
                        background-position: center;
                        background-attachment: fixed;
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 700px;
                        background-position: center top;
                        "></div>
                </div>
            @endif
        </div>
    </section>
@endif
@if($brand->brand_settings->logo_icon_and_description_with_boxes_section)
<div class="newsSection-second engagementSection  updatedSectionPromotion h-100vh">
    <section class="sec_3 choose" id="choose">
        <div>
            <div>
                <div class="container">
                    <div class=" text-center">
                        @if(isset($brand->boxicon_section[0]))

                        <div class="d-flex justify-content-center align-items-center mb-2 gapNewsSectionSecond">
                            @foreach($brand->boxicon_section as $key => $value)
                            @if($key == 0)
                            <div class="" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1500">
                                <div class="EngagementActive">
                                    <div class="row">
                                        <div class="col-sm-12  mb-1">
                                            <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                        </div>
                                        <div class="col-sm-12">
                                            <h2 class="text-dark  mb-2">{{$value->title}}</h2>
                                            <p> {!! $value->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($key == 1)
                            <div class="" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1500">
                                <div class="EngagementActive">
                                    <div class="row">
                                        <div class="col-sm-12  mb-1">
                                            <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                        </div>
                                        <div class="col-sm-12">
                                            <h2 class="text-dark  mb-2">{{$value->title}}</h2>
                                            <p> {!! $value->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($key == 2)
                            <div class="" data-aos-easing="linear" data-aos="fade-left" data-aos-duration="1500">
                                <div class="EngagementActive">
                                    <div class="row">
                                        <div class="col-sm-12  mb-1">
                                            <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                        </div>
                                        <div class="col-sm-12">
                                            <h2 class="text-dark  mb-2">{{$value->title}}</h2>
                                            <p> {!! $value->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>
                            <div class="d-flex justify-content-center align-items-center mb-2 gapNewsSectionSecond">
                                @foreach($brand->boxicon_section as $key => $value)
                                    @if($key == 3)
                                        <div class="" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1500">
                                            <div class="EngagementActive">
                                                <div class="row">
                                                    <div class="col-sm-12  mb-1">
                                                        <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <h2 class="text-dark  mb-2">{{$value->title}}</h2>
                                                        <p> {!! $value->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($key == 4)
                                        <div class="" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1500">
                                            <div class="EngagementActive">
                                                <div class="row">
                                                    <div class="col-sm-12  mb-1">
                                                        <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <h2 class="text-dark  mb-2">{{$value->title}}</h2>
                                                        <p> {!! $value->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($key == 5)
                                        <div class="" data-aos-easing="linear" data-aos="fade-left" data-aos-duration="1500">
                                            <div class="EngagementActive">
                                                <div class="row">
                                                    <div class="col-sm-12  mb-1">
                                                        <img src="{{ asset('storage/'.$value->box_icon) }}" alt="">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <h2 class="text-dark  mb-2">{{$value->title}}</h2>
                                                        <p> {!! $value->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach


                            </div>
                         @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endif
@if(isset($brand->banner_section) && $brand->brand_settings->fullwidth_image_section2)
    <section class="sectionFour">
        <div class="container-fluid">
            @if(isset($brand->banner_section->fullwidth_banner2_fixed))
                <div class="row">
                    <div style="
                        background: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner2_fixed) }} );
                        width: 100%;
                        background-repeat: no-repeat;
                        background-position: center;
                        background-attachment: fixed;
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 700px;
                        background-position: center top;
                        "></div>
                </div>
            @endif
        </div>
    </section>
@endif
@if($brand->brand_settings->title_description_with_accordian_section)
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
@if(isset($brand->banner_section) && $brand->brand_settings->fullwidth_video_section)
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
@if(isset($brand->banner_section) && $brand->brand_settings->fullwidth_image_section3)
    <section class="sectionFour">
        <div class="container-fluid">
            @if(isset($brand->banner_section->fullwidth_banner1_unfixed))
                <div class="row">
                    <div style="
                        background-image: url({{ asset('storage/'.$brand->banner_section->fullwidth_banner1_unfixed) }} );
                        width: 100%;
                        background-repeat: no-repeat;
                        background-position: center;
                        background-attachment: fixed;
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 700px;
                        background-position: center top;
                        "></div>
                </div>
            @endif
        </div>
    </section>
@endif
@if($brand->brand_settings->news_blogs_section)
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
    <script src="{{ asset('js/site/main.js')}}"></script>
@endpush
