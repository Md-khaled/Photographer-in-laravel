@extends('photographer.master')
@section('content')
<div id="colorlib-main">
<section class="ftco-section ftco-bread">
<div class="container">
<div class="row no-gutters slider-text justify-content-center align-items-center">
<div class="col-md-8 ftco-animate">
<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Collection</span></p>
<h1 class="bread">My Collection</h1>
</div>
</div>
</div>
</section>
<section class="ftco-section-3">
<div class="photograhy">
<div class="row">
@forelse($photos as $photo)
<div class="col-md-4 ftco-animate">
<a  href="{{asset($photo->photo)}}" class="photography-entry img image-popup d-flex justify-content-start align-items-end" style="background-image: url({{asset($photo->photo)}});text-decoration: none !important;">
<div class="overlay"></div>
<div class="text ml-4 mb-4">
<h3>{{$photo->title}}</h3>
<span class="tag">Category: {{$photo->category->name}} ({{date('d-m-Y', strtotime($photo->created_at))}})</span>
</div>
</a>
</div>
@empty
<div class="col-md-4 ftco-animate">
<a href="{{asset('public/photograph')}}/images/not.png" class="photography-entry img image-popup d-flex justify-content-start align-items-end" style="background-image: url({{asset('public/photograph/images/not.png')}});">
<div class="overlay"></div>
<div class="text ml-4 mb-4">
<h3>Data not available</h3>
<span class="tag">Error!</span>
</div>
</a>
</div>
@endforelse
</div>
</div>
</section>
@endsection