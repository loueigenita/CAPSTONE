@extends('layouts.app')

@section('content')
 <!-- Main css REGISTER-->
 <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/material-icon/css/material-design-iconic-font.min.css">
 <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">

<div class="container shadow">
 <div class="signin-content">
 <div class="signin-image">
         <figure><img src="{{ asset('frontend') }}/images/logo.png" alt="sing up image"></figure>
     </div>
     <div class="signin-form">
         <h2 class="form-title">REGISTER</h2>
                 <form method="POST" action="{{ route('register') }}">
                     @csrf
                     <div class="form-group">
                             <label for="name"><i class="zmdi zmdi-account"></i></label>
                             <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name">
                             @include('alerts.feedback', ['field' => 'name'])
                     </div>
                     <div class="form-group">
                             <label for="email"><i class="zmdi zmdi-email"></i></label>
                             <input id="email" type="email" class=" @error('email') is-invalid @enderror"  placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                             @include('alerts.feedback', ['field' => 'email'])

                     </div>
                     <div class="form-group">
                             <label for="password"><i class="zmdi zmdi-lock"></i></label>
                             <input id="password" type="password" class=" @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                             @include('alerts.feedback', ['field' => 'password'])
                     </div>

                     <div class="form-group">
                             <label for="password-confirm"><i class="zmdi zmdi-lock"></i></label>
                             <input id="password-confirm" type="password"  placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                     </div>
                     <div class="mb-2 d-flex justify-content-center">
                         <input type="submit" name="register" id="register" class=" btn btn-sm btn-primary" value="{{ __('Register') }}"/>
                         </div>
                     </div>
                 </form>
             </div>
             </div>
         </div>
     </div>
 </div>
</div>
@endsection
