<section id="services" class="all-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  scrollReveal sr-bottom sr-ease-in-out-quad sr-delay-1">
                <h1 class="section-heading">services</h1>
                <p>If you can think it, we can help you bring it to life</p>
            </div>
        </div>
        <div class="height-60"> </div>
        <div class="row">
            <div class="col-md-8 offset-md-2   col-sm-12">
                <ul class="row list-unstyled services-list">
                    @foreach($services as $service)
                        <li onclick="goto('{{ route('home.service',$service->live_url) }}')" class="col-sm-6  clearfix scrollReveal sr-bottom">

                        <i class="{{ $service->icon }}"></i>
                        <div class="content">
                            <h4>{{ $service->title }}</h4>
                            <p>
                                {{ $service->intro }}
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <!--service list end-->
            </div>
        </div>
        <!--row end-->
        <hr>
        <div class="height-40"></div>
        <div class="text-center scrollReveal sr-bottom">
            <h3>Want to see more? Take a peek ...</h3>
            <a href="#work" class="btn btn-dark-border btn-lg page-scroll">Our Portfolio</a>
        </div>
    </div>
</section>