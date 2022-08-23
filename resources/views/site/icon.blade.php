@extends('layouts.app-site')
@section('content')
@if($icon)
    <div style="
        background-image: url({{ asset('storage/'.$icon->details_background_image1) }} );
        background-size: cover !important;
        height: 550px;
        margin-top: 85px;" class=" d-flex w-100 p-3 mx-auto flex-column news-cover-container">
        <main role="main" class="innercustom">
            <h1 class="white-text cover-heading "
                style="display: block !important; visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;">
                {{$icon->details_title}}</h1>
            <p class="site-description">
                {{$icon->details_subtitle}}</p>
            <div class="c-card">
                <div class="c-card_b">
                    <img src="{{asset('storage/'.$icon->details_background_image2)}}" loading="lazy" sizes="100vw" alt=""
                         class="img-fluid image-19">
                </div>
            </div>
        </main>
    </div>
    <section class="bggreyabout">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-12 text-center   banner-left-text">
                    <h2 class="fontStyle werwer">{{$icon->details_heading}}</h2>
                    <p class="">
                        {!! $icon->details_description !!} </p>
                </div>
            </div>
        </div>
    </section>
    <section class="extrafeatureshow newsSection ">
        <div class="container">
            @if($icon->icon_details)
                @foreach($icon->icon_details as $key => $value)
                    @if($loop->iteration % 2 == 0)
                        <div class="newsSection-second">
                            <div>
                                <div>
                                    <div class="row">
                                        @if($value->mime_type == 'video')
                                            <div class="col-sm-6" >
                                                <video class="w-439" muted loop autoplay controls>
                                                    <source src="{{asset('storage/'.$value->image)}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @else
                                            <div class="col-sm-6" >
                                                <img src="{{asset('storage/'.$value->image)}}" class="w-439" />
                                            </div>
                                        @endif
                                        <div class=" col-md-6" >
                                            <div class="imgabouttextcustom" style="float:left;">
                                                <div>
                                                    <h3 class="fontStyle werwer">{{$value->heading}}</h3>
                                                    <p class="" style="text-align:justify;">{!! $value->description !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="newsSection-second">
                            <div>
                                <div>
                                    <div class="row">
                                        <div class=" col-md-6" >
                                            <div class=" imgabouttextcustom" style="float:left;">
                                                <div>
                                                    <h3 class="fontStyle werwer">{{$value->heading}}</h3>
                                                    <p class="" style="text-align:justify;">{!! $value->description !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @if($value->mime_type == 'video')
                                            <div class="col-sm-6" >
                                                <video class="w-439" muted loop autoplay controls>
                                                    <source src="{{asset('storage/'.$value->image)}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @else
                                            <div class="col-sm-6" >
                                                <img src="{{asset('storage/'.$value->image)}}" class="w-439" />
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>
    @if($icon->icon_detail_slider)
    <section>
        <div class="container ">
            <div id="sync1" class="owl-carousel">
                @foreach($icon->icon_detail_slider as $key => $value)
                    @if($value->mime_type == 'video')
                <div class="item">
                    <video class="w-100" loop controls >
                        <source src="{{ asset('storage/'.$value->image) }}" type="video/mp4">
                    </video>
                </div>
                    @endif
                @endforeach
            </div>
            
        </div>
    </section>
    @endif
@endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            AOS.init();

            var videoSlider = $('.owl-carousel');
            console.log(videoSlider);
            videoSlider.owlCarousel({
                loop: true,
                margin: 70,
                nav: true,
                dots: false,
                items: 1
            });

            videoSlider.on('translate.owl.carousel', function (e) {
                $('.owl-item .item video').each(function () {
                    // pause playing video - after sliding
                    $(this).get(0).pause();
                });
            });

            videoSlider.on('translated.owl.carousel', function (e) {
                // check: does the slide have a video?
                if ($('.owl-item.active').find('video').length !== 0) {
                    // play video in active slide
                    $('.owl-item.active .item video').get(0).play();
                }
            });
            AOS.init();
        });

    </script>
@endpush
