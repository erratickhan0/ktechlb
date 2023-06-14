@extends('layouts.app-site')
@section('content')
    @push('css_scripts_p1')
        <link href="{{ asset('css/client/d1.css?version=1.9') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/p1.css') }}" rel="stylesheet" />
        <style>
          .scrollEffect {
                background-color: #040404;
            }
        </style>
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
   <div class="scrollEffect">
      <section class="bannerSectionM2">
        <!-- <div class="m2BannerText">
          <div class="container-fluid text-right">
            <h5 class="text-uppercase">Fascinating seaform </h5>
            <div>
              <small class="text-uppercase mt-5 mb-5">made in germany - since 1917</small>
            </div>
          </div>
        </div> -->
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
                        <p class="vjs-no-js"> To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank"> supports HTML5 video </a>
                        </p>
                      </video>
                      <div class="m2BannerText">
                        <div class="container-fluid text-right">
                          <h5 class="text-uppercase">{{$value->title}}
                          </h5>
                          <div>
                            <small class="text-uppercase mt-5 mb-5">{{$value->description}}</small>
                          </div>
                        </div>
                      </div>
                    </div> 
                  @else 
                    <div class="swiper-slide" data-slide-type="img">
                      <img src="{{ asset('storage/'.$value->file_path) }}" />
                      <div class="m2BannerText">
                        <div class="container-fluid text-right">
                          <h5 class="text-uppercase">{{$value->title}}
                          </h5>
                          <div>
                            <small class="text-uppercase mt-5 mb-5">{{$value->description}}</small>
                          </div>
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
   <div class="scrollEffect">
       <section class="d1CommunicatorOne" style="height: 100vh;
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
                           <div class="img-container w-100 aos-init aos-animate" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1000">
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
   <div class="scrollEffect">
       <section class="d1CommunicatorOne" style="height: 100vh;
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
                           <div class="img-container w-100 aos-init aos-animate" data-aos-easing="linear" data-aos="fade-left" data-aos-duration="1000">
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

    <div class="scrollEffect">
       <section class="d1CommunicatorOne" style="height: 100vh;
           width: 100%;
           background: url({{ asset('images/site/M2bg.jpg') }});
           background-repeat: no-repeat;
           background-size: cover;
           box-shadow: 1px 2px 3px 36px #000;">
           <div class="container-fluid px-0">
               <div class="d1-3-wrapper">
                   <div class="d1-3-1">
                        <div class=""> 
                            <h3 class="h2__section-title d-heading aos-init aos-animate" data-aos-easing="linear" data-aos="fade-left" data-aos-duration="1000"> PLANET <span class="green"> COMMUNUCATOR</span></h3> 
                            <h3 class="h2__section-title d-heading"> ASTRO SLIDE</h3> 
                        </div>
                   </div>
                   <div class="">
                       <div class="greyLeft">
                            <div class="img-container w-100 d1img">
                                <img src="{{ asset('storage/'.$value->image) }}" class="img-fluid">
                            </div>
                            <div class="des-container text-center">
                                <h4>SEAFORM KITCHENS & WARROBES</h4>
                                <p>We design extraordinary spaces to create, experience and live in the city of master. We design extraordiar.<br>We desgin extraordinary spaces to create, experience and live in the city of master</p>
                                <button data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1400" class="main_btn btn_red mt-3 w-200 aos-init aos-animate">DISCOVER THE M4000</button>
                            </div>
                       </div>
                   </div>
                   
               </div>
           </div>
       </section>
   </div>

  <!-- New Section Added -->
  <div class="scrollEffect">
    <div>
      <section class="d1CommunicatorOne" style="height: 100vh;
           width: 100%;
           background: url({{ asset('images/site/M2bg.jpg') }});
           background-repeat: no-repeat;
           background-size: cover;
           box-shadow: 1px 2px 3px 36px #000;">
        <div class="container-fluid px-0">
          <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-left bg-black">
              <div class="d1Right">
                <h3 class="h2__section-title d-heading" data-aos-easing="linear" data-aos="fade-left"
                  data-aos-duration="1000" style="margin-bottom: 85px;">
                  PLANET <span class="green"> COMMUNUCATOR</span></h3>
                <!-- <h3 class="h3__section-title  mb-0" data-aos-easing="linear" data-aos="fade-right"
                  data-aos-duration="1000">
                  <span class="green"> EXPERIENCE</span>
                </h3>
                <p class="body-text mb-3" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1400">Type
                  with
                  ease, making the most of
                  keyboard
                  shorcuts and extensive characters.
                  Split Screen to view multiple windows.
                  Compose emails and documents,cast wirelessly
                  or via HDMI for presentations, or place on a
                  surface for the perfect Video Call angle<br></p>
                <h3 class="h3__section-title" data-aos-easing="linear" data-aos="fade-right" data-aos-duration="1000">
                  TRANSFORM YOUR<br />MOBILE<span class="green"> EXPERIENCE</span></h3> -->
                <div id="accordion">

                  <div class="feature-divider"></div>
                  <div class="feature-hidden-text-wrapper">
                    <div>
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo" role="button"
                        aria-expanded="false" aria-controls="collapseTwo" style="font-size: 25px; margin: 5px 0px;">
                        Collapsible Group Item #2
                      </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <p class="body-text mb-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris
                        nisi ut aliquip ex ea commodo consequat.
                      </p>
                    </div>
                  </div>
                  <div class="feature-divider"></div>
                  <div class="feature-hidden-text-wrapper">
                    <div>
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree" role="button"
                        aria-expanded="false" aria-controls="collapseThree" style="font-size: 25px; margin: 5px 0px;">
                        Collapsible Group Item #3
                      </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <p class="body-text mb-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris
                        nisi ut aliquip ex ea commodo consequat.
                      </p>
                    </div>
                  </div>
                  <div class="feature-divider"></div>
                </div>

              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="collapseTwo">
                <div class="greyLeft  h-100vh img-container-flex">
                  <div class=" w-100">
                    <img src="https://ktechlb.com/storage/d1_slider_section2/loMvGoU6nKhdHNHv9iltnc7zYvUxIJZ6iwj8ts0z.png" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="collapseThree" style="display: none;">
                <div class="greyLeft  h-100vh img-container-flex">
                  <div class=" w-100">
                    <img src="https://ktechlb.com/storage/d1_slider_section2/loMvGoU6nKhdHNHv9iltnc7zYvUxIJZ6iwj8ts0z.png" class="img-fluid">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- New Section Added -->




    <!-- New slider section Added -->
    <div class="scrollEffect">
      <section class="d1CommunicatorOne" style="
            width: 100%;
            background: url({{ asset('images/site/M2bg.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: 1px 2px 3px 36px #000;
              min-height: 100vh;
              justify-content: center;
              align-items: center;
              display: flex;
              flex-direction: column;
            ">
        <div class="container-fluid px-0">
          <div class="d1-3-wrapper pt-0" style="height: 76vh;">
            <div class="blog-archive">
              <div class="mb-5">
                <header class="section-header text-center" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000">
                  <h2 class="section-title text-white">ACCESSORIES</h2>
                </header>
                <div data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1000" class="mt-4 text-white text-center text-uppercase">seaform kitchens &amp; wardrobes</div>
                <p style="margin-bottom: 7% !important;" data-aos-easing="linear" data-aos="fade-up" data-aos-duration="1500" class=" mb-1 text-center text-white">We design extraordinary spaces to create, experience and live in the city of master. We design extraordiar.</p>
                <div></div>
              </div>
              <div data-aos-easing="linear" data-aos="fade-up" data-aos-duration="2000">
                <div class="customNavigation">
                  <a class="btn gray prev">
                    <i class="icon ion-ios-arrow-left"></i>
                  </a>
                  <a class="btn gray next">
                    <i class="icon ion-ios-arrow-right"></i>
                  </a>
                </div>
                <div id="slider-carousel" class="owl-carousel">
                  <div class="item">
                    <a href="#" data-toggle="modal" data-target="#d1exampleModals">
                      <div class="figure">
                        <i class="icon ion-search"></i>
                      </div>
                      <div class="figure">
                        <i class="icon ion-link"></i>
                      </div>
                      <div class="overlay"></div>
                      <img src="{{ asset('images/d1Slider/M series Hat Mount.png') }}">
                    </a>
                    <p>Sample Item</p>
                  </div>
                  <div class="item">
                    <a href="#" data-toggle="modal" data-target="#d1exampleModal">
                      <div class="figure">
                        <i class="icon ion-search"></i>
                      </div>
                      <div class="figure">
                        <i class="icon ion-link"></i>
                      </div>
                      <div class="overlay"></div>
                      <img src="{{ asset('images/d1Slider/M-SERIES HEADBAND.png') }}">
                    </a>
                    <p>Sample Item</p>
                  </div>
                  <div class="item">
                    <a href="#" data-toggle="modal" data-target="#d1exampleModal">
                      <div class="figure">
                        <i class="icon ion-search"></i>
                      </div>
                      <div class="figure">
                        <i class="icon ion-link"></i>
                      </div>
                      <div class="overlay"></div>
                      <img src="{{ asset('images/d1Slider/M-SERIES LENSLESS FRAMES.png') }}">
                    </a>
                    <p>Sample Item</p>
                  </div>
                  <div class="item">
                    <a href="#" data-toggle="modal" data-target="#d1exampleModal">
                      <div class="figure">
                        <i class="icon ion-search"></i>
                      </div>
                      <div class="figure">
                        <i class="icon ion-link"></i>
                      </div>
                      <div class="overlay"></div>
                      <img src="{{ asset('images/d1Slider/M400 Power bank.png') }}">
                    </a>
                    <p>Sample Item</p>
                  </div>
                  <div class="item">
                    <a href="#" data-toggle="modal" data-target="#d1exampleModal">
                      <div class="figure">
                        <i class="icon ion-search"></i>
                      </div>
                      <div class="figure">
                        <i class="icon ion-link"></i>
                      </div>
                      <div class="overlay"></div>
                      <img src="{{ asset('images/d1Slider/M400 USb-A to USB-C Charging.png') }}">
                    </a>
                    <p>Sample Item</p>
                  </div>
                  <div class="item">
                    <a href="#" data-toggle="modal" data-target="#d1exampleModal">
                      <div class="figure">
                        <i class="icon ion-search"></i>
                      </div>
                      <div class="figure">
                        <i class="icon ion-link"></i>
                      </div>
                      <div class="overlay"></div>
                      <img src="{{ asset('images/d1Slider/M series Hat Mount.png') }}">
                    </a>
                    <p>Sample Item</p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="blog-container" style="width: 80%;">
        <div class="tech-accordion" style="width:100%;background-color: grey">
        <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
          <div class="tech-text">TECHNICAL SPECIFICATION</div>
          <div class="fa fa-plus tech-icon" aria-hidden="true"></div>
        </a>
      </div>
      <div class=" collapse multi-collapse" id="multiCollapseExample1">
          <div class="container px-0 ">
            <section class="generalDetailSection  mt-5 mb-5 d1generalDetailSection">
              <div class="row-grid">
                <div data-aos-easing="linear" data-aos="zoom-in-left" data-aos-duration="1500" class="aos-init aos-animate">
                  <div class="card table-card" style="border-top:none;">
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
                <div data-aos-easing="linear" data-aos="zoom-in-right" data-aos-duration="1500" class="aos-init aos-animate">
                  <div class="card table-card"  style="border-top:none;">
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
       
      </div>
        </div>
      </section>
    </div>
    <!-- New slider section Added -->  
  
    <!-- @if($slider3->count())
    <div class="scrollEffect">

        <div class="standard">
            <div class="d1CommunicatorOne" style="height: 100vh;
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




                </div> -->
                <!--<div class="tech-accordion">
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
                </div>-->
            <!-- </div>

        </div>
    </div>
    @endif -->


    <div class="modal fade" id="d1exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="top: 8rem; height: 656px;">
          <div class="modal-body row">
            <div class="col-md-6">
              <div class="image-section">
                <img src="https://via.placeholder.com/600x400" class="img-fluid" alt="Image" style="width: 90%; margin: 50px 0px 35px 65px;">
                <div class="row mt-3" style="margin-left: 3%;">
                  <div class="col-3 col-md-2 mb-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid" alt="Image">
                  </div>
                  <div class="col-3 col-md-2 mb-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid" alt="Image">
                  </div>
                  <div class="col-3 col-md-2 mb-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid" alt="Image">
                  </div>
                  <div class="col-3 col-md-2 mb-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid" alt="Image">
                  </div>
                  <div class="col-3 col-md-2 mb-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid" alt="Image">
                  </div>
                  <div class="col-3 col-md-2 mb-3">
                    <img src="https://via.placeholder.com/100x100" class="img-fluid" alt="Image">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-section" style="width: 77%; margin: 16%;">
                <h2>Product Title</h2>
                <p>Product Heading</p>
                <p>Description of the product, which should be at least 5 lines long. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum, libero a euismod finibus, neque tellus semper est, vel eleifend tortor magna ac tellus. Quisque non ipsum eget turpis efficitur imperdiet. Donec non elit quis elit vulputate lacinia. Pellentesque sit amet pulvinar justo.</p>
                <div class="row mt-3">
                  <div class="col-2 mb-3">
                    <div class="square-box bg-danger"></div>
                  </div>
                  <div class="col-2 mb-3">
                    <div class="square-box bg-danger"></div>
                  </div>
                  <div class="col-2 mb-3">
                    <div class="square-box bg-danger"></div>
                  </div>
                  <div class="col-2 mb-3">
                    <div class="square-box bg-danger"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
            if (!(/Android|webOS|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i.test(navigator.userAgent))) { //if not these devices(userAgents)

              $.scrollify({
              section: ".scrollEffect",
              interstitialSection: ".stop",
              easing: "easeOutExpo",
              scrollSpeed: 900,
              offset: 0,
              scrollbars: true,
              standardScrollElements: ".standard",
              setHeights: false,
              overflowScroll: false,
              updateHash: false,
              touchScroll: true,
              });

            }
            
        });

    </script>
    <script src="{{ asset('js/site/lightbox.js')}}"></script>

@endpush
