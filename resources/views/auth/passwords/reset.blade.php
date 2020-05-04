@extends('layouts.app')

@section('content')
<div id="login_wrapper">
    <div class="logo">
      <img src="{{ asset('storage/app/public/profile') }}/logo.png" alt="logo" class="logo-img">
    </div>
    <div id="login_content">
      <h1 class="login-title">
       {{ __('Reset Password') }}
      </h1>
        <div class="login-body">
         <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
          <div class="form-group label-floating is-empty">
            @if(old('email')==NULL)
            <label class="control-label">{{ __('E-Mail Address') }}</label>
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
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group label-floating is-empty">
              <label class="control-label">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          <button type="submit" class="btn btn-info btn-block m-t-40" name="login">{{ __('Reset Password') }}</button>
        </form>
      </div>
      
    </div>
  </div>      
@endsection
