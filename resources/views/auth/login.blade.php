@extends('layouts.appbase')

@section('content')

<div class="row">

            <div class="col-sm-12">
                <div class="login-card card-block">
                    <form method="POST" action="{{ route('login') }}"  class="md-float-material">
                        @csrf
                        <div class="text-center">
                            {{-- <img src="assets/images/logo-blue.png" alt="logo"> --}}
                            <h1 class="text-primary">{{ __('H-R Management App.') }}</h1>
                        </div>
                        <h3 class="text-center txt-primary">
                            {{ __('Sign In to your account') }}
                        </h3>
                        <div class="md-input-wrapper">
                            <input id="email" type="email" class="md-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                            <label>{{ __('Email') }}</label>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="md-input-wrapper">
                            <input id="password" type="password" class="md-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <label>{{__('Password') }}</label>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                            <div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
                                <label class="input-checkbox checkbox-primary">
                                    <input type="checkbox" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkbox"></span>
                                </label>
                                <div class="captions">{{ __('Remember Me') }}</div>

                            </div>
                                </div>
                            <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                <a class="text-right f-w-600" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 offset-xs-1">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">{{ __('Login') }}</button>
                            </div>
                        </div>
                        <!-- <div class="card-footer"> -->
                        <!-- <div class="col-sm-12 col-xs-12 text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="register2.html" class="f-w-600 p-l-5">Sign up Now</a>
                        </div> -->

                        <!-- </div> -->
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of login-card -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->

@endsection
