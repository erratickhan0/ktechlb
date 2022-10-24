@extends('layouts.app-site')
@section('content')
    @push('css_scripts_p1')
        <link href="{{ asset('css/client/d1.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/p1.css') }}" rel="stylesheet" />
    @endpush
   <header class="fixed-top">
     <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-dark border-bottom-thin  d-none">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbar1">
                    <ul class="navbar-nav ml-auto pl-lg-4 flex-row">
                        <li class="nav-item px-2 "> <a class="nav-link" href="#"> <span class="d-inline-block icon-width"><i class="fas fa-mobile pr-2" aria-hidden="true"></i></span>
                                <span>045628900</span>
                            </a>
                        </li>
                        <li class="nav-item px-lg-1 px-2"> <a class="nav-link" href="#"><span
                                    class="d-inline-block icon-width"></span>Store</a> </li>
                        <li class="nav-item px-lg-1 px-2"> <a class="nav-link" href="#"><span
                                    class="d-inline-block icon-width"></span>Support</a> </li>
                        <li class="nav-item px-lg-1 px-2"> <a class="nav-link" href="#"><span
                                    class="d-inline-block icon-width"></span><span>Login</span><i class="fa fa-user-circle pl-2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-dark">
            <div class="container-fluid"> <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('images/ktech/bg_1620476500_kanaan.png') }}">
                </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                             data-target="#navbar4">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbar4">
                    <ul class="navbar-nav ml-auto pl-lg-4">
                        <li class="nav-item px-lg-1 active"> <a class="nav-link" href="{{ url('/') }}"> <span
                                    class="d-inline-block d-lg-none icon-width "></span>Home</a> </li>
                        <li class="nav-item px-lg-1"> <a class="nav-link" href="#"><span
                                    class="d-inline-block d-lg-none icon-width"></i></span>About Us</a> </li>
                        <li class="nav-item px-lg-1 dropdown">
                            <a class="nav-link " href="#">
                <span class="d-inline-block icon-width" id="dropdownMenuButton" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                  <span>Product</span><span class="fa fa-angle-down pl-1"></span>
                </span>
                            </a>
                            <ul class="dropdown-menu  bg-dark" role="menu" aria-labelledby="dropdownMenu">
                                <li class="nav-item px-lg-1  inner-dropdown">
                                    <a href="#" class="dropdown-item ">colop
                                        e-mark
                                        <i class="fa fa-caret-right"></i>
                                    </a>
                                    <ul class="dropdown-menu  bg-dark" role="menu" aria-labelledby="dropdownMenu" style="display:none">
                                        <li class="product mufaddal">
                                            <a class="dropdown-item" href="https://ktechlb.com/index.php/page/productdetails/59/9">colop
                                                e-mark plus</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item px-lg-1 ">
                                    <a href="#" class="dropdown-item">colop emark create </a>
                                </li>
                            </ul>

                            </a>
                        </li>
                        <li class="nav-item px-lg-1"> <a class="nav-link" href="#"><span
                                    class="d-inline-block d-lg-none icon-width"></span>News</a> </li>
                        <li class="nav-item px-lg-1"> <a class="nav-link" href="#"><span
                                    class="d-inline-block d-lg-none icon-width"></span>Contact Us</a> </li>
                        <li class="nav-item px-lg-1"> <a class="nav-link" href="#"><span
                                    class="d-inline-block d-lg-none icon-width"></span>Dealer Locator</a>
                        </li>
                        <li class="nav-item px-lg-1"> <a class="nav-link" href="#">
                                <i class="fa  fa-search"></i>
                            </a> </li>
                        <li class="nav-item px-lg-1"> <a class="nav-link" href="#">
                                <i class="fa  fa-shopping-cart"></i>
                            </a> </li>
                    </ul>
                </div>
            </div>
        </nav>
 </header>
   @if($slider1->count())
   <div class="d1scrollEffect">
       <section class="bannerSectionM2">
           <div class="m2BannerText">
               <div class="container-fluid text-right">
                   <h5 class="text-uppercase">Fascinating seaform
                   </h5>
                   <div><small class="text-uppercase mt-5 mb-5">made in germany -
                           since 1917</small></div>
               </div>
           </div>
           <div class="container-fluid">
               <div class="row">
                   <div class="swiper-container">
                       <div class="swiper-wrapper">
                           @foreach($slider1 as $value)
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
           </div>
       </section>
   </div>
    @endif
   @if($slider2->count())
   @foreach($slider2 as $value )
   @if($loop->iteration % 2 == 0)
   <div class="d1scrollEffect">
       <section class="m2CommunicatorOne" style="height: 100vh;
    width: 100%;
    background: url({{ asset('images/site/M2bg.jpg') }});
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: 1px 2px 3px 36px #000;
    /* margin-top: 60px;">
           <div class="container-fluid px-0">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                       <div class="greyLeft">
                           <div class="img-container w-100">
                               <img src="{{ asset('storage/'.$value->image) }}" class="img-fluid">
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-left">
                       {!! $value->description !!}
                   </div>
               </div>

           </div>
       </section>
   </div>
    @else
   <div class="d1scrollEffect">
       <section class="m2CommunicatorOne" style="height: 100vh;
           width: 100%;
           background: url({{ asset('images/site/M2bg.jpg') }});
           background-repeat: no-repeat;
           background-size: cover;
           box-shadow: 1px 2px 3px 36px #000;">
           <div class="container-fluid px-0">
               <div class="row">

                   <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-left">
                    {!! $value->description !!}
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                       <div class="greyLeft">
                           <div class="img-container w-100">
                               <img src="{{ asset('storage/'.$value->image) }}" class="img-fluid">
                           </div>
                       </div>
                   </div>
               </div>

           </div>
       </section>
   </div>
    @endif
   @endforeach
    @endif
    @if($slider3->count())
    <div class="d1scrollEffect">

        <div class="standard">
            <div class="m2CommunicatorOne" style="height: 100vh;
    width: 100%;
    background: url({{ asset('images/site/M2bg.jpg') }});
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: 1px 2px 3px 36px #000;
    /* margin-top: 60px">
                <div class="d1LastSection mb-2">

                    @foreach($slider3 as $value)
                    <div class="d1Item">
                        <a href="{{ asset('storage/'.$value->image) }}"  data-lightbox="image-1"
                           style="background-image:url({{ asset('storage/'.$value->image) }});"
                           class="d1-card-image"></a>
                        <h3 class="h3__section-title  aos-init aos-animate mt-4 mb-2" data-aos-easing="linear" data-aos="fade-right"
                            data-aos-duration="1000">
                            <span class="green"> {{$value->title}}</span>
                        </h3>
                        <p class="body-text mb-3 aos-init aos-animate text-size-17" data-aos-easing="linear" data-aos="fade-right"
                           data-aos-duration="1400">{!! $value->description !!}<br></p>
                    </div>
                    @endforeach




                </div>
                <div class="tech-accordion">
                    <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                       aria-controls="multiCollapseExample1">
                        <div class="tech-text">TECHNICAL SPECIFICATION</div>
                        <div class="fa fa-plus tech-icon" aria-hidden="true"></div>
                    </a>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil
                                    anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif
    <div class="d1scrollEffect">
        <section class="m2CommunicatorOne d1Table" style="height: 100vh;
    width: 100%;
    background: url({{ asset('images/site/M2bg.jpg') }});
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: 1px 2px 3px 36px #000;
    /* margin-top: 60px;">
            <div class="container px-0 ">

                <section class="generalDetailSection  mt-5 mb-5 d1generalDetailSection">

                    <div class="row-grid">
                        <div data-aos-easing="linear" data-aos="zoom-in-left" data-aos-duration="1500" class="aos-init aos-animate">
                            <div class="card table-card ">
                                <div class="card-body p-1">
                                    <p class="text-para-big  mb-2">General Details</p>
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
                        <div data-aos-easing="linear" data-aos="zoom-in-right" data-aos-duration="1500"
                             class="aos-init aos-animate">
                            <div class="card table-card ">
                                <div class="card-body p-1">
                                    <p class="text-para-big  mb-2 invisible">General</p>
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


                </section>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/site/main.js')}}"></script>
    <script type="javascript">
        $(document).ready(function() {
            AOS.init({
                easing: 'ease-out-back',
                duration: 1000
            });

            $('.card-link').on('click', function () {
                var getAttr = $(this).attr('href').replace('#', '');
                $('.' + getAttr).siblings().hide();
                $('.' + getAttr).show();
            })
            new WOW().init();

            var $card = $(".m2CommunicatorOne");
            var $container = $(".m2CommunicatorOne");
            var $bike = $(".m2CommunicatorOne img");

            //Moving Animation Event
            $container.on("mousemove", function (e) {
                let xAxis = (window.innerWidth / 2 - e.clientX) / 30;
                let yAxis = (window.innerHeight / 2 - e.clientY) / 30;
                $bike.css("transform", `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`);
            });

            //Animate on Hover
            $container.hover(function () {
                $card.toggleClass("has-transform");
                $bike.toggleClass("has-transform");
            });

            //Pop Back on mouseleave
            $container.on("mouseleave", function () {
                $card.css("transform", `rotateY(0deg) rotateX(0deg)`);
            });
        });

    </script>
    <script src="{{ asset('js/site/lightbox.js')}}"></script>

@endpush
