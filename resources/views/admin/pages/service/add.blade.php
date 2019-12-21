<?php
$active['servic'] = 'nav-active';
$adTitle = 'Dashboard/New Service';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('servic.index') }}">Our Services</a></li>
                <li class="breadcrumb-item"><span><b>New Services</b></span></li>
            </ol>
        </nav>
        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <br>
        <br>
        <h3>New Services</h3>
        <hr>

        <div class="" style="margin-top: 50px">

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('servic.store') }}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                               <div class="row">
                                   <div class="col-md-2 control-group">
                                       <div class="form-group controls">
                                           <h3 class="ionico text-right"><i class=""></i></h3>
                                       </div>
                                   </div>
                                   <div class="col-md-10 control-group">
                                       <div class="form-group controls">
                                           <input type="text" class="form-control" onkeyup="$('.ionico > i').attr('class', $(this).val())" placeholder="ion icon class. e.g: ion-android-desktop" name="icon" value="{{ old('icon') }}" required>
                                       </div>
                                   </div>

                               </div>
                            </div>

                            <div class="col-md-12 control-group">
                                <p id="intro_left">{{ strlen(old('intro')) }}</p>
                                <div class="form-group controls">
                                    <textarea onkeyup="$('#intro_left').text($(this).val().length)" rows="3" class="form-control" placeholder="Intro: max character: 280, min character: 70," name="intro" required>{{ old('intro') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12 control-group">
                                <div class="form-group controls">
                                    <textarea rows="12" class="myfield form-control" placeholder="Detail. Should match intro" name="detail" required>{!! old('detail') !!} </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <textarea rows="1" class="form-control" placeholder="live-url" name="live_url" required>{{ old('live_url') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-white-border">Create Service</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @include('admin.include.tinymyce')
@endsection