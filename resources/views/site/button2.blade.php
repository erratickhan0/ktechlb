@extends('layouts.app-site')
@section('content')
    @push('css_scripts_p1')
        <link href="{{ asset('css/client/p1.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/client/d1.css') }}" rel="stylesheet" />

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
    background-size: cover !important;
    height: 550px;
    /* margin-top: 85px; */
    margin-top: 37px;">
        <main role="main" class="innercustom">
            <h1 class="white-text cover-heading "
                style="display: block !important; visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;">
                {{$button2->title}}</h1>
            <p class="site-description">
                {{$button2->subtitle}}</p>
            <div class="c-card">
                <div class="c-card_b">
                    <img src="{{ asset('storage/'.$button2->image2) }}" loading="lazy" sizes="100vw" alt=""
                         class="img-fluid image-19">
                </div>
            </div>
        </main>
    </div>
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
@endsection
@push('scripts')
    <script >
        $(document).ready(function() {
            AOS.init({
                easing: 'ease-out-back',
                duration: 1000
            });


        });

    </script>

@endpush
