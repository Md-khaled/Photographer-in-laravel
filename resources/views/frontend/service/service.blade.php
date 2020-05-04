@extends('frontend.master')
@section('slider')
<div class="page-title" style="background-image: url({{asset('public/front')}}/style/images/art/pagetitle3.jpg);">
      <div class="over"></div>
      <h1>Services</h1>
    </div>
@endsection
@section('content')
 <div class="container">
      <div class="box">
        <h5 class="section-title sans text-center">Services</h5>
        <div class="divide30"></div>
        <div class="row">
          <div class="col-sm-6">
            <div class="feature">
              <div class="icon"> <i class="budicon-camera-1"></i> </div>
              <h6 class="sans">Photography</h6>
              <p class="text-justify">Our in-house photography services team made up of professional photographers can add value to your website with high-resolution team photos, corporate event photography and product photography.</p>
            </div>
            <!--/.feature --> 
          </div>
          <!--/column -->
          <div class="col-sm-6">
            <div class="feature">
              <div class="icon"> <i class="budicon-video-1"></i> </div>
              <h6 class="sans">Wild Life capture</h6>
              <p class="text-justify">Our in-house photography services team made up of professional photographers can add value to your website with high-resolution team photos, corporate event photography and product photography.</p>
            </div>
            <!--/.feature --> 
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <div class="divide20"></div>
        <div class="row">
          <div class="col-sm-6">
            <div class="feature">
              <div class="icon"> <i class="budicon-video-1"></i> </div>
              <h6 class="sans">Nature Capture</h6>
              <p class="text-justify">Our in-house photography services team made up of professional photographers can add value to your website with high-resolution team photos, corporate event photography and product photography.</p>
            </div>
            <!--/.feature --> 
          </div>
          <!--/column -->
          <div class="col-sm-6">
            <div class="feature">
              <div class="icon"> <i class="budicon-video-1"></i> </div>
              <h6 class="sans">Wedding</h6>
              <p class="text-justify">Our in-house photography services team made up of professional photographers can add value to your website with high-resolution team photos, corporate event photography and product photography.</p>
            </div>
            <!--/.feature --> 
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        
        <hr />
        
        <h5 class="section-title sans text-center">My Clients</h5>
        <p class="text-center">Our pupolar clients</p>
        <div class="divide20"></div>

        <div class="carousel-wrapper">
          <div class="carousel clients">
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c1.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c2.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c3.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c4.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c5.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c6.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c7.png" alt="" /> </div>
            <div class="item"> <img src="{{asset('public/front')}}/style/images/art/c8.png" alt="" /> </div>
          </div>
          <!--/.carousel --> 
        </div>
        <!--/.carousel-wrapper --> 
        
      </div>
      <!-- /.box --> 
    </div>
@endsection