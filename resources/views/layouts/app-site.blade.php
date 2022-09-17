<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ktechlb Site') }}</title>
    <link href="https://fonts.cdnfonts.com/css/microsoft-yahei" rel="stylesheet" >

    <link href="{{ asset('css/client/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/video-js.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/client/aos.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-client.css') }}" rel="stylesheet" type="text/css" />
    @stack('css_scripts')

</head>

<body class="{{ $class ?? '' }}">
    <div id="vue-host">

        @include('layouts.headers.site-header')
        <div class="main-content">
            @yield('content')
        </div>
        @include('layouts.footers.site-footer')

    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/site/swiper.min.js')}}"></script>
    <script src="{{ asset('js/site/video.min.js')}}"></script>
    <script src="{{ asset('js/site/aos.js')}}"></script>
    <script src="{{ asset('js/site/FontAwesome.js')}}"></script>
    @stack('scripts')


</body>

</html>
