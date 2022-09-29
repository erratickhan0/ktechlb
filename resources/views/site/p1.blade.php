@extends('layouts.app-site')
@section('content')
    @push('css_scripts_p1')
        <link href="{{ asset('css/client/p1.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/index_ipad.css') }}" rel="stylesheet"  />
        <link href="{{ asset('css/client/YouTubePopUp.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/site/scrolling.js')}}"></script>
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
    <div class="mobile">
        <div class="container-fluid">
            <div class="row">
                @if($p1->image)
                <div class="col-sm-12"><img src="{{asset('/storage/'.$p1->image)}}" class="full-img"></div>
                @endif
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <h2 class="fontStyle">{{$p1->heading}}</h2>
                            <p class="site-description fontStyle">{{$p1->title}}</p>
                              @if($p1->video_link)
                            <a href="{{$p1->video_link}}" class="videoBtn">
                                <img width="70" src="{{asset('/images/ktech/video-btn.png')}}">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($p1->slide_changer)
            @foreach($p1->slide_changer as $value)
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 p-0">

                    <img src="{{asset('/storage/'.$value->left_image)}}" class="full-img">

                </div>
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center p-0">
                        <div class="col-sm-10 p-0">
                            <h2 class="fontStyle">{{$value->heading}}</h2>
                        <p class="fontStyle">{!! $value->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        @endif
    </div>
    <div class="desktop  ">
        <div>
            <div class="container-fluid">
                <div class="row   " style="background-color: #fff;">

                    <div class="col-sm main-title p-0 flexLeftAlign wow bounceInDown" data-wow-duration="1s"
                         data-wow-iteration="1">
                        <h1 class="fontStyle ml-265">{{$p1->heading}}</h1>
                        <p class="site-description fontStyle werwer ml-265" style="color:#000">
                            {{$p1->title}} </p>
                        @if($p1->video_link)
                        <a href="{{$p1->video_link}}" class="videoBtn ml-265">
                            <img width="70"  src="{{asset('/images/ktech/video-btn.png')}}">
                        </a>
                        @endif
                    </div>
                    <div class="col-sm p-0 position-relative p1Card h-100vh">



                        <img src="{{asset('/images/ktech/P1CARD.png')}}" class="full-img ">
                        <div class=" p1Card">
                            <div class="c-cardP1">
                                <div class="c-card_b">
                                    @if($p1->image)
                                    <img src="{{asset('/storage/'.$p1->image)}}">
                                        @endif
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <section class="section s-2 bg w-bg">
                <div class="content" id="contentspots_4_AnchorDiv" data-anchor="materials" logo-colour="#000000">
                    <div class="focus">
                        <div class="images">
                            @if($p1->slide_changer)
                                @foreach($p1->slide_changer as $key => $value)
                             @if($key == 0)
                            <div class="image focus-01"
                                 style="clip: rect(0px, 720px, 1210.12px, 0px); z-index: 800; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                            </div>
                             @endif
                                 @if($key == 1)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 1210.12px, 0px); z-index: 700; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                 @endif
                                 @if($key == 2)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 1667.11px, 0px); z-index: 600; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                 @endif
                                 @if($key == 3)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 2124.1px, 0px); z-index: 500; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                 @endif
                                 @if($key == 4)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 2581.09px, 0px); z-index: 400; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                     @endif
                                 @if($key == 5)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 2581.09px, 0px); z-index: 300; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                 @endif
                                 @if($key == 6)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 2581.09px, 0px); z-index: 200; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                 @endif
                                 @if($key == 7)
                                     <div class="image focus-01"
                                          style="clip: rect(0px, 720px, 2581.09px, 0px); z-index: 100; background: url({{asset('/storage/'.$value->left_image)}}); height: 945px;">
                                     </div>
                                 @endif
                                @endforeach
                            @endif
                            </div>
                        <div class="intro pa-ty2 right">
                            @if($p1->slide_changer)
                                @foreach($p1->slide_changer as $key  => $value)
                                       @if($key == 0)
                                    <div class="text-box skrollable skrollable-before test1 active"
                                         data-bottom-top="transform:translate(0px, 50px); opacity: 1; transition:all 0s ease 0s;"
                                         data-center-top="transform:translate(0px, 0px); opacity: 1; transition:all 1.1s ease 0s;"
                                         style="transform: translate(0px, 50px); opacity: 1; transition: all 0s ease 0s; height: 140px;">
                                        <div class="productOverlayBgImg ">
                                            <img src="{{asset('/storage/'.$value->right_image)}}" style="max-width:100%; height:auto">
                                        </div>
                                        <div class="text">
                                            <h2 class="fontStyle werwer" style="width:50%; margin:auto">{{$value->heading}}</h2>
                                            <p>{!! $value->description !!}</p>
                                        </div>
                                    </div>
                                    @elseif($key == 1)
                                    <div class="text-box skrollable skrollable-before test1"
                                         data-bottom-top="transform:translate(0px, 50px); opacity: 1; transition:all 0s ease 0s;"
                                         data-center-top="transform:translate(0px, 0px); opacity: 1; transition:all 1.1s ease 0s;"
                                         style="transform: translate(0px, 50px); opacity: 1; transition: all 0s ease 0s; height: 140px;">
                                        <div class="productOverlayBgImg">
                                            <img src="{{asset('/storage/'.$value->right_image)}}"
                                                 style="max-width:100%; height:auto" class="wow bounceInLeft" data-wow-duration="3s">
                                        </div>
                                        <div class="text">
                                            <h2 class="fontStyle werwer" style="width:50%; margin:auto">{{$value->heading}} </h2>
                                            <p>{!! $value->description !!}</p>
                                        </div>
                                    </div>
                                    @elseif($key == 2)
                                    <div class="text-box skrollable skrollable-before test1"
                                         data-bottom-top="transform:translate(0px, 50px); opacity: 1; transition:all 0s ease 0s;"
                                         data-center-top="transform:translate(0px, 0px); opacity: 1; transition:all 1.1s ease 0s;"
                                         style="transform: translate(0px, 50px); opacity: 1; transition: all 0s ease 0s; height: 140px;">
                                        <div class="productOverlayBgImg">
                                            <img src="{{asset('/storage/'.$value->right_image)}}"
                                                 style="max-width:100%; height:auto" class="wow bounceInLeft" data-wow-duration="4s">
                                        </div>
                                        <div class="text">
                                            <h2 class="fontStyle werwer" style="width:50%; margin:auto">{{$value->heading}}</h2>
                                            <p>{!! $value->description !!}</p>
                                        </div>
                                    </div>
                                    @elseif($key == 3)
                                    <div class="text-box skrollable skrollable-before test1"
                                         data-bottom-top="transform:translate(0px, 50px); opacity: 1; transition:all 0s ease 0s;"
                                         data-center-top="transform:translate(0px, 0px); opacity: 1; transition:all 1.1s ease 0s;"
                                         style="transform: translate(0px, 50px); opacity: 1; transition: all 0s ease 0s; height: 140px;">
                                        <div class="productOverlayBgImg">
                                            <img src="{{asset('/storage/'.$value->right_image)}}"
                                                 style="max-width:100%; height:auto" class="wow bounceInLeft" data-wow-duration="5s">
                                        </div>
                                        <div class="text">
                                            <h2 class="fontStyle werwer" style="width:50%; margin:auto">{{$value->heading}}</h2>
                                            <p>{!! $value->description !!}</p>
                                        </div>
                                    </div>
                                    @else
                                        <div class="text-box skrollable skrollable-before test1"
                                             data-bottom-top="transform:translate(0px, 50px); opacity: 1; transition:all 0s ease 0s;"
                                             data-center-top="transform:translate(0px, 0px); opacity: 1; transition:all 1.1s ease 0s;"
                                             style="transform: translate(0px, 50px); opacity: 1; transition: all 0s ease 0s; height: 140px;">
                                            <div class="productOverlayBgImg">
                                                <img src="{{asset('/storage/'.$value->right_image)}}"
                                                     style="max-width:100%; height:auto" class="wow bounceInLeft" data-wow-duration="5s">
                                            </div>
                                            <div class="text">
                                                <h2 class="fontStyle werwer" style="width:50%; margin:auto">{{$value->heading}}</h2>
                                                <p>{!! $value->description !!}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

            </section>
            <div class="container-fluid">
                <div class="row   " style="background-color: #fff;">

                    <div class="col-sm main-title p-0 flexLeftAlign wow bounceInDown" data-wow-duration="1s"
                         data-wow-iteration="1">
                        <h1 class="fontStyle ml-265">{{$p1->section2_heading}}</h1>
                        <p class="site-description fontStyle werwer ml-265" style="color:#000">
                            {{$p1->section2_title}}</p>
                    </div>
                    <div class="col-sm p-0 position-relative p1Card h-100vh">




                        <div class=" p1Card">
                            <div class="c-cardP1">
                                <div class="c-card_b">
                                    @if($p1->section2_image)
                                    <img src="{{asset('/storage/'.$p1->section2_image)}}">
                                      @endif
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


        </div>
        <section class="widgetsLinks">
            <div class="highlights content-block">
                @if($p1->slide_changer2)
                    @foreach($p1->slide_changer2 as $value)
                <div style="align-items: flex-start;
    background: #fff;
    border: 1px solid #d2d2d2;
    border-radius: 0.25rem;
    display: flex;
    height: 238px;
    justify-content: center;
    margin: 0 0.375rem 1.5rem;
    overflow: hidden;
    position: relative;
    text-decoration: none;
    width: 218px;
background-size: contain;
background-image:url({{asset('/storage/'.$value->image)}}" class="card cover   wow bounceInUp" data-wow-duration="2s">

                    <h2 class="c-title">
                        <span class="c-title-text">{{$value->heading}}</span>
                        @if($value->btn_show)
                        <a class="button light c-button" target="_blank" href="{{$value->btn_link}}">
                            {{$value->btn_text}} </a>
                           @endif
                    </h2>
                </div>
                    @endforeach
                @endif

            </div>
        </section>

    </div>
@endsection
@push('scripts')

    <script src="{{ asset('js/site/classie.js')}}"></script>
    <script src="{{ asset('js/site/skrollr.min.js')}}"></script>
    <script src="{{ asset('js/site/YouTubePopUp.jquery.js')}}"></script>
    <script src="{{ asset('js/site/wow.min.js')}}"></script>
    <script src="{{ asset('js/site/jquery.fractionslider.js')}}"></script>
    <script src="{{ asset('js/site/jquery.backTop.min.js')}}"></script>
    <script type="text/javascript">
        if (document.addEventListener) {

            document.addEventListener('DOMContentLoaded', Focus.init, false);

        }

        else if (document.attachEvent) {

            document.attachEvent('on' + 'DOMContentLoaded', Focus.init);

        }


    </script>
    <script type="text/javascript">


        $(function () {

            if ($('.wow').hasClass('animated')) {
                $(this).removeClass('animated');
                $(this).removeAttr('style');
                new WOW().init();
            }
            $('.linksscroll').click(function () {

                var getID = $(this).data('id');

                //alert(getID);

                //$('#nav-toggle2').click();



                //$('.linksscroll').removeClass('activetop');

                if (getID != 'homeTop') {

                    //alert($("#"+getID+"-link").offset().top);

                    $('html, body').animate({

                        scrollTop: $("#" + getID).offset().top

                    }, 2000);

                } else {

                    //alert(getID);

                    $('html, body').animate({

                        scrollTop: 0

                    }, 2000);

                }

                //$("#"+getID+"-link").addClass('activetop');

            });



            $('ul.navbar-nav li.dropdown > a').click(function () {

                $(this).parent().toggleClass('active');

            });



            /*$('ul.navbar-nav > li.dropdown.active > a').click(function(){

              $(this).parent().removeClass('active');

            });*/

            $('#scrollTop').click(function (e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 500);
            });



        });

    </script>
    <script type="text/javascript">
        $(function () {

            $(".videoBtn").YouTubePopUp();


            skrollr.init({
                smoothScbounceInLeftg: false,
                mobileDeceleration: 0.004
            });
            $(document.body).css("height", "auto");
            $(".revealOnScroll:not(.animated)").each(function () {
                var $this = $(this),
                    offsetTop = $this.offset().top;

                if (scrolled + win_height_padded > offsetTop) {
                    if ($this.data('timeout')) {
                        window.setTimeout(function () {
                            $this.addClass('animated ' + $this.data('animation'));
                        }, parseInt($this.data('timeout'), 10));
                    } else {
                        $this.addClass('animated ' + $this.data('animation'));
                    }
                }
            });
            // Hidden...
            $(".revealOnScroll.animated").each(function (index) {
                var $this = $(this),
                    offsetTop = $this.offset().top;
                if (scrolled + win_height_padded < offsetTop) {
                    $(this).removeClass('animated fadeInUp flipInX lightSpeedIn')
                }
            });
        })
    </script>
@endpush
