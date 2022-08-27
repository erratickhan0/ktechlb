@extends('layouts.app-site')
@section('content')
    @if($middle_banner)
    <div style="background: url({{ asset('storage/'.$middle_banner->details_background_image1) }}) !important;
        background-size: cover !important;
        height: 550px;
        margin-top: 85px;" class=" d-flex w-100 p-3 mx-auto flex-column news-cover-container">
        <main role="main" class="innercustom">
            <h1 class="white-text cover-heading "
                style="display: block !important; visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;">
                {{$middle_banner->details_title}}</h1>
            <p class="site-description">
                {{$middle_banner->details_subtitle}}</p>
            <div class="c-card">
                <div class="c-card_b">
                    <img src="{{asset('storage/'.$middle_banner->details_background_image2)}}" loading="lazy" sizes="100vw" alt=""
                         class="img-fluid image-19">
                </div>
            </div>
        </main>
    </div>
    <div class="newsSection mt-5 pt-5 middleBanner">

        <div class="container-fluid-sm text-center" data-aos-easing="linear" data-aos="zoom-in-up"
             data-aos-duration="1200">
            <h5 class="text-uppercase">{{$middle_banner->details_heading}}</h5>
            <p class="mt-3 f-s-2 pl-sm-5 pr-sm-5">{!!  $middle_banner->details_description !!}</p>
        </div>
        @if($middle_banner->logo_title_details)
        @foreach($middle_banner->logo_title_details as $key => $value)
        @if($loop->iteration % 2 == 0)
                    <div class="newsSection-second mb-5">
                        <div class="container-fluid-sm">
                            <div class="news-padding">
                                <div class="container">
                                    <div class="row">
                                        <div class=" col-sm-6" data-aos-easing="linear" data-aos="zoom-in-left"
                                             data-aos-duration="1200">
                                            <h2 class="text-dark  mb-4">{{$value->heading}}</h2>
                                            <p>{!! $value->description !!}</p>
                                        </div>
                                        @if($value->mime_type == 'video')
                                            <div class="col-sm-6" >
                                                <video class="w-439" muted loop autoplay controls>
                                                    <source src="{{asset('storage/'.$value->image)}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @else
                                            <div class="col-sm-6" data-aos-easing="linear" data-aos="zoom-in-right"
                                                 data-aos-duration="1200">
                                                <img src="{{asset('storage/'.$value->image)}}" />
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

         @else
                    <div class="newsSection-second mb-5  mt-5">
                        <div class="container-fluid-sm">
                            <div class="news-padding">
                                <div class="container">
                                    <div class="row">
                                        @if($value->mime_type == 'video')
                                            <div class="col-sm-6" >
                                                <video class="w-439" muted loop autoplay controls>
                                                    <source src="{{asset('storage/'.$value->image)}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @else
                                            <div class="col-sm-6 " data-aos-easing="linear" data-aos="zoom-in-left"
                                                 data-aos-duration="1200">
                                                <img src="{{asset('storage/'.$value->image)}}" />
                                            </div>
                                        @endif
                                        <div class="col-sm-6 " data-aos-easing="linear" data-aos="zoom-in-right"
                                             data-aos-duration="1200">
                                            <h2 class="text-dark mb-4">{{$value->heading}}</h2>
                                            <p>{!! $value->description !!}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        @endif
        @endforeach
        @endif


        <div class="newsSection-second engagementSection mb-5 ">
            <div class="container-fluid-sm">
                <div class="news-padding">
                    <div class="container">
                        <div class=" text-center">
                            <h3 class=" text-dark mb-5 pb-5">Many Industry stand to gain Wi-Spot devices</h3>
                            <div class="row">
                                @if($middle_banner->logo_title_detail_slider)
                                    @foreach($middle_banner->logo_title_detail_slider as $key => $value)
                                <div class="col-sm-4 " data-aos-easing="linear" data-aos="fade-left"
                                     data-aos-duration="1500">
                                    <div class="EngagementActive">
                                        <div class="row">
                                            <div class="col-sm-12  mb-5">
                                                <img src="{{asset('storage/'.$value->image)}}" />
                                            </div>
                                            <div class="col-sm-12">
                                                <h2 class="text-dark  mb-4">{{$value->heading}}</h2>
                                                <p>{!! $value->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                                 @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
