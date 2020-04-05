<?php $version = 0.04; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="website, webapp, mobile, mobile app, mobile-app, free, free website, grow, business, grow business, synergy, synergy node, synergynode, IT, Information Technology, connecting">
    <meta name="description" content="{{ !empty($description)?$description:'Looking for a new website for your small business? Do you desire a mobile or web app for your business or idea? Synergy node is at your disposal to provide solutions!'}}"/>
    <meta name="title" content="{{ !empty($title)?$title:'Synergynode, connecting IT solutions with Pure Imagination.'}}">
    <meta name="author" content="synergynode">
    <meta property="og:description" content="{{ !empty($description)?$description:'Looking for a new website for your small business? Do you desire a mobile or web app for your business or idea? Synergy node is at your disposal to provide solutions!'}}">
    <meta property="og:title" content="{{ !empty($title)?$title:'Synergynode, connecting IT solutions with Pure Imagination.'}}">
    <meta name="twitter:description" content="{{ !empty($description)?$description:'Looking for a new website for your small business? Do you desire a mobile or web app for your business or idea? Synergy node is at your disposal to provide solutions!'}}">
    <meta name="twitter:title" content="{{ !empty($title)?$title:'Synergynode, connecting IT solutions with Pure Imagination.'}}">


    <title>{{ !empty($title)?$title:'Synergy Node - Official Home Page' }}</title>

    <!-- site icon -->
    <link rel="shortcut icon" href="{{ asset("images/synergy_1.png") }}" type="image/x-icon"/>

    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset("images/synergy_1.png") }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("images/synergy_1.png") }}" />

    <!-- color -->
    <meta name="theme-color" content="#FF4D00">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset("assets/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset("assets/flexslider/flexslider.css") }}" rel="stylesheet">
    <link href="{{ asset("css/scrolling-nav.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("css/responsive.css") }}" rel="stylesheet">
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="fontawesome/css/fontawesome-all.css"> -->
    <!--   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="{{ asset("css/headline.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/ionicons/css/ionicons.min.css") }}" rel="stylesheet">
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset("assets/owl-carousel/owl.carousel.css") }}">
    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset("assets/owl-carousel/owl.theme.css") }}">
    <link rel="stylesheet" href="{{ asset("css/synergy.css?v=".$version) }}">
    <link rel="stylesheet" href="{{ asset("css/particle_style.css") }}">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147153879-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-147153879-1');
</script>


</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar">
    @include('.include.preload')

    @yield('content')

    <a href="javascript:;" class="scrollTop back-to-top" id="back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>
        <!-- jQuery plugins-->
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
    <script src="{{ asset("js/scrolling-nav.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
    <!--valid / working contact form js-->
    @if(@$skip['cmjs'])

    @else
        <script src="{{ asset("mail/contact_me.js?v=".$version) }}"></script>
    @endif

    <script src="{{ asset("js/jqBootstrapValidation.js") }}"></script>
    <script src="{{ asset("assets/owl-carousel/owl.carousel.js") }}"></script>
    <!--custom js-->
    <script src="{{ asset("js/custom.js") }}"></script>
    {{--<script src="http://localhost:6565/socket.io/socket.io.js"></script>--}}
    {{--<script src="http://synergynode.openode.io/socket.io/socket.io.js"></script>--}}
    {{--<script src="{{ asset("js/socket.io_2.js") }}"></script>--}}
    <script src="https://hyvecore.herokuapp.com/socket.io/socket.io.js"></script>
    <script src="{{ asset("js/synergy.js") }}"></script>
    <script  src="{{ asset("js/paticlez.js") }}"></script>
    <script  src="{{ asset("js/index.js") }}"></script>
    <script  src="{{ asset("js/socket_emit.js") }}"></script>
</body>

</html>