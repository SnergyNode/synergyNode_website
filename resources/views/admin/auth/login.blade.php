@extends('admin.layout.login')
{{--@extends('layouts.app')--}}

@section('content')
<div class="" style="">
    <div id="particles-js" style="background: #6a3513"></div>
    <div class="" style="padding-top: 50px; color: #fff;">

        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">

                <div class="text-center">
                    <img src="{{ url('images/logo2.png')  }}" style="width: 100px;" alt="">
                </div>
                <br>

                <p class="panel-heading text-center" style="color: #ff611d;">Synergy <b>Node</b> </p>
                <p class="panel-heading text-center" ><small><b>LOGIN</b></small></p>

                <div class="panel-body text-center" >
                    <form class="form-horizontal" method="POST" action="{{ route('admin.signin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Enter email or username</label>

                            <div class="col-md-4" style="margin: 0 auto">
                                <input id="email" type="text" class="form-control" name="access" placeholder="email | username" value="{{ old('access') }}" required autofocus>

                                @if ($errors->has('access'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('access') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('access') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-4" style="margin: 0 auto">
                                <input placeholder="password" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('access'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('access') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4" style="margin: 0 auto">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4" style="margin: 0 auto">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #ff611d;">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<audio id="audio" src="{{ is_file('/media/audio/pulse.mp3')?'/media/audio/pulse.mp3':url('/media/audio/pulse.mp3') }}" autoplay loop onloadeddata="setVolume()" style="display: none"></audio>
@endsection
