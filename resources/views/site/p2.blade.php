@extends('layouts.app-site')
@section('content')
    @push('css_scripts_p1')
        <link href="{{ asset('dist/assets/css/p2.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/index_ipad.css') }}" rel="stylesheet"  />
        <link href="{{ asset('css/client/YouTubePopUp.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/aos.css') }}" rel="stylesheet" />

        <style>
            .font-class {
                font-family: "Calibri"!important;
            }
        </style>
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
    {{--<div class="mobile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"><img src="./dist/assets/img/p1/pr_1623845119_BPcreate2.jpg" class="full-img"></div>
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <h2 class="fontStyle">COLOP E-MARK CREATE</h2>
                            <p class="site-description fontStyle">CUSTOMIZED YOUR IDEA </p>

                            <a href="https://www.youtube.com/watch?v=BGY2jQY?t=8" class="videoBtn"><img width="70"
                                                                                                        src="./dist/assets/img/p1/video-btn.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 p-0">

                    <img src="./dist/assets/img/p1/pr_1624278534_T1.jpg" class="full-img">

                </div>
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center p-0">
                        <div class="col-sm-10 p-0">
                            <h2 class="fontStyle">CRAFTING</h2>
                            <p class="fontStyle">Better organise your home or workplace by sorting and labeling shelves, preserve
                                jars, lunch boxes, tools or materials in a garage. Either print directly on your items or use our label
                                sheets!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 p-0"><img src="./dist/assets/img/p1/pr_1624278534_T2.jpg" class="full-img"></div>
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center p-0">
                        <div class="col-sm-10 p-0">
                            <h2 class="fontStyle">CUSTOMISING </h2>
                            <p class="fontStyle">Make your own creations with the e-mark create - be it scrapbooking, journals,
                                greeting cards, cake toppers, or your own jewelry. There are no limits to your creativity - just make
                                it!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 p-0"><img src="./dist/assets/img/p1/pr_1624278534_T3.jpg" class="full-img"></div>
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center p-0">
                        <div class="col-sm-10 p-0">
                            <h2 class="fontStyle">CELEBRATING</h2>
                            <p class="fontStyle">It's time to celebrate! There is always something coming up: birthdays, christmas,
                                easter, weddings,... The e-mark create helps to make beautiful invitations, decorations and even to
                                personalise your gifts. Prepare everything ahead to make the day very special - napkins with names of
                                guests, wristbands with a personal message, customised decorations and much more</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 p-0"><img src="./dist/assets/img/p1/pr_1623846137_PP4.jpg" class="full-img"></div>
                <div class="col-sm-12 text-center intro">
                    <div class="row justify-content-center p-0">
                        <div class="col-sm-10 p-0">
                            <h2 class="fontStyle">ORGANISING</h2>
                            <p class="fontStyle">You love to give everything a personal touch? We do too! With the e-mark create it's
                                so easy to make your own designs and print them on wrapping paper, ribbons, little gifts or other
                                personal items. It's never been so easy to personalise your homemade creations or items for your loved
                                ones!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <div class="row">

        <div style="background: url({{asset('storage/'.$p2->bg_image)}}) no-repeat !important;" class="h-100vh col-sm main-title p-0 flexLeftAlign  position-relative p2Banner">
            <div class="p2BannerTop">
                <h1 class="fontStyle  pl-5 wow bounceInDown " data-wow-duration="1s" data-wow-iteration="1">{{$p2->title}}</h1>
                <p class="site-description fontStyle  pl-5 mb-2 wow bounceInDown " data-wow-duration="2s"
                   data-wow-iteration="1">
                    {{$p2->description}}</p>
            </div>
            <div class="p2BannerBottom">
                <a href="{{$p2->link}}" target="_blank" data-wow-duration="3s" data-wow-iteration="1"
                   class="wow bounceInDown ml-5 videoBtn btn-vid btn-vid-primary bla-1"><i class="fa fa-caret-right"></i> Watch
                    Video</a>
            </div>

            <span class="p2Card">
        <div class="c-cardP2">
          <div class="c-card_b">
            <img src="{{ asset('storage/'.$p2->image)}}" loading="lazy" sizes="100vw" alt="" class="img-fluid w-450">
          </div>
        </div>
      </span>


        </div>

    </div>
    <div class="desktop">
        <!--my html -->
        <article class="panel">
            @foreach($p2->slide_changer_1 as $index => $slide)
            <div class="container-fluid bgWhite">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-content clearfix">
                            <div class="wrap clearfix">
                                    <div class="entry-header">
                                        <h2 class="entry-title bounceInLeft  wow" data-wow-duration="1s">{{$slide->title}}</h2>
                                    </div><!-- .entry-header -->
                                    <div class="entry-content bounceInRight  wow" data-wow-duration="2s">
                                        <p>{{$slide->description}}</p>
                                        <div class="sep20px">&nbsp;</div>
                                        <a href="{{$slide->button_link}}" class="specbtn" target="_blank">Specifications</a>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--row-->
            </div>
            <!--container-fluid-->
            <div class="container-fluid p-0">
                @if($p2->slide_changer_2->count() > $index)
                    @php $slide2 = $p2->slide_changer_2[$index]; @endphp
                    <div class="panel-image" style="background-image:url({{asset('storage/'.$slide2->bg_image)}});">
                        <div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
                            <video class="jquery-background-video" autoplay="" muted="" loop="">
                                <source src="./dist/assets/img/p1/pr_1626612712_B2.GEMINI.jpg" type="video/mp4">
                                <source src="./dist/assets/img/p1/pr_1626612712_B2.GEMINI.jpg" type="video/webm">
                                <source src="./dist/assets/img/p1/pr_1626612712_B2.GEMINI.jpg" type="video/ogg">
                            </video>
                        </div>
                        <div class="p3centerCard">
                            <h1 class="wow bounceInUp" data-wow-duration="1s">{{$slide2->title}}</h1>
                            <p class="wow bounceInUp" data-wow-duration="2s">{{$slide2->description}}.</p>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </article>
        <!--my html -->
        <article class="panel">

            <!--container-fluid-->
            <div class="container-fluid p-0 p2LastSection">
                @foreach($p2->slide_changer_3 as $index => $slide3)
                    <div class="row">
                        <div class="col p-0 wow bounceInLeft" data-wow-duration="1s">
                            <div class="position-relative p2Item">
                                <a class="p2-card-image" style="background-image:url({{asset('storage/'.$slide3->image)}});"
                                   href="{{asset('storage/'.$slide3->image)}}" data-lightbox="image-1">
                                </a>
                            </div>
                        </div>
                        <div class="col p-0 wow bounceInUp" data-wow-duration="2s">
                            <div class="position-relative p2Item">
                                <div class="p2-card-image">
                                </div>
                                <div class="product-detail overlay">
                                    <h1>{{$slide3->title}}</h1>
                                </div>
                            </div>
                        </div>
                        @if(isset($p2->slide_changer_3[$index+1]))
                            <?php $slide4 = $p2->slide_changer_3[$index+1]; ?>
                            <div class="col p-0 wow bounceInUp" data-wow-duration="3s">
                                <div class="position-relative p2Item">
                                    <a class="p2-card-image" style="background-image:url({{asset('storage/'.$slide4->image)}});"
                                       href="{{asset('storage/'.$slide4->image)}}" data-lightbox="image-1">
                                    </a>
                                </div>
                            </div>
                            <div class="col p-0 wow bounceInRight" data-wow-duration="4s">
                                <div class="position-relative p2Item">
                                    <div class="p2-card-image">
                                    </div>
                                    <div class="product-detail overlay">
                                        <h1>{{$slide4->title}}</h1>
                                    </div>
                                </div>
                            </div>
                            <?php $index++; ?>
                        @endif
                    </div>
                @endforeach
            </div>
        </article>
        <!--my html-->
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
        $(document).ready(function () {
        //Items
        var $card = $(".c-card_b");
        var $container = $(".innercustom");
        var $bike = $(".innercustom img");

        //Moving Animation Event
        $container.on("mousemove", function (e) {
            let xAxis = (window.innerWidth / 2 - e.clientX) / 30;
            let yAxis = (window.innerHeight / 2 - e.clientY) / 30;
            $card.css("transform", `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`);
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

        /* p1 card */
        var $cardP1 = $(".p1Card .c-card_b");
        var $containerP1 = $(".p1Card");
        var $bikeP1 = $(".p1Card img");

        //Moving Animation Event
        $containerP1.on("mousemove", function (e) {
            let xAxisP1 = (window.innerWidth / 2 - e.clientX) / 30;
            let yAxisP1 = (window.innerHeight / 2 - e.clientY) / 30;
            $card.css("transform", `rotateY(${xAxisP1}deg) rotateX(${yAxisP1}deg)`);
        });

        //Animate on Hover
        $containerP1.hover(function () {
            $cardP1.toggleClass("has-transform");
            $bikeP1.toggleClass("has-transform");
        });

        //Pop Back on mouseleave
        $containerP1.on("mouseleave", function () {
            $cardP1.css("transform", `rotateY(0deg) rotateX(0deg)`);
        });
        /* p1 card */
        });
        WOW.prototype.addBox = function(element) {
            this.boxes.push(element);
        };
        wow = new WOW();
        wow.init();

        var checkWOWJsReset = function() {
            var resetWOWJsAnimation = function() {
                var $that = $(this);

                // determine if container is in viewport
                // you might pass an offset in pixel - a negative offset will trigger loading earlier, a postive value later
                // credits @ https://stackoverflow.com/a/33979503/2379196
                var isInViewport = function($container, offset) {
                    var containerTop = $container.offset().top;
                    var containerBottom = containerTop + $container.outerHeight();

                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    return containerBottom > viewportTop && containerTop + offset < viewportBottom;
                };

                // only reset animation when no long in viewport and already animated (but not running)
                // you might want to use a different offset for isInViewport()
                if (!isInViewport($that, 0) && $that.css('animation-name') != 'none' && !$that.hasClass('animated')) {
                    $that.css({'visibility': 'hidden', 'animation-name': 'none'}); // reset animation
                    wow.addBox(this);
                }
            };
            $('.wow').each(resetWOWJsAnimation); // check if reset is necessary for any element
        };
        $(window).on('resize scroll', checkWOWJsReset);


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
