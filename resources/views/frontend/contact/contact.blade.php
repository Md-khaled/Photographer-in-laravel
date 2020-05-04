@extends('frontend.master')
@section('slider')
<div class="page-title" style="background-image: url({{asset('public/front')}}/style/images/art/pagetitle3.jpg);">
      <div class="over"></div>
      <h1>Contact With Us</h1>
    </div>
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <div class="box">
            <h5 class="sans">Get in Touch</h5>
            <div class="divide10"></div>
            <div class="form-container">
               @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong style="color: green;">Success!</strong>
                {{ session('msg') }}
            </div>
              @endif
              <form action="{{route('user.contact.store')}}" method="post" class="vanilla vanilla-form">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-field">
                      <label>
                        <input type="text" name="name" value="{{old('name')}}" placeholder="Your name" required="required">
                      </label>
                       @error('name')
                           <div class="text-danger">{{ $message }}</div><br>
                        @enderror
                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                  <div class="col-sm-6">
                    <div class="form-field">
                      <label>
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Your e-mail" required="required">
                      </label>
                    </div>
                     @error('email')
                         <div class="text-danger">{{ $message }}</div><br>
                      @enderror
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                  <div class="col-sm-6">
                    <div class="form-field">
                      <label>
                        <input type="tel" name="tel" value="{{old('tel')}}" placeholder="Phone" title="11 digits" required="required">
                      </label><br/>
                    @error('tel')
                         <div class="text-danger">{{ $message }}</div><br>
                      @enderror

                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                  <div class="col-sm-6">
                    <div class="form-field">
                      <label>
                        <input type="text" name="query" value="{{old('query')}}" placeholder="Your Query Title" required="required">
                      </label>
                    </div>
                     @error('query')
                         <div class="text-danger">{{ $message }}</div><br>
                      @enderror
                    <!--/.form-field --> 
                  </div>
                  <!--/column --> 
                </div>
                <!--/.row -->
                <textarea name="message" placeholder="Type your message here..." required="required">{{old('message')}}</textarea>
                <br/>@error('message')
                   <div class="text-danger">{{ $message }}</div><br>
                @enderror
                <!--/.radio-set -->
                <input type="submit" class="btn" value="Send" data-error="Fix errors" data-processing="Sending..." data-success="Thank you!">
                <footer class="notification-box"></footer>
              </form>
              <!--/.vanilla-form --> 
            </div>
            <!--/.form-container --> 
            
          </div>
          <!-- /.box --> 
          
        </div>
        <!-- /column -->
        
        <aside class="col-sm-6 col-md-3 sidebar">
          <div class="sidebox widget">
            <h3 class="widget-title">Address</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2499.4483800426133!2d3.2241689!3d51.2108153!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c350cfcf934d7d%3A0xa4d8f385ffa7d70b!2sChoco-Story!5e0!3m2!1sen!2str!4v1534408440419" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            <address>
            <strong>Malory, Inc.</strong><br>
            Moon Street Light Avenue, 14/05 <br>
            Jupiter, JP 80630<br>
            <abbr title="Phone">P:</abbr> 00 (123) 456 78 90 <br>
            <abbr title="Email">E:</abbr> first.last@email.com
            </address>
          </div>
          <!-- /.widget --> 
          
        </aside>
        <!-- /column .sidebar --> 
        
      </div>
      <!-- /.row --> 
      
    </div>
@endsection