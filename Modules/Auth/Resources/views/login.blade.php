@extends('layouts.loginMaster')
 @section('title', 'Login Page')
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset('assets/css/pages/page-auth.css')}}">
@endsection 
@section('content')
<div class="auth-wrapper auth-v2">
    <div class="auth-inner row m-0">
        <!-- Brand logo-->
        <a class="brand-logo" href="#">
            <h2 class="brand-text text-primary ms-1">{{ config('app.name') }}</h2>
        </a>
        <!-- /Brand logo-->
        <!-- Left Text-->
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                class="img-fluid"
                src="{{ asset('assets/images/pages/login-v2-dark.svg') }}"
                alt="Login V2"/></div>
        </div>
        <!-- /Left Text-->
        <!-- Login-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <img src="{{ asset('assets/images/logo/logo.png') }}">

                <h2 class="card-title fw-bold mb-1">Welcome to
                    {{ config('app.name') }}
                    👋</h2>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                         {{ session()->get('success') }}
                     </div>
                    @endif
                    @if(session()->has('failed'))
                       <div class="alert alert-danger">
                            {{ session()->get('failed') }}
                        </div>
                    @endif
                    
                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                <form method="POST" action="{{ route('post.login') }}" class="auth-login-form mt-2">
                  @csrf
                    <div class="mb-1">
                        <label class="form-label" for="login-email">{{ __('E-Mail Address') }}</label>
                            <input  placeholder="john@example.com" id="login-email" aria-describedby="login-email"  tabindex="1" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mb-1">
                        <div class="input-group input-group-merge form-password-toggle">
                                <input id="login-password" placeholder="············" tabindex="2" aria-describedby="login-password" id="password" type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <span class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <input class="form-check-input" id="remember-me" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }} tabindex="3"/>
                            <label class="form-check-label" for="remember-me">
                                {{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                </form>
            </div>
        </div>
        <!-- /Login-->
    </div>
</div>
@endsection 