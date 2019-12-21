<?php
    $skip['cmjs'] = true;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card" style="width: 100%; margin-top: 15%; padding: 10px">
                <h4 class="col-md-12">Reset Password</h4>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" style="width: 100%;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                    <div class="col-md-6 text-right" style="float: right;">
                                        <a href="{{ route('admin.login') }}" class="btn btn-info">Login</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <br><div class="row">
                @include('admin.include.notify')
            </div>

        </div>
    </div>
</div>
@endsection
