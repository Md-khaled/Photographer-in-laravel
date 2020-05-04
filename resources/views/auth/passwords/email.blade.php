@extends('layouts.app')

@section('content')
<div id="login_wrapper">
    <div class="logo">
      <img src="{{ asset('storage/app/public/profile') }}/logo.png" alt="logo" class="logo-img">
    </div>
    <div id="login_content">
      <h1 class="login-title">
        {{ __('Sign In to your account') }}
        
      </h1>
        <div class="login-body">
             @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
         <form method="POST" action="{{ route('password.email') }}">
            @csrf
          <div class="form-group label-floating is-empty">
            @if( old('email')==NULL)
            <label class="control-label">{{ __('E-Mail Address') }}</label>
            @endif
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-info btn-block m-t-40" name="login">{{ __('Send Password Reset Link') }}</button>
        </form>
      </div>
      <div class="login-footer p-15">
        <p>
          Already have an account? <a href="{{ route('login') }}" data-toggle="register">{{ __('Sign In') }}</a>
        </p>
      </div>
    </div>
  </div>        
@endsection
