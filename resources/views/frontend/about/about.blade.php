@extends('frontend.master')
@section('slider')
<div class="page-title" style="background-image: url({{asset('public/front')}}/style/images/art/pagetitle3.jpg);">
      <div class="over"></div>
      <h1>About Ours</h1>
    </div>
@endsection
@section('content')
 <div class="container">
      <div class="box">
        <div class="row">
          <div class="col-md-5 rp20 bm20">
            <figure><img src="{{asset('public/front')}}/style/images/art/about2.jpg" alt="" /></figure>
          </div>
          <!-- /column -->
          <div class="col-md-7">
            <h5 class="section-title sans">Who is Behind?</h5>
            <p class="text-justify">A photograph (also known as a photo) is an image created by light falling on a photosensitive surface, usually photographic film or an electronic image sensor, such as a CCD or a CMOS chip. </p>
            <blockquote>
              <p class="text-justify"> Most photographs are created using a camera, which uses a lens to focus the scene's visible wavelengths of light into a reproduction of what the human eye would see. </p>
            </blockquote>
            <p class="text-justify">The process and practice of creating such images is called photography. </p>
            <h6 class="sans">Elsewhere</h6>
            <ul class="social">
              <li><a href="#"><i class="icon-s-twitter"></i></a></li>
              <li><a href="#"><i class="icon-s-facebook"></i></a></li>
              <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
              <li><a href="#"><i class="icon-s-linkedin"></i></a></li>
              <li><a href="#"><i class="icon-s-flickr"></i></a></li>
              <li><a href="#"><i class="icon-s-instagram"></i></a></li>
            </ul>
          </div>
          <!-- /column --> 
          
        </div>
        <!-- /.row -->
        <hr />
        <h5 class="sans text-center">Let's Work Together</h5>
        
        <div class="thin2 text-center">
          <p>Contact with us</p>
      <a href="{{ route('user.contact.index') }}" class="btn"><i class="icon-paper-plane rp7"></i>Contact Me</a>
        </div>
        
      </div>
      <!-- /.box --> 
    </div>
@endsection