@extends('layouts.app-site')
@section('content')
    @push('css_scripts_p1')
        <!-- <link href="{{ asset('css/client/p1.css') }}" rel="stylesheet" /> -->
        <link href="{{ asset('css/client/d1.css') }}" rel="stylesheet" />
        <style>

            #window {
                width: 80% !important;
                margin: 0 auto !important;
            }
            #slide-container {
                width: 100% !important;
                height: 400px !important;
            }
            #window    .dots {
                width: 12px !important;
                height: 12px !important;
                background-color: rgb(114 114 114 / 67%) !important;
            }
                #window .arrow {
                padding: 16px !important;
            }
            #window .slides {
                height: 400px !important;
            }
            #window .slide {
                width: 100% !important;
                height: 400px !important;
                object-fit: cover !important;
            }
            #window .arrow {
    padding: 16px !important;
    background: #00000096 !important;
}
#window .arrow:hover,#window .arrow:focus{
    color: #fff !important;
    text-decoration: auto !important;
}
            #dotsContainer {
    margin-top: 20px !important;
}
#window .activeDot {
    border: 2px solid #aba7a7;
    background: transparent;
    width: 12px !important;
    height: 12px !important;
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

    <div class=" d-flex w-100 p-3 mx-auto flex-column news-cover-container"
        style="background:url({{ asset('storage/'.$button2->image1) }}) !important;
        width: 100%;
        background-repeat: round;
        background-position: center top;
        background-size: cover;
        height: 100vh;">
        <main role="main" class="innercustom">
            <h1 class="white-text cover-heading "
                style="display: block !important; visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;">
                {{$button2->title}}</h1>
            <p class="site-description">
                {{$button2->subtitle}}</p>
            <div class="c-card">
                <div class="c-card_button"style="display: none;">
                    <img src="{{ asset('storage/'.$button2->image2) }}" loading="lazy" sizes="100vw" alt=""
                         class="img-fluid image-19">
                </div>
            </div>
        </main>
    </div>
    <section class="m2CommunicatorOne diSubPage" style="height: 100vh;
        width: 100%;
        background: url({{ asset('images/site/M2bg.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 1px 2px 3px 36px #000;
        /* margin-top: 60px">
        <div class="container-fluid px-0">
            <div data-aos-easing="linear" data-aos="fade-down" data-aos-duration="1000" class="button-titlebar-wrapper aos-init aos-animate">
                <div class="button-titlebar">
                    <h3 style="animation-delay: 10s;" class="h2__section-title aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="linear">PLANET <span class="green"> COMMUNUCATOR</span> ASTRO SLIDE </h3>
                    <h3 class="h3__section-title aos-init" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="linear">TRANSFORM YOUR MOBILE <span class="green"> EXPERIENCE</span>
                    </h3>
                </div>
                <div class="tittlebar-icon-wrapper aos-init aos-animate" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="linear">
                    <img class="tittlebar-icon" src="{{ asset('images/site/icon.png') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-left">
                    <div class="d1Right">
                        <h3 class="h3__section-title aos-init" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="linear">TRANSFORM YOUR <br /> MOBILE <span class="green"> EXPERIENCE</span></h3>
                        <div class="h3__ul aos-init" data-aos="fade-right" data-aos-duration="1300" data-aos-easing="linear">
                            <ul>
                            <li>MORE THAN SMARTPHONE</li>
                            <li>MORE POCKET POWER</li>
                            <li>MORE PRIVACY &amp; SECURITY</li>
                            </ul>
                        </div>
                        <p class="body-text aos-init" data-aos="fade-right" data-aos-duration="1400" data-aos-easing="linear">Type with ease, making the most of keyboard shorcuts and extensive characters. Split Screen to view multiple windows. Compose emails and documents,cast wirelessly or via HDMI for presentations, or place on a surface for the perfect Video Call angle</p>
                        <button data-toggle="modal" data-target="#d1exampleModal" class="main_btn btn_red mt-3 w-200 aos-init" data-aos="fade-right" data-aos-duration="1400" data-aos-easing="linear">DISCOVER THE M4000</button>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                    <div id="window" class="greyLeft aos-init" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="linear">
                        <div id="slide-container">
                            <div class="slides">
                                <!-- First image -->
                                <img class="slide" src="https://d3hne3c382ip58.cloudfront.net/files/uploads/bookmundi/resized/cmsfeatured/holland-tour-highlights-1501738379-1000X561.jpg">
                            </div>
                                <!-- Second image -->
                            <div class="slides">
                                <img class="slide" src="https://gsg-61ea.kxcdn.com/media/contents/sydney%20harbour%20aerial%20jamie-davies-Hao52Fu9-F8-unsplash%20(2).jpg">
                            </div>
                                <!-- Third image -->
                            <div class="slides">
                                <img class="slide" src="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/3f/6d/47.jpg">
                            </div>
                        </div>
                        <a id="previous" class="arrow" style="left: 0%;">&#10094</a>
                        <a id="next" class="arrow">&#10095</a>
                        <div id="dotsContainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($button2->slide_changer->count())
    @foreach($button2->slide_changer as $value) 
    <section class="m2CommunicatorOne diSubPage" style="height: 100vh;
        width: 100%;
        background: url({{ asset('images/site/M2bg.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 1px 2px 3px 36px #000;
        /* margin-top: 60px">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                    <div class="greyLeft">
                        <div class="img-container w-100" data-aos-easing="linear" data-aos="fade-left"
                             data-aos-duration="1500">
                            <img src="{{ asset('storage/'.$value->image) }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-left">
                    {!! $value->description !!}
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @endif
    <div class="modal fade" id="d1exampleModal" tabindex="-1" role="dialog" aria-labelledby="d1exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="top: 8rem; height: 656px;">
          <div class="modal-body row">
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
            <div class="col-md-6">
              <div class="image-section" style="display: flex; flex-direction: column; align-items: center;">
                <img src="https://via.placeholder.com/600x400" class="img-fluid" alt="Image" style="width: 90%; margin: auto;">
                <div class="row" style="margin-left: 3%;">
                    <div id="dotsContainer">
                        <span class="dots activeDot"></span><span class="dots"></span><span class="dots"></span>
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
    <script >
        $(document).ready(function() {
            AOS.init({
                easing: 'ease-out-back',
                duration: 1000
            });


        });

        var index = 0; 
        var locations = ["Amsterdam, The Netherlands", "Sydney, Australia", "San Francisco, California"]
        var slides = document.getElementsByClassName("slides"); 
        var nextArrow = document.getElementById("next");
        var previousArrow = document.getElementById("previous");
        var dotsContainer = document.getElementById("dotsContainer");
        var dotArray = document.getElementsByClassName("dots"); 
        createDots(); 
        showSlides(index); 

        function createDots() {
            for (i=0; i<slides.length; i++) {
            var dot = document.createElement("span");
            dot.className = "dots"; 
            dotsContainer.appendChild(dot); 
            }
        }

        function showSlides(x) {
            if (x > slides.length-1) {
                index = 0; 
            }
            if (x < 0) {
                index = slides.length-1; 
            }
            for (i=0; i < slides.length; i++) {
                slides[i].style.display = "none"; 
                dotArray[i].className = "dots";  
            }
            
            slides[index].style.display = "block";
            dotArray[index].className += " activeDot";  
        }

        nextArrow.onclick = function() {
            index += 1; 
            showSlides(index); 
        } 

        previousArrow.onclick = function() {
            index -= 1; 
            showSlides(index); 
        } 

        dotArray[0].onclick = showSlides(1); 

    </script>

@endpush
