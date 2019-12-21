<!--top bar start-->
<header class="header fixed-top">
    <div class="top-bar w-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-inline list-unstyled">
                        <li class="list-inline-item"><a href="tel:+234 812-803-9141" class="pl-0"><i class="ion-ios-telephone"></i> +234 812-803-9141</a></li>
                        <li class="list-inline-item"><a href="mailto:support@synergynode.com"><i class="ion-ios-email"></i> support@synergynode.com</a></li>
                    </ul>
                </div>
                <!--top left col end-->
                <div class="col-sm-6 text-right hidden-md-down">
                    <ul class="list-inline top-socials list-unstyled">
                        <li class="list-inline-item"><a href="fb.me/synergynode"><i class="ion-social-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/SynergyN0de"><i class="ion-social-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li class="list-inline-item"><a href="www.instagram.com/synergynode/"><i class="ion-social-instagram"></i></a></li>
                    </ul>
                </div>
                <!--top social col end-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <!--top bar end-->
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse  header-transparent">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-ellipsis-h"></span>
            </button>
            <a class="navbar-brand page-scroll logo no-margin" href="{{ route('home') }}">SynergyNode</a>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="page-scroll nav-link" href="{{ route('home') }}#page-top" >HOME </a>
                    </li>
                    <li class="nav-item ">
                        <a class="page-scroll nav-link" href="{{ route('home') }}#about" >ABOUT</a>
                    </li>

                    <li class="nav-item {{ @$active['service'] }}">
                        <a class="page-scroll nav-link" href="{{ route('home') }}#services" >SERVICES</a>
                    </li>
                    <!--<li class="nav-item ">
                        <a class="page-scroll nav-link" href="index.html#team">TEAM</a>
                    </li>-->
                    <li class="nav-item ">
                        <a class="page-scroll nav-link" href="{{ route('home') }}#work" >WORK</a>
                    </li>
                    <li class="nav-item ">
                        <a class="page-scroll nav-link" href="{{ route('home') }}#clients">CLIENTS</a>
                    </li>
                    <li class="nav-item ">
                        <a class="page-scroll nav-link" href="{{ route('home') }}#contact">CONTACT US </a>
                    </li>
                    <li class="nav-item {{ @$active['articles'] }}">
                        <a class="page-scroll nav-link" href="{{ route('home.blog') }}">ARTICLE</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End of Container -->
    </nav>
</header>