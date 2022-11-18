@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="d-flex justify-content-center">
    <div class=" card col-md-6 bg-secondary">
        <form method="POST" action="{{ route('password.email') }}">
            <div class="text-center"><img class="brand-image img-circle mt-2" src="{{ asset('frontend') }}/images/logo.png" alt="" width="100" height="100"></div>
            <h1 class="h2 mb-3 fw-normal text-center">RESET YOUR PASSWORD</h1>
            <h3 class="h6 mb-3 fw-bold text-center">Enter your email and we will send you a reset link</h3>
            @if(session('status'))
                <div class="alert alert-success d-flex alig-items-center alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon-fill text-danger"></i>&nbsp;
                    <strong>Hey!</strong>&nbsp;{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @csrf
        <div class="form-floating">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autocomplete="email">
            <label for="email" class="text-dark">Email address</label>
            @error('email')
            <div class="invalid-feedback mt-2">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        <div class="text-center mb-3">
            <button class="w-50 btn btn-primary rounded-pill text-white" type="submit">Send me the link</button>
        </div>
        </form>
    </div>
</div>
@endsection
