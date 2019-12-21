<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ !empty($adTitle)?$adTitle:'Dashboard' }}</title>

    <!-- site icon -->
    {{--<link rel="shortcut icon" href="{{ \App\Settin::first()->setLogo() }}" type="image/x-icon"/>--}}
    <link rel="shortcut icon" href="{{ url("images/logo2.png") }}" type="image/x-icon"/>

    <link rel="apple-touch-icon" sizes="120x120" href="{{ url("images/logo2.png") }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url("images/logo2.png") }}" />


    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link href="{{ asset("assets/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">

    <link href="{{ asset("css/layout.css") }}" rel="stylesheet">

    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("css/synergyadmin.css") }}" rel="stylesheet" >
    <link href="{{ asset("assets/ionicons/css/ionicons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/admin_responsive.css") }}" rel="stylesheet">
    <link href="{{ asset("css/admin.css") }}" rel="stylesheet">
    <link href="{{ asset("css/jquery.modal.min.css") }}" rel="stylesheet">



</head>
<body>
<div class="wrapper">

    <div id="ex1" class="modal">
        <p>Thanks for clicking. That felt good.</p>
        <a href="#" rel="modal:close">Close</a>
    </div>

    @include('admin.include.sidebar')

    <div class="overlay"></div>



    <div id="content">
        @include('admin.include.navbar')

        <div class="main-content">
            <br>
            <div class="col-12" style="margin-top: 50px">

                <!-- Contents START -->
            @yield('content')

            <!-- Contents END -->

            </div>
        </div>

    </div>
    <!-- Dark Overlay element -->


</div>

<!-- Scripts -->
<script src="{{ asset("assets/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ asset("assets/tether/dist/js/tether.min.js") }}"></script>
<script src="{{ asset("assets/flexslider/jquery.flexslider-min.js") }}"></script>
<script src="{{ asset("assets/scrollreveal/dist/scrollreveal.min.js") }}"></script>
<script src="{{ asset("js/modernizr.js") }}"></script>
<script src="{{ asset("assets/jarallax/dist/jarallax.min.js") }}"></script>
<script src="{{ asset("assets/jarallax/dist/jarallax-video.min.js") }}"></script>
<!-- jQuery -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset("assets/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- Scrolling Nav JavaScript -->
<script src="{{ asset("js/jquery.easing.min.js") }}"></script>
<script src="{{ asset("js/jquery.modal.min.js") }}"></script>
<script src="https://hyvecore.herokuapp.com/socket.io/socket.io.js"></script>
{{--<script src="{{ asset("js/socket.io_2.js") }}"></script>--}}
<script src="{{ asset("js/scrolling-nav.js") }}"></script>

<!--valid / working contact form js-->
<script src="{{ asset("assets/owl-carousel/owl.carousel.js") }}"></script>

<script src="{{ asset("js/admin.js") }}"></script>

<!--custom js-->

@if(isset($jslinks))
    @foreach($jslinks as $link)
        <script src="{{ asset('js/'.$link) }}"></script>
    @endforeach
@endif
</body>
</html>
