<?php
$active['servic'] = 'nav-active';
$adTitle = 'Dashboard/Edit Service';
?>

@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('servic.index') }}">Services</a></li>
                <li class="breadcrumb-item"><a href="{{ route('servic.show', $service->unid) }}">{{ $service->title }}</a></li>
                <li class="breadcrumb-item"><span><b>Edit</b></span></li>
            </ol>
        </nav>

        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <br>
        <br>
        <h3>Edit Services</h3>
        <hr>

        <div class="" style="margin-top: 50px">

            <div class="col-md-12">
                <form method="post" action="{{ route('servic.update', $service->unid) }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">

                        <div class="col-md-6 control-group">
                            <div class="form-group controls">
                                <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $service->title }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 control-group">
                            <div class="row">
                                <div class="col-md-2 control-group">
                                    <div class="form-group controls">
                                        <h3 class="ionico text-right"><i class="{{ $service->icon }}"></i></h3>
                                    </div>
                                </div>
                                <div class="col-md-10 control-group">
                                    <div class="form-group controls">
                                        <input type="text" class="form-control" onkeyup="$('.ionico > i').attr('class', $(this).val())" placeholder="ion icon class. e.g: ion-android-desktop" name="icon" value="{{ $service->icon }}" required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 control-group">
                            <p id="intro_left">{{ strlen($service->intro) }}</p>
                            <div class="form-group controls">
                                <textarea onkeyup="$('#intro_left').text($(this).val().length)" rows="3" class="form-control" placeholder="Intro: max character: 280, min character: 70," name="intro" required>{{ $service->intro }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12 control-group">
                            <div class="form-group controls">
                                <textarea rows="12" class="myfield form-control" placeholder="Detail. Should match intro" name="detail" required>{{ $service->detail }}</textarea>
                            </div>
                        </div>


                        <div class="col-md-6 control-group">
                            <div class="form-group controls">
                                <textarea rows="1" class="form-control" placeholder="live-url" name="live_url" required>{{ $service->live_url }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-white-border">Update Service</button>
                </form>
            </div>
        </div>

    </div>
    @include('admin.include.tinymyce')
@endsection