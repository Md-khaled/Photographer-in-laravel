<footer class="ftco-footer ftco-bg-dark ftco-section">
<div class="container px-md-5">
<div class="row mb-5">
<div class="col-md">
<div class="ftco-footer-widget mb-4 ml-md-4">
<h2 class="ftco-heading-2">Recent Photos</h2>
<ul class="list-unstyled photo">
	@forelse($photos as $photo)
<li><a href="#" class="img" style="background-image: url({{ asset($photo->photo) }});"></a></li>
	@empty
	@endforelse
</ul>
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">Working Category</h2>
<ul class="list-unstyled categories">
	@forelse($photos as $photo)
<li><a href="#">{{$photo->category->name}}</a></li>
@empty
@endforelse
</ul>
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">Have a Questions?</h2>
<div class="block-23 mb-3">
<ul>
<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<p>
Copyright &copy;
<script type="4ebccb05a616311063638fec-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#">BIIT</a>
</p>
</div>
</div>
</div>
</footer>
</div>
</div>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="{{asset('public/photograph')}}/js/jquery.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/jquery-migrate-3.0.1.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/popper.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/bootstrap.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/jquery.easing.1.3.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/jquery.waypoints.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/jquery.stellar.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/owl.carousel.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/jquery.magnific-popup.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/aos.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/jquery.animateNumber.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/bootstrap-datepicker.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/scrollax.min.js" type="4ebccb05a616311063638fec-text/javascript"></script>
<script src="{{asset('public/photograph')}}/js/main.js" type="4ebccb05a616311063638fec-text/javascript"></script>

<script type="4ebccb05a616311063638fec-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="{{asset('public/photograph')}}/js/rocket-loader.min.js" data-cf-settings="4ebccb05a616311063638fec-|49" defer=""></script></body>
<!--for rating-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script src="{{asset('public/photograph')}}/js/custom.js" type="text/javascript"></script>
<script src="{{ asset('public/admin/assets/js') }}/toastr.min.js"></script>
@yield('script')
<!-- Mirrored from colorlib.com/preview/theme/louie/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2020 16:24:41 GMT -->
</html>