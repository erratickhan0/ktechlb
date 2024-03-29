@extends('layouts.app-site')
@section('content')

    @if($flipbook)
    @if($flipbook->section_selector == 'section1')
        <div class="opt2 container position-relative mt-10">
            <section class="catalogue  mt-5 mb-5">
                <div class="container">
                    <div class="heading-innerPage text-dark">{{$flipbook->section1_heading}}</div>
                    <p class="text-para-big  mb-2">{{$flipbook->section1_title}}</p>
                    <p class="paraText">
                    {!! $flipbook->section1_description !!}
                    </p>
                    <div align="center" class="innerPdfViewer w-100" data-aos="fade-up" data-aos-duration="1500">
                        <embed class="w-100 h-100" src="{{asset('storage/'.$flipbook->pdf)}}" type="application/pdf"></embed>
                    </div>
                    @if($flipbook->btn_show)
                    <div class="mt-4 align-middle aos-init" data-aos="fade-up" data-aos-duration="1500">
                        <a href="{{$flipbook->btn_link}}" target="_blank"><button class="main_btn btn_blue">{{$flipbook->btn_text}}</button></a>
                    </div>
                     @endif
                </div>
            </section>
        </div>
     @endif
    @if($flipbook->section_selector == 'section2')
        <div class="opt2 container position-relative mt-10">
    <section class="bookVideo  mt-5 mb-5">
        <div class="container">
            <div class="heading-innerPage font-weight-bold text-dark aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                {{$flipbook->section2_heading}}
            </div>
            <div data-aos="fade-up" data-aos-duration="500" class="aos-init aos-animate">
                <p class="text-bold font-weight-bold text-para-big text-dark mb-5">
                    {{$flipbook->section2_title}}
                </p>
                {!! $flipbook->section2_description !!}

            </div>
        </div>
    </section>
        @if($flipbook->flipbook_slider)
                <section class="videoBookSwiper  mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                    <div class="container">
                        <div class="owl-carousel optVid" id="optVideo">
                            @foreach($flipbook->flipbook_slider as $value)
                                @if($value->mime_type == 'video')
                                    <div class="item">
                                        <video class="video-item" muted loop controls="controls" >
                                            <source src="{{ asset('storage/'.$value->image) }}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>

        </div>
    @endif
    @endif
    @if($flipbook->section_selector == 'section3')
    <section class="getYourProBundle mt-5 mb-5">
        <div class="container text-center">
            <div class="heading-innerPage text-dark aos-init" data-aos="fade-up" data-aos-duration="500">
                {{$flipbook->section3_heading}}
            </div>
            <p class="text-para-big mb-2 aos-init" data-aos="fade-up" data-aos-duration="500">{{$flipbook->section3_title}}</p>
            <p class="paraText aos-init" data-aos="fade-up" data-aos-duration="500">
                {!! $flipbook->section3_description !!}
            </p>
            <img src="{{ asset('storage/'.$flipbook->section3_image) }}" class="img-fluid aos-init" data-aos="fade-up" data-aos-duration="1500">
            <div class="mt-4 aos-init" data-aos="fade-up" data-aos-duration="1500">
                <button class="main_btn btn_blue">Book Order</button>
            </div>
        </div>
    </section>
    @endif

<!--    <section class="generalDetailSection  mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col aos-init" data-aos="zoom-in-left" data-aos-duration="1500">
                    <div class="card table-card ">
                        <div class="card-body">
                            <p class="text-para-big  mb-2 text-dark">General</p>
                            <ul class="list-ul">
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col aos-init" data-aos="zoom-in-right" data-aos-duration="1500">
                    <div class="card table-card ">
                        <div class="card-body">
                            <p class="text-para-big  mb-2 text-dark"></p>
                            <ul class="list-ul">
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                                <li>Display 5.99 inch, 2160 x 1080 pixel (primary)</li>
                                <li>1.91 inch, 570 x 240 pixel AMOLED (cover display)</li>
                                <li>Processor MediaTek Helio P70</li>
                                <li>x ARM Cortex-A73 CPU cores @ 2.1 GHz</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>-->

    @endif
@endsection
@push('scripts')
    <script src="{{ asset('js/site/html2canvas.min.js')}}"></script>

    <script src="{{ asset('js/site/pdf.min.js')}}"></script>
    <script src="{{ asset('js/site/three.min.js')}}"></script>
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
