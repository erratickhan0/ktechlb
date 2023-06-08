@extends('layouts.app-site')

@section('content')
    @if($news)
        <div style="background-image: url({{ asset('storage/'.$news->details_background_image1) }} ); background-size: cover !important; height: 550px; margin-top: 0px;" class="news-cover-container d-flex w-100 p-3 mx-auto flex-column main-news">
            <main role="main" class="innercustom">
                <h1 class="white-text cover-heading" style="display: block !important; visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;"> {{$news->details_title}} </h1>
                <p class="site-description"> {{$news->details_subtitle}} </p>
                <div class="c-card">
                    <div class="c-card_b">
                        <img src="{{asset('storage/'.$news->details_background_image2)}}" loading="lazy" sizes="100vw" alt="" class="img-fluid image-19">
                    </div>
                </div>
            </main>
        </div>
        <div class="newsSection news">
            <div data-aos-easing="linear" data-aos="zoom-in-up" data-aos-duration="1200" class="container text-center col-md-12 aos-init aos-animate">
                <h5 class="text-uppercase"> {{$news->details_heading}} </h5>
                <p> {!! $news->details_description !!} </p>
            </div>
            @if($news->news_details)
                @foreach($news->news_details as $key => $value)
                    @if($loop->iteration % 2 == 0)
                        <div class="newsSection-second">
                            <div class="container">
                                <div class="row">
                                    @if($value->mime_type == 'video')
                                        <div data-aos-easing="linear" data-aos="zoom-in-left" data-aos-duration="1200" class="col-sm-6 text-section aos-init aos-animate" >
                                            <video class="w-439" muted loop autoplay controls>
                                                <source src="{{asset('storage/'.$value->image)}}" type="video/mp4">
                                            </video>
                                        </div>
                                    @else
                                        <div data-aos-easing="linear" data-aos="zoom-in-left" data-aos-duration="1200" class="col-sm-6 text-section aos-init aos-animate" >
                                            <img src="{{asset('storage/'.$value->image)}}" class="w-439" />
                                        </div>
                                    @endif
                                    <div data-aos-easing="linear" data-aos="zoom-in-right" data-aos-duration="1200" class="col-sm-6 text-section aos-init aos-animate" >
                                        <div class="w-439">
                                            <h2>{{$value->heading}}</h2>
                                            <p>{{$value->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="newsSection-second background">
                            <div class="container">
                                <div class="row">
                                    <div data-aos-easing="linear" data-aos="zoom-in-right" data-aos-duration="1200" class="col-sm-6 text-section aos-init aos-animate" >
                                        <div class="w-439">
                                            <h2>{{$value->heading}}</h2>
                                            <p>{{$value->description}}</p>
                                        </div>
                                    </div>
                                    @if($value->mime_type == 'video')
                                        <div data-aos-easing="linear" data-aos="zoom-in-left" data-aos-duration="1200" class="col-sm-6 text-section aos-init aos-animate" >
                                            <video class="w-439" muted loop autoplay controls>
                                                <source src="{{asset('storage/'.$value->image)}}" type="video/mp4">
                                            </video>
                                        </div>
                                    @else
                                        <div data-aos-easing="linear" data-aos="zoom-in-left" data-aos-duration="1200" class="col-sm-6 text-section aos-init aos-animate" >
                                            <img src="{{asset('storage/'.$value->image)}}" class="w-439" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            AOS.init();
        });

    </script>
@endpush
