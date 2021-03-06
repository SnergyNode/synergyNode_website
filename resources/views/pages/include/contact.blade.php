<section id="contact" class="text-center">
    <div class="height-60"> </div>
    <div class="container">
        <div class="row no-margin  ">
            <div class="col-lg-12  text-center ">
                <h1 class="section-heading">GET IN TOUCH </h1>
                <p> Get in touch with us any time, our support team are available for our clients 24 hours </p>
            </div>
        </div>
        <div class="height-60"> </div>
        <div class="row ">
            <div class="col-md-6 col-sm-6 ">
                <div class="row">
                    <div class="col-md-12 contact "> <i class="fa fa-map-marker fa-2x"></i>
                        <p class="dark pad-b-5">{{ $synergy->adrs }}</p>
                    </div>
                    <div class="col-md-12 contact  "> <i class="fa fa-envelope-o fa-2x"></i>
                        <p class="dark pad-b-5">{{ $synergy->mail2 }}
                        </p>
                    </div>
                    <div class="col-md-12 contact   "> <i class="fa fa-phone fa-2x"></i>
                        <p class="dark pad-b-5">{{ $synergy->tel1 }}, <br> {{ $synergy->tel2 }}
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="scrollReveal sr-right sr-delay-1">

                    <?php
                    $randa = random_int(0, 6);
                    $randb = random_int(4, 9);
                    $summed = $randa + $randb;
                    ?>
                    <form name="sentMessage" id="contactForm" method="post" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" class="" value="{{ encrypt($summed) }}" name="summed" id="summed">
                        <div class="row">
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-12 control-group">
                                <div class="form-group controls">
                                    <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <label> <i>( Sum of {{ $randa ." & ".$randb }} ) </i></label>
                                    <input type="text" class="form-control" placeholder="Your Answer" id="verify" autocomplete="off" required data-validation-required-message="Please enter answer to the question">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <label>Submit</label>
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-lg btn-white-border btn-block mt-1">Send Message</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>