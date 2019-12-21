<?php
$active['client'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
                <li class="breadcrumb-item"><span><b>New Person</b></span></li>
            </ol>
        </nav>
        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <br>
        <br>
        <h3>New Client</h3>
        <hr>

        <div class="" style="margin-top: 50px">

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('client.store') }}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* first name</p>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* last name</p>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* email</p>
                                    <input type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* telephone</p>
                                    <input type="text" class="form-control" placeholder="phone" name="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>


                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* username</p>
                                    <input type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6 control-group">
                                <p> * Passport Image <small>500kb Max , Must be Image File Type</small></p>
                                <input type="file" name="passport" accept="image/*" onchange="shwimg()" id="imgInp" required>

                                <br>
                                <br>
                                <div class=" dark-t-bg" style="max-width: 200px; padding: 0; border-radius: 5px; margin: 0 auto">
                                    <img id="imgtoshow"  src="{{ url('image/default.png') }}" class="img-fit mid-size" alt="">
                                </div>
                                <br>

                            </div>

                            <div class="col-md-12 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* Home Address</p>
                                    <textarea rows="2" class="form-control" placeholder="Home Address" name="address" required>{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* Office Address</p>
                                    <textarea rows="2" class="form-control" placeholder="Office Address" name="office" required>{{ old('office') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg btn-white-border">Create Person</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection