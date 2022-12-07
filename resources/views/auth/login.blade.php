@extends('layouts.app')
@section('content')
<!-- Main css LOGIN-->
<link rel="stylesheet" href="{{ asset('frontend') }}/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">

<div class="container shadow">
    <div class="signin-content">
        <div class="signin-image">
            <figure><img src="{{ asset('frontend') }}/images/logo.png" alt="image"></figure>
        </div>
        
        <div class="signin-form">
            <h2 class="form-title">LOG IN</h2>
            <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input type="email" name="email" id="email" placeholder="Email" required="" />
                </div>
                <div class="form-group">
                    <label for="password"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="Password" required="" />
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember-me" id="remember-me" {{ old('remember') ? 'checked' : '' }}
                        class="agree-term" />
                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                </div>
                <div class="mb-2 d-flex justify-content-center">
                    <input type="submit" name="login" id="login" class=" btn btn-sm btn-primary" value="{{'login'}}" />
                </div>

                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register')}}" class="text-center">Create Account</a>
                </p>
            </form>
        </div>
    </div>
</div>


@endsection

@section('css')

<style>
    .invalid-feedback {
        display: block
    }
</style>
@endsection