<?php
$active['admin'] = 'nav-active';

?>
@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">

        <nav class="row" style="margin: 0 4px">
            <ol class="breadcrumb radius50">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.show', $admin->unid) }}">{{ $admin->setName() }}</a></li>
                <li class="breadcrumb-item"><span><b>Edit</b></span></li>
            </ol>
        </nav>
        <!-- first div panel for greeting and important messages-->

        @include('admin.include.notify')

        <br>
        <br>
        <h3>Edit Admin</h3>
        <hr>

        <div class="" style="margin-top: 50px">

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.update', $admin->unid) }}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="row">

                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* first name</p>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $admin->first_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* last name</p>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $admin->last_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* email</p>
                                    <input type="email" class="form-control" placeholder="email" name="email" value="{{ $admin->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* telephone</p>
                                    <input type="text" class="form-control" placeholder="phone" name="phone" value="{{ $admin->phone }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* username</p>
                                    <input type="text" class="form-control" placeholder="username" name="username" value="{{ $admin->username }}">
                                </div>
                            </div>
                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* Select admin Level</p>
                                    <select name="who" id="" class="form-control">
                                        <option value="4" {{ $admin->who===4?'selected':'' }}>Super Admin</option>
                                        <option value="1" {{ $admin->who===1?'selected':'' }}>Client</option>
                                        <option value="2" {{ $admin->who===2?'selected':'' }}>Staff</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 control-group">
                                <p> * Passport Image <small>500kb Max , Must be Image File Type</small></p>
                                <input type="file" name="passport" accept="image/*" onchange="shwimg()" id="imgInp">

                                <br>
                                <br>
                                <div class=" dark-t-bg" style="max-width: 200px; padding: 0; border-radius: 5px; margin: 0 auto">
                                    <img id="imgtoshow"  src="{{ $admin->setPhoto() }}" class="img-fit mid-size" alt="">
                                </div>
                                <br>

                            </div>

                            <div class="col-md-12 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* Home address</p>
                                    <textarea rows="2" class="form-control" placeholder="Home Address" name="address" required>{{ $admin->address }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12 control-group">
                                <div class="form-group controls">
                                    <p class="form-label">* Office Address</p>
                                    <textarea rows="2" class="form-control" placeholder="Office Address" name="office" required>{{ $admin->office }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6 control-group">
                                <div class="form-group controls">
                                    <input class="form-control" type="password" placeholder="password" name="reset">
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-lg btn-white-border">Update {{ $admin->first_name }}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection