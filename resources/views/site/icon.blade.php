@extends('layouts.app-site')
@section('content')
@if($icon)
    <div style="
        background-image: url({{ asset('storage/'.$icon->details_background_image1) }} )!important;
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
    @if($icon->icon_detail_slider && isset($icon->icon_detail_slider[0]))
    <section>
        <div class="container ">
            <div id="sync1" class="owl-carousel">
                @foreach($icon->icon_detail_slider as $key => $value)
                    @if($value->mime_type == 'video')
                <div class="item">
                    <video class="w-100" loop controls poster="{{asset('images/site/poster.JPG')}}" >
                        <source src="{{ asset('storage/'.$value->image) }}" type="video/mp4">
                    </video>
                </div>
                    @endif
                @endforeach
            </div>
      <div id="sync2" class="owl-carousel">
          @foreach($icon->icon_detail_slider as $key => $value)
              @if($value->mime_type == 'video')
                <div class="item">
                    <video   class="img-fluid" poster="{{asset('images/site/poster.JPG')}}">
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



            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navigationText: [
                    "<img class='newsleftarrow' src='{{asset('images/ktech/left-arrow.png')}}'>",
                    "<img class='newsrightarrow' src='{{asset('images/ktech/right-arrow.png')}}'>"
                ],

            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });

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


        });

    </script>
@endpush
