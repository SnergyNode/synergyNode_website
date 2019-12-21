<?php $title = 'Synergy Node - Articles';
    $active['articles'] = 'active';
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
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-left">Related to <span style="color: orangered">{{ $tag }}</span></h6>
                            <hr>
                        </div>
                        @forelse($articles as $article)
                            <div class="col-md-12">

                                <div>
                                    <div class="card" style="border-radius: 0">
                                        <a href="{{ route('home.blog.show',$article->slug ) }}" class="card-img">
                                            <div class="img-frame" style="max-height: 250px; overflow: hidden;">
                                                <img src="{{ url($article->banner) }}" alt="">
                                            </div>
                                        </a>
                                        <div class="" style="padding-top: 5px">
                                            <p class="col-md-12 gray-text text-left">
                                                <small>
                                                    SYNERGY<b style="color: orangered">NODE</b> ARTICLE | UPDATED: {{ date('F d, Y', strtotime($article->updated_at)) }}
                                                </small>
                                            </p>

                                            <h5 class="text-left col-md-12" style="color: orangered">
                                                <a href="{{ route('home.blog.show',$article->slug ) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h5>
                                            <p class="text-left col-md-12"><small>
                                                    {{ $article->desc }}
                                                </small>
                                            </p>

                                        </div>
                                        <div class="card-footer tagfoot">
                                            @include('pages.blog.relative')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center" style="width: 100%">
                                <span style="font-size: 50px; color: red"><i class="fa fa-newspaper-o"></i></span>
                                <b>No Publications at the moment... Check back later. Thanks.</b>
                            </p>
                        @endforelse

                    </div>
                </div>
                <div class="col-md-3">
                    @include('pages.blog.sidenav')
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
