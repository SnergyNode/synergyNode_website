<?php
    $active['articles'] = 'active';
    $title = $article->title;
    $description = $article->desc;
?>
@extends('layouts.app')

@section('content')
    @include('pages.layout.header')
    <!--slider start-->
   @include('pages.layout.particles')

    <!--start services-->

    <section id="services" class="all-space" style="min-height: 70vh">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding: 0">
                    <div class="card">
                        <div class="card-img">
                            <div class="img-frame" style="max-height: 400px; overflow: hidden">
                                <img src="{{ url($article->banner) }}" alt="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row" style="margin-top: 50px">
                                <p class="col-md-12 gray-text" style="text-align: left;">
                                    <small>
                                        SYNERGY<b style="color: orangered">NODE</b> ARTICLE | UPDATED: {{ date('F d, Y', strtotime($article->updated_at)) }}
                                    </small>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="text-align: start">
                                    {!! $article->detail !!}
                                </div>

                            </div>
                            <br>
                            <div class="" style="border: 0.1em solid transparent; border-top-color: rgba(0,0,0,0.11); margin-top: 50px;min-height: 60px ">
                                <div id="disqus_thread"></div>
                                <script>

                                    /**
                                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                                    var disqus_config = function () {
                                        this.page.url = "{{ route('home.blog.show',$article->slug ) }}";  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = "{{ $article->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };

                                    (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document, s = d.createElement('script');
                                        s.src = 'https://synergynode.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                            </div>
                            <div class="row" style="border: 0.1em solid transparent; border-top-color: rgba(0,0,0,0.11); margin-top: 50px;min-height: 60px;padding-top: 10px ">
                                @include('pages.blog.relative')
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="height-60"> </div>
    <!-- footer Section -->
    <!-- <div class="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3555.6723566350543!2d75.69413081435708!3d26.97727316380369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db2d041388711%3A0x300004512954193e!2sNiwaru+Rd%2C+Peethawas%2C+Rajasthan+302012!5e0!3m2!1sen!2sin!4v1473494573015" allowfullscreen></iframe>
     </div>-->

    <!-- footer Section -->
    @include('pages.include.footer')
@endsection
