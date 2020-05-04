@extends('layouts.app')

@section('content')
<div id="login_wrapper">
    <div class="logo">
      <img src="{{ asset('storage/app/public/profile') }}/logo.png" alt="logo" class="logo-img">
    </div>
    <div id="login_content">
      <h1 class="login-title">
        Create an account
      </h1>
      <div class="login-body">
         <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          @csrf
            <div class="form-group label-floating is-empty">
              @if(old('name')==null)
              <label class="control-label">Name</label>
              @endif
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" pattern="([a-zA-Z\s]+){5}" required="required" title="Name should only contain minimum 5 letters. e.g. johnn">
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
              </span>
            @enderror
            </div>
            <div class="form-group label-floating is-empty">
               @if(old('email')==null)
              <label class="control-label">Email</label>
              @endif
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="required">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
              </span>
            @enderror
            </div>
             <div class="form-group label-floating is-empty">
               @if(old('mobile')==null)
              <label class="control-label">Number</label>
              @endif
              <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control input-mask" data-mask="00000000000"  pattern="[0]{1}[1]{1}[1-9]{1}[0-9]{8}" title='Phone Number (Format: 01-(1-9)-(0-9)) 11 digits' required="required">
              @error('mobile')
                <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
                </span>
              @enderror
            </div>
              <div class="form-group ">
                <div class="col-sm-12">
                  <select id="countryInput" name="district_id" class="form-control select" style="display: none;" aria-required="true" required="required">
                    <option value="">Select a District</option>
                       @forelse ($districts as $key => $district)
                       <option value="{{$district->id}}" {{old('district_id') == $district->id ? 'selected="selected"' : '' }}>{{$district->name}}</option>
                      @empty
                       <option>data not found</option>
                      @endforelse
                  </select>
                  @error('district_id')
                    <span class="invalid-feedback" role="alert">
                      <strong class="text-danger">{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
                  <div class="form-group ">
                  <div class="col-sm-12">
                   <select class="select form-control" name="types" required="required" aria-required="true">
                    @php 
                     $types=['user'=>'User','photographer'=>'Photographer'];
                    @endphp
                      <option value="">Select a Types</option>
                      @foreach($types as $kk=> $type)
                      <option value="{{$kk}}" {{old('types') == $kk ? 'selected="selected"' : '' }}>{{$type}}</option>
                      @endforeach
                    </select>
                     @error('types')
                    <span class="invalid-feedback" role="alert">
                      <strong class="text-danger">{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                </div>
               <br>
              <div class="form-group">
                <label class="sr-only">Your Gender: </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="male" value="male" checked>
                  Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="female" value="female">
                  Female
                </label>
                 @error('gender')
                    <span class="invalid-feedback" role="alert">
                      <strong class="text-danger">{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            <div class="form-group label-floating is-empty">
              <label class="control-label">Password</label>
              <input type="password" class="form-control" max="8" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="form.password_confirmation.pattern = RegExp.escape(this.value);" title="Password must contain at least 8 characters,includeing upper/lower case and numbers">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group label-floating is-empty">
              <label class="control-label">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" required>
            </div>
             <div class="form-group label-floating is-empty">
              <label class="control-label">Your Address Here</label>
              <div class="col-md-12">
                <textarea class="form-control" rows="3" id="textArea" name="address" required="required"></textarea>
                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
          <button type="submit" class="btn btn-info btn-block m-t-40" name="register">Create my account</button>
           <!-- <a href="javascript:void(0)" class="btn btn-info btn-block m-t-40">Create my account</a>-->
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
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
     console.log( "ready!" );
    // polyfill for RegExp.escape
  if(!RegExp.escape) {
    RegExp.escape = function(s) {
      return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
    };
  }
   
    $("a").click(function(){
  //alert($(this).attr("id"));
  if ($(this).attr("id")=='create') {
    $('#login_content').css("height","1000px");
  }else if($(this).attr("id")=='sign_in'){
    $('#login_content').css("height","");
  }
});
   
});
</script>
@endsection
