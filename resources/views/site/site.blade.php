@extends('layouts.app-site')
@section('content')
    <section class="bannerSection">
        <div class="book"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-slide-type="img"><img src="{{ asset('images/site/1.jpg') }}" class="img-fluid" />
                            <div class="setTextPosition">
                                <p class="captionh1">COLOP e-mark</p>
                                <p class="captiondesc">Marking a new era</p>
                                <p class="captionh2">COLOP e-mark</p>
                            </div>
                        </div>
                        <div class="swiper-slide" data-slide-type="img"><img src="{{ asset('images/site/2.jpg') }}" class="img-fluid" />
                            <div class="setTextPosition">
                                <p class="captionh1">COLOP e-mark</p>
                                <p class="captiondesc">Marking a new era</p>
                                <p class="captionh2">COLOP e-mark</p>
                            </div>
                        </div>
                        <div class="swiper-slide" data-slide-type="img"><img src="{{ asset('images/site/3.jpg') }}" class="img-fluid" />
                            <div class="setTextPosition">
                                <p class="captionh1">COLOP e-mark</p>
                                <p class="captiondesc">Marking a new era</p>
                                <p class="captionh2">COLOP e-mark</p>
                            </div>
                        </div>
<!--                        <div class="swiper-slide" data-slide-type="vdo">
                            <video id="my-player" class="video-js" controls preload="auto" data-setup='{}'>
                                <source src="{{ asset('images/site/bannervideo.mp4') }}" type="video/mp4" class="img-fluid">
                                </source>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank" class="img-fluid">
                                        supports HTML5 video
                                    </a>
                                </p>
                            </video>
                            <div class="setTextPosition">
                                <p class="captionh1">COLOP e-mark</p>
                                <p class="captiondesc">Marking a new era</p>
                                <p class="captionh2">COLOP e-mark</p>
                            </div>
                        </div>-->

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="productSection mt-5 mb-5 pt-5" data-aos="fade-up">
        <div class="container-fluid">

            <div id="owl-carousel" class="owl-carousel">

                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt=""></div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt=""></div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt=""></div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt=""></div>
                </div>


            </div>

        </div>
    </section>
    <section class="productSection mt-5 mb-5" data-aos="fade-up">
        <div class="container-fluid">
            <div id="owl-carousel2" class="owl-carousel">

                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                        <div class="product-logo"><img src="{{ asset('images/site/p2.jpg') }}" alt=""></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_s4"> <img src="{{ asset('images/site/p1.jpg') }}" alt="">
                        <div class="product-title">Title</div>
                        <div class="product-logo"><img src="{{ asset('images/site/p2.jpg') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sectionOne" data-aos="fade-up">
        <section class="sec_2">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-7">
                        <div class="sec2_right">
                            <h2 class="head_underline left">Minimizing the Chances of Contracting.</h2>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium consequuntur unde
                                cum,Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium consequuntur unde
                                cum,Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum accusantium consequuntur unde
                                cum,</p>
                            <div class="mt-4">
                                <button class="main_btn btn_blue">Read More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img src="{{ asset('images/site/earth.gif') }}" alt="earth">
                    </div>
                </div>
                <div id="accordion" class="accordion mt-2 mb-2">
                    <div class="card" data-aos="fade-up">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                <p>Why Should I buy Cepholo Safety Pins?</p>
                                <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                            <div class="card-body">
                                At Wenrook we make no compromise on quality of our products.
                                When it comes to quality and long lasting material, we cut no
                                corners. Our aim is to deliver high quality and sturdy pins to
                                our customers.
                            </div>
                        </div>
                    </div>
                    <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                    aria-controls="collapseTwo">
                                <p>Do you do Quality checks ?</p>
                                <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Yes we do. As a matter of fact every lot goes through strict
                                quality checks just to make sure that product quality and
                                consistency is same whenever a customer buys our products.
                            </div>
                        </div>
                    </div>
                    <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header" id="headingThree">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                    aria-controls="collapseThree">
                                <p>Do these pins come in a box ?</p>
                                <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Yes, we have designed a plastic box to keep all sizes organized
                                for you. So whenever you need any size you don’t have to sort
                                through all those pins.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="ebarkSection" data-aos="fade-up">
        <section>
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('images/site/ebark.jpg') }}" alt="ebark" style="width: 150px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="sec2_right">
                            <h2 class="head_underline left">A New Level Of Document Security</h2>
                            <p>
                                The falsification of documents is easier than ever before.</p>
                            <p>Documents can be ordered illegally via the internet or simply forged on the basis of a suitable
                                template .</p>

                            <p>The damage to the economy and society is immense.</p>
                            <p>With the emark secure we provide a unique solution for forgery-proof protection and easy verification
                                of important physical and digital documents, fully mobile and useable everywhere.</p>

                            <div class="mt-4">
                                <button class="main_btn btn_blue">Read More</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
    <section class="newsSection" data-aos="fade-up">
        <section class="sec_2 spacing">
            <div class="container text-center">
                <div class="main_head">
                    <h2 class="head_underline">News and Blogs</h2>

                </div>
                <div class="s2_bot">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="s2_box">
                                <div class="s2_img">
                                    <img class="box-image" src="{{ asset('images/site/news1.png') }}" alt="">
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="s2_box">
                                <div class="s2_img">
                                    <img class="box-image" src="{{ asset('images/site/news2.png') }}" alt="">
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="s2_box">
                                <div class="s2_img">
                                    <img class="box-image" src="{{ asset('images/site/news3.png') }}" alt="">
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="s2_box">
                                <div class="s2_img">
                                    <img class="box-image" src="{{ asset('images/site/news4.png') }}" alt="">
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="mt-4 mb-2">
                            <button class="main_btn btn_blue">Show Older</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="parralaxSection" data-aos="fade-up"></section>
    <section class="sectionThree" data-aos="fade-up">
        <section class="sec_3" id="choose">
            <div class="container">
                <div class="sec3_bot">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sec3_box" data-aos="fade-up">
                                <img src="{{ asset('images/site/why_choose01.png') }}" alt="">
                                <h3 class="head_underline_small">Property Insurance</h3>
                                <span class="underline_head"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur
                                    exercitationem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="sectionFour">
        <div class="container-fluid">
            <div class="row">
                <div class="parallax focus1"></div>
            </div>
        </div>
    </section>
    <section class="videoSection" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="video-preview-overlay"></div>
                <video id="my-player" class="video-js" controls preload="auto" data-setup='{}' autoplay>
                    <source src="{{ asset('images/site/bannervideo.mp4') }}" type="video/mp4" class="img-fluid">
                    </source>
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank" class="img-fluid">
                            supports HTML5 video
                        </a>
                    </p>
                </video>
            </div>
        </div>
    </section>
    <section class="sectionFive" data-aos="fade-up">
        <div class="container-fluid">
            <div class="row">
                <img src="{{ asset('images/site/glassess.jpg') }}" class="img-fluid w-100" />
            </div>
        </div>
    </section>

    <section class="sectionSeven " data-aos="fade-up">
        <div class="container">

        </div>
    </section>
@endsection
