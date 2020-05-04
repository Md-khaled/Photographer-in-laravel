@extends('frontend.master')
@section('slider')
<div class="page-title" style="background-image: url({{asset('public/front')}}/style/images/art/pagetitle3.jpg);">
      <div class="over"></div>
      <h1><span style="color:orange;font-size:48px;">Pic</span>turesque</h1>
    </div>
@endsection
@section('content')
<style type="text/css">.checked {
  color: orange;
}</style>
<div class="portfolio-grid">
      <div class="isotope-filter button-group">
        <ul>
          @forelse($users as $cat)
          <li><a class="button  is-checked" data-filter=".category{{$cat->id}}">{{$cat->name}}</a></li>
          @empty
          @endforelse
          <li><a class="button" data-filter=".topper" style="color: red; font-weight: bold;"><strong>Top Rated</strong></a>
        </ul>
      </div>
      <ul class="isotope items">
      	@forelse($users as $userss)
      	@foreach($userss->prices as $user)
        @if($user->user!=null)
        <li class="item category{{$userss->id}}">
          <figure class="overlay"> <a href="{{route('user.photographer.show',$user->user->id)}}">
            <div class="text-overlay caption">
              <div class="info">
                <h2 class="post-title">{{$user->user->name}}</h2>
                <div class="meta"> <span class="count"> 
                  @forelse($user->user->avg as $rating)
                <div class="pro-rating">
                    @php
                    $round=ceil($rating->rating);
                    for ($i=1; $i <=5 ; $i++) { 
                        if ($i<=$round) {
                     @endphp
                     <i  class="fa fa-star checked" aria-hidden="true"></i>
                      @php
                         }else{
                     @endphp
                     <i  class="fa fa-star" aria-hidden="true"></i>
                      @php
                           }}
                      @endphp
                </div>
                @empty
                @endforelse
              </span> <div class="date">Working Since: {{date('d-m-Y', strtotime($user->user->created_at))}}</div> </div>
              </div>
            </div>
            <img width="450" height="300" src="{{asset($user->user->image)}}" alt="" /> </a> </figure>
        </li>
        @endif
        @endforeach
         @empty
          <li></li>
          @endforelse
          @forelse($topper as $top)
        <li class="item topper">
          <figure class="overlay"> <a href="{{route('user.photographer.show',$top->userrating->id)}}">
            <div class="text-overlay caption">
              <div class="info">
                <h2 class="post-title">{{$top->userrating->name}}</h2>
                <div class="meta"> <span class="count"> 
                <div class="pro-rating">
                    @php
                    $round=ceil($top->rating);
                    for ($i=1; $i <=5 ; $i++) { 
                        if ($i<=$round) {
                     @endphp
                     <i  class="fa fa-star checked" aria-hidden="true"></i>
                      @php
                         }else{
                     @endphp
                     <i  class="fa fa-star" aria-hidden="true"></i>
                      @php
                           }}
                      @endphp
                </div>
              </span> <div class="date">Working Since: {{date('d-m-Y', strtotime($top->userrating->created_at))}}</div> </div>
              </div>
            </div>
            <img width="450" height="300" src="{{asset($top->userrating->image)}}" alt="" /> </a> </figure>
        </li>
        @empty
       @endforelse
      </ul>
      <!-- /.isotope --> 
    </div>
@endsection
@section('script')
<script type="text/javascript">
  var users={!! json_encode($users->toArray()) !!};
  console.log(users[0].id);
  var $portfoliogrid = $('.portfolio-grid .isotope');
    $portfoliogrid.isotope({
        itemSelector: '.item',
        transitionDuration: '0.7s',
        filter: '.category'+users[0].id
    });
</script>
@endsection