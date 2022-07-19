<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.icon" >

    <title>Home</title>
    <!-- Icons for this template -->
    <link href="{{ asset('css/client/fonts/font-awesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/owl.theme.css') }}" />
    <link href="{{ asset('css/client/owl.carousel.min.css') }}" />


    <link href="{{ asset('css/app-client.css') }}" >

  <style>
        body {
            margin: 0 auto;
            font-family: Arial;
            background: #e4d6d6;
            background: url(https://ktechlb.com//uploads/configimages/bg_1620475455_wp2732954.jpg) top center;
            background-size: cover;
            width: 100%;
            height: 100%;
        }

        img {
            border: 0;
        }

        .logo {
            margin-top: 12%;
            margin-bottom: 10px;
        }

        .wrapper {
            background: rgba(153, 153, 153, 0.3);
        }

        .brands {
            margin: auto;
            width: 62%;
        }

        #owl-demo .item {
            margin-left: 2px;
            margin-right: 2px;
            border: #b5b5b5 solid 4px;
        }

        #owl-demo .item:hover {
            border: #ffffff solid 4px;

        }

        #owl-demo .item img {
            display: block;
            width: 100%;
            height: auto;
        }


        .newsleftarrow {
            position: absolute;
            top: 45%;
            left: -30px;
            filter: Alpha(Opacity=70);
            /*IE7 fix*/
            opacity: 0.7;
        }

        .newsleftarrow:hover {
            filter: Alpha(Opacity=100);
            /*IE7 fix*/
            opacity: 1;
        }

        .newsrightarrow {
            position: absolute;
            top: 45%;
            right: -30px;
            filter: Alpha(Opacity=70);
            /*IE7 fix*/
            opacity: 0.7;
        }

        .newsrightarrow:hover {
            filter: Alpha(Opacity=100);
            /*IE7 fix*/
            opacity: 1;
        }

        #bgk .newsleftarrow {
            visibility: hidden;
        }

        #bgk .newsrightarrow {
            visibility: hidden;
        }

        #bgk:hover .newsleftarrow {
            visibility: visible;
        }

        #bgk:hover .newsrightarrow {
            visibility: visible;
        }
    </style>
</head>

<body>
<div id="vue-host">
<div class="header">

    <div class="logo">
        <center><img src="/images/ktech/bg_1620476500_kanaan.png"></center>
    </div>

</div>
<div class="wrapper" id="bgk">
    <div class="brands">
        <div id="owl-demo" class="owl-carousel owl-theme">
            <div class="item active">

                <a href="#"><img alt="" src="/images/ktech/brdcover_1620476734_BRAND1.jpg"></a>
            </div>
            <div class="item">
                <a href="#"><img alt="" src="/images/ktech/brdcover_1620476862_BRAND2.jpg"></a>
            </div>
            <div class="item">
                <a href="#"><img alt="" src="/images/ktech/brdcover_1620476884_BRAND4.jpg"></a>
            </div>
            <div class="item">
                <a href="#"><img alt="" src="/images/ktech/brdcover_1620476884_BRAND4.jpg"></a>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <span
        style=" color:#fff !important; text-align: left; font-size: 14px!important; margin-left: 15px; display: block;">
      <p><span style="font-size: x-small;"><span style="font-family: Arial;">Copyright © </span></span><span
              style="font-size: xx-small;"><span style="font-family: Arial;">KANAAN</span>&nbsp;ADVANCED TECHNOLOGIES</span>
      </p>
    </span>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="/assets/js/vendor/jquery.slim.min.js"></script>
<script src="/assets/js/vendor/popper.min.js"></script>
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('js/app.js') }}" ></script>
<!-- build:js -->

<!-- endbuild -->
<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            navigation: true,
            itemsCustom: [
                [0, 1],
                [450, 1],
                [600, 2],
                [700, 3],
                [1000, 3],
                [1200, 3],
                [1400, 3],
                [1600, 3]
            ],
            pagination: false,
            navigationText: [
                "<img class='newsleftarrow' src='images/ktech/left-arrow.png'>",
                "<img class='newsrightarrow' src='images/ktech/right-arrow.png'>"
            ],
            afterInit: function (elem) {
                var that = this
                that.owlControls.prependTo(elem)
            }
        });

    });
</script>

</body>

</html>