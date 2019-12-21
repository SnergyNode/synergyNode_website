<?php $title = 'Place your Quote - Synergy Node ' ;
$description = "Get your website by dropping a quote with us describing what you want and we will deliver it to you on short notice.";
?>
@extends('layouts.app')

@section('content')
    @include('pages.layout.header')
    <!--slider start-->
    @include('pages.layout.particles')

    <!--start services-->

    <div class="container">
        @include('admin.include.notify')
    </div>

    <section class="all-space">
        <div class="container">
            <div class="">
                <p>
                    <b>
                        Please fill the form below and describe what your perception of your web site, mobile app or enterprise application should achieve.
                    </b>
                </p>
            </div>
            <br>
            <form method="post" action="{{ route('quote.save') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>* your name</p>
                            <input type="text" class="form-control" placeholder="Full Name" name="yname" required >
                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>* your email</p>
                            <input type="email" class="form-control" placeholder="Email Address" name="yemail" required >

                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>your company/organisation name (if available)</p>
                            <input type="text" class="form-control" placeholder="Company Name" name="c_name"  >
                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>your company/organisation email (if available)</p>
                            <input type="email" class="form-control" placeholder="Corporate Email Address" name="c_email"  >

                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>* phone number</p>
                            <input type="text" class="form-control" placeholder="Phone number" name="phone" required >

                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>website (if available)</p>
                            <input type="text" class="form-control" placeholder="Current Website" name="website"  >

                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p>* your interest</p>
                            <select name="interest" id="" class="form-control" required>
                                <option value="Web">Website</option>
                                <option value="Mobile">Mobile App</option>
                                <option value="Enterprise">Enterprise App</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 control-group">
                        <div class="form-group controls">
                            <p> your time frame</p>
                            <select name="time_frame" id="" class="form-control" >
                                <option value=""></option>
                                <option value="1 week">1 week</option>
                                <option value="2 weeks">2 weeks</option>
                                <option value="3 weeks">3 weeks</option>
                                <option value="4 weeks">4 weeks</option>
                                <option value="5 weeks">5 weeks</option>
                                <option value="6 weeks">6 weeks</option>
                                <option value="3 months">3 months</option>
                                <option value="4 months">4 months</option>
                                <option value="5 months">5 months</option>
                                <option value="6 months">6 months</option>
                                <option value="7 months">7 months</option>
                                <option value="8 months">8 months</option>
                                <option value="9 months">9 months</option>
                                <option value="10 months">10 months</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 control-group">
                        <div class="form-group controls">
                            <p> describe your needs</p>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required ></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-white-border">Submit Quote</button>
            </form>
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
