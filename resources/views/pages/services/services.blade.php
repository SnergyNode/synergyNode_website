<?php $title = 'Synergy Node - ' . $service->title;
$active['service'] = 'active';
?>
@extends('layouts.app')

@section('content')
    @include('pages.layout.header')
    <!--slider start-->
   @include('pages.layout.particles')

    <!--start services-->

    <section id="services" class="all-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  scrollReveal sr-bottom sr-ease-in-out-quad sr-delay-1">
                    <h1 class="section-heading">{{ $service->title }}</h1>

                </div>
            </div>
            <div class="height-60"> </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 min-h-1 col-sm-12">
                    {{--sr-ease-in-out-quad scrollReveal sr-delay-2--}}
                    <div class="col-lg-12 sr-bottom " style="display: block;opacity:1 !important;">
                        <p style="font-size:18px">
                            {!! $service->detail  !!}
                        </p>
                    </div>

                    <!--service list end-->
                </div>
            </div>

        </div>
    </section>

    <!--end services-->

    <!-- client Section -->
    @include('pages.include.client')


    <!-- contact Section -->
    @include('pages.include.contact')


    <div class="height-60"> </div>
    <!-- footer Section -->
    <!-- <div class="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3555.6723566350543!2d75.69413081435708!3d26.97727316380369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db2d041388711%3A0x300004512954193e!2sNiwaru+Rd%2C+Peethawas%2C+Rajasthan+302012!5e0!3m2!1sen!2sin!4v1473494573015" allowfullscreen></iframe>
     </div>-->

    <!-- footer Section -->
    @include('pages.include.footer')
@endsection
