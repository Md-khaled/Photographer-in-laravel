@extends('frontend.master')
@section('slider')
<div class="page-title" style="background-image: url({{asset('public/front')}}/style/images/art/pagetitle3.jpg);">
      <div class="over"></div>
      <h1>Search By Location</h1>
    </div>
@endsection
@section('content')
<style type="text/css">.checked {
  color: orange;
}</style>
<div class="portfolio-grid">
      <div class="isotope-filter button-group">
        <ul>
          @if($users)
          @forelse($users as $cat)
          @foreach($categories as $category)
          @if($category->id==$cat->category_id)
          <li><a class="button is-checked" data-filter=".category{{$category->id}}">{{$category->name}}</a></li>
         @endif
         @endforeach
          @empty
          <li></li>
          @endforelse
        </ul>
      </div>
      <ul class="isotope items">
      	@forelse($users as $user)
        <li class="item category{{$user->category_id}}">
          <figure class="overlay"> <a href="{{route('user.photographer.show',$user->user->id)}}">
            <div class="text-overlay caption">
              <div class="info">
                <h2 class="post-title">{{$user->user->name}}</h2>
                <div class="meta"> <span class="count"> 
                  @foreach($user->user->avg as $rating)
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
                
                @endforeach
              </span>
              @foreach($categories as $category)
               @if($category->id==$user->category_id)
               <div class="date">Working Since: {{date('d-m-Y', strtotime($user->user->created_at))}}</div>
                @endif
              @endforeach
                </div>
              </div>
            </div>
            <img src="{{asset($user->user->image)}}" alt="" /> </a> </figure>
        </li>
        
         @empty
          <li></li>
          @endforelse
          @else
          <label><h1>Not found</h1></label>
          @endif
      </ul>
      <!-- /.isotope --> 
    </div>
@endsection
@section('script')
<script type="text/javascript">
  var users={!! json_encode($users) !!};
  var $portfoliogrid = $('.portfolio-grid .isotope');
    $portfoliogrid.isotope({
        itemSelector: '.item',
        transitionDuration: '0.7s',
        filter: '.category'+users[0].category_id
    });
</script>
@endsection