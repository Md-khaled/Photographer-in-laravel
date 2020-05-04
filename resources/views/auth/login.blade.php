@extends('layouts.app')

@section('content')
<div id="login_wrapper">
    <div class="logo">
      <img src="{{ asset('storage/app/public/profile') }}/logo.png" alt="logo" class="logo-img">
    </div>
    <div id="login_content">
      <h1 class="login-title">
        Sign In to your account
         @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong style="color: green;">Success!</strong>
                {{ session('msg') }}
            </div>
              @endif
      </h1>
        <div class="login-body">
        <form method="POST" action="{{ route('login') }}">
           @csrf
          <div class="form-group label-floating is-empty">
            @if(old('email')==NULL)
            <label class="control-label">Email</label>
            @endif
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group label-floating is-empty">
            <label class="control-label">Password</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
          </div>
          @if (Route::has('password.request'))
           <a class="forgot-pass pull-right" href="{{ route('password.request') }}">  {{ __('Forgot Password?') }}</a>
           @endif
          <div class="checkbox inline-block">
           
          </div>
          <button type="submit" class="btn btn-info btn-block m-t-40" name="login">Sign In</button>
        </form>
      </div>
      <div class="login-footer p-15">
        <p>
          Don't have an account? <a href="{{ route('register') }}" data-toggle="register">{{ __('Create an account') }}</a>
        </p>
      </div>
    </div>
  </div>        
@endsection

