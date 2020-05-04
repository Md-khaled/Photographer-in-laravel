@extends('photographer.master')
@section('content')
<div id="colorlib-main">
<section class="ftco-section-no-padding bg-light">
<div class="hero-wrap">
<div class="overlay"></div>
<div class="d-flex align-items-center js-fullheight">
<div class="author-image text img d-flex">
<section class="home-slider js-fullheight owl-carousel">
@forelse($profile as $pt)
<div class="slider-item js-fullheight" style="background-image: url({{ asset($pt->image) }});">
</div>
@empty
<div class="slider-item js-fullheight" style="background-image: url({{ asset('public/photograph/images/author.jpg') }});">
</div>
<div class="slider-item js-fullheight" style="background-image:url({{ asset('public/photograph/images/author2.jpg') }});">
</div>
@endforelse

</section>
</div>
<div class="author-info text p-3 p-md-5">
<div class="desc">
<span class="subheading">Hello! I'm</span>
<h1 class="mb-4"><span>{{$photographer->name}}</span> A Photographer. <span>I Capture {{$photographer->title??'life'}}</span></h1>
<p class="text-justify mb-4">{{$photographer->about_me}}</p>
<h3 class="signature h1">{{$photographer->name}}</h3>
<ul class="ftco-social mt-3">
<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>

</ul>

</div>
<a class="btn btn-danger pull-left mr-3" href="{{route('user.photographer.edit',$photographer->id)}}">Hire Me</a>
</div>
</div>
</div>
</section>
<section class="ftco-section contact-section">
<div class="container">
<div class="row d-flex mb-5 contact-info">
<div class="col-md-12 mb-4">
<h2 class="h3 font-weight-bold">Contact With Me</h2>
</div>
<div class="w-100"></div>
<div class="col-11 ">
<div class="col-md-3 d-flex">
<div class="info bg-light p-4">
<p><span style="font-weight:bold;">Address: </span>{{$photographer->address}}</p>
</div>
</div>
<div class="col-md-3 d-flex">
<div class="info bg-light p-4">
<p><span style="font-weight:bold;">Phone: </span> {{$photographer->mobile}}</p>
</div>
</div>
<div class="col-md-3 d-flex">
<div class="info bg-light p-4">
<p><span style="font-weight:bold;">Email: </span>{{$photographer->email}} </span></p>
</div>
</div>
<div class="col-md-3 d-flex">
<div class="info bg-light p-4">
<p><span style="font-weight:bold;">Website: </span> <a href="#">photographer.com</a></p>
</div>
</div>
</div>
</div>
<div class="row block-9">
<div class="col-md-6 d-flex">
<form action="{{route('user.ratings.show',$photographer->id)}}" method="POST" class="bg-light p-5 contact-form" id="rating-photographer">
@csrf

<div class="form-group">
	 <label for="input-3" class="control-label">Give a rating me:</label>
                                                   
 <input id="input-3" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="5">
     @error('rating')
<div class="custom">{{ $message }}</div>
@enderror  
<br><span class="text-danger" id="rating"></span>                                             
</div>
<div class="form-group">
<textarea name="review" cols="30" rows="7" class="form-control" placeholder="Message"></textarea><br/>
 @error('review')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><span class="text-danger" id="review"></span>
</div>
<div class="form-group">
<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
</div>
</form>
</div>
<div class="col-md-6 d-flex">
<div >
<h3 class="mb-5 font-weight-bold">Comments</h3>
@if($comments)
<ul class="comment-list" style="width: 45rem;">
@foreach($comments as $comment)
<li class="comment">
<div class="vcard bio">
<img src="{{asset($comment->user->image??'storage/app/public/profile/male.jpg')}}" alt="Image placeholder">
</div>
<div class="comment-body">
<h3>{{$comment->user->name??''}}</h3>
<div class="meta">{{$comment->created_at??''}}</div>
<p>{{$comment->review??''}}</p>
</div>
</li>
@endforeach
</ul>
@endif
</div>
</div>
</div>
</div>
</section>
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
<div class="container">
<div class="row justify-content-start">
<div class="col-md-10">
<div class="row">
<div class="col-xl-3 col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
 <div class="block-18">
<div class="text d-flex align-items-center">
<strong class="number" data-number="120">0</strong>
<span>Pounds of Equipment</span>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18">
<div class="text d-flex align-items-center">
<strong class="number" data-number="150">0</strong>
<span>Studio Session</span>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18">
<div class="text d-flex align-items-center">
<strong class="number" data-number="200">0</strong>
<span>Finished Photosessions</span>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18">
<div class="text d-flex align-items-center">
<strong class="number" data-number="200">0</strong>
<span>Happy Clients</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@if(!$photos)
<section class="ftco-section instagram">
 <div class="container">
<div class="row justify-content-center mb-2 pb-3">
<div class="col-md-7 heading-section heading-section-2 text-center ftco-animate">
<h2 class="mb-4">Follow me on Instagram {{$photos}}</h2>
</div>
</div>
<div class="row no-gutters">
	@foreach($photos as $photo)
<div class="col-sm-12 col-md ftco-animate">
<a href="{{asset($photo->photo)}}" class="insta-img image-popup" style="background-image: url({{asset($photo->photo)}});">
<div class="icon d-flex justify-content-center">
<span class="icon-instagram align-self-center"></span>
</div>
</a>
</div>
@endforeach
</div>
</div>
</section>
@endif
<style type="text/css">
    .hide{
        display: none;
    }
</style>  
<div class="container hide hh">
       
    <div class="row">
        <div class="chatbox chatbox22 chatbox--tray">
    <div class="chatbox__title">
        <h5><a href="javascript:void()">Leave a message</a></h5>
        <!--<button class="chatbox__title__tray">
            <span></span>
        </button>-->
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
     <div style="background-color: #fff; height: 100%;padding: 10px;text-align: center;" id="none">
       <strong>Please login  to chat conversation</strong>
     </div>
             
    </div>
    
    <div class="panel-footer">
      <form class="form-horizontal" action="{{route('user.chat_message.store',$photographer->id)}}" method="post" enctype="multipart/form-data" id="chat_start">
       @csrf

      @if(Auth::check())
      <input type="hidden" name="from_user_id" value="{{Auth::id()}}">
      @endif
        <div class="input-group">
          @error('message')
           <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <span class="text-danger" id="message"></span>
            <input id="btn-input" type="text" name="message" class="form-control input-sm chat_set_height chat_msg" placeholder="Type your message here..." tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" contenteditable="true" required="required" />
            <span class="input-group-btn">
                <button style="height: 52px; top: 11px;" type="submit" class="btn btn-primary" id="btn-chat">
                    Send</button>
            </span>
        </div>
        </form>
    </div>
</div>
        
    </div>
    </div>
    <style type="text/css">
      #chat {
    cursor: pointer;
    bottom: 100px;
    color: #ffffff;
    font-size: 10px;
    height: 40px;
    right: 10px;
    text-align: center;
    transition: all 0.3s ease 0s;
    width: 76px;
}
.chaticon {
    position: fixed;
    z-index: 2147483647;
}
    </style>
    <div class="chaticon" id="chat">
                 <img src="http://localhost/electroRepair/storage/app/public/users_img/chat/chat.png" alt="">
             </div>
@endsection

@section('script')
<script type="text/javascript">
	 @if (session()->has('msg'))
          //toastr.options.positionClass = 'toast-bottom-right';
          toastr.success("{{ session('msg') }}");
      @endif
       @if (session()->has('error'))
          //toastr.options.positionClass = 'toast-bottom-right';
          toastr.error("{{ session('error') }}");
      @endif
$( document ).ready(function() {
	jQuery('#rating-photographer').submit(function(e){
    e.preventDefault();
    var AuthUser = {!! json_encode(Auth::check()) !!};
    var redirect="{{route('login')}}";
    if (!AuthUser) {
    	//console.log(log);
    	window.location.href = redirect;
    } else {
      var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(url);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
          dataType: "json",
          success: function(data){
            console.log(data);
             var names=['rating','review'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             if (data.error) {toastr.error(data.error);}
             if (data.success) {
               toastr.options.showDuration = '2000';
              toastr.success(data.success);
              setTimeout(function () { document.location.reload(true); }, 2000);

             }else{
          var errors = data.errors;
                if($.isEmptyObject(errors) == false) {
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

 
    }
});
/*chat box show*/
var $chatbox = $('.chatbox'),
      $chatboxTitle = $('.chatbox__title'),
      $chatboxTitleClose = $('.chatbox__title__close'),
      $chatboxCredentials = $('.chatbox__credentials');
      $(".chaticon").on("click",function(e){
 // console.log('sfsfa');
  $(".hh").removeClass("hide");
  $chatbox.toggleClass('chatbox--tray');
  $("#chat").addClass("hide");

});
      /*
  $chatboxTitle.on('click', function() {
      console.log('toggle');
      $chatbox.toggleClass('chatbox--tray');
  });
  */
  $chatboxTitleClose.on('click', function(e) {
      //console.log('close add');

      e.stopPropagation();
  $("#chat").removeClass("hide");
      $chatbox.toggleClass('chatbox--tray');
      $(".hh").addClass('hide');
  });
/*chat start*/
setInterval(function(){
  var AuthUser = {!! json_encode(Auth::check()) !!};
   if (AuthUser) {
    $("#none").addClass('hide');
  update_chat_history_data();
}
 }, 1000);
jQuery('#chat_start').submit(function(e){
    e.preventDefault();
    var AuthUser = {!! json_encode(Auth::check()) !!};
    var redirect="{{route('login')}}";
    if (!AuthUser) {
      //console.log(log);
      window.location.href = redirect;
    } else {
      var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(url);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
          dataType: "json",
          success: function(data){
            console.log(data);
            $(".chat_msg").val('');
            var html='<div class="chatbox__body__message chatbox__body__message--left"> <div class="chatbox_timing"><ul> <li><a href="#"><i class="fa fa-calendar"></i> 26/03/2020</a></li></ul></div><img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture"><div class="clearfix"></div><div class="ul_section_full"><ul class="ul_msg"><li><strong>khaled mahmud</strong></li><li>'+data.chat.message+'</li> </ul><div class="clearfix"></div><ul class="ul_msg2"><li><a href="#"><i class="fa fa-pencil"></i> </a></li><li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li></ul></div></div>';
              $(".chatbox__body").append(html);
            console.log(data.chat.message);
             var names=['message'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             if (data.error) {toastr.error(data.error);}
             if (data.success) {
               //toastr.options.showDuration = '2000';
             // toastr.success(data.success);
              //setTimeout(function () { document.location.reload(true); }, 2000);

             }else{
          var errors = data.errors;
                if($.isEmptyObject(errors) == false) {
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

 
    }
});
function update_chat_history_data()
 {
  var user_id = {!! json_encode($photographer->id) !!};
  var url = "{{ route('user.chat.show', ":id") }}";
  url = url.replace(':id', user_id);
  console.log(url);
   $.ajax({
   url:url,
   method:"GET",
   data:{to_user_id:user_id},
   success:function(data){
console.log(data);
     $(".chatbox__body").empty();
     $.each(data,function (key, value) {
      
      var style='';
      if (value.from_user_id==user_id) {
        
         var html='<div class="chatbox__body__message chatbox__body__message--left"> <div class="chatbox_timing"><ul> <li><a href="#"><i class="fa fa-calendar"></i> '+value.created_at+'</a></li></ul></div><img src="{{asset('/')}}'+value.photographer.image+'" alt="Picture"><div class="clearfix"></div><div class="ul_section_full"><ul class="ul_msg"><li><strong>'+value.photographer.name+'</strong></li><li>'+value.message+'</li> </ul><div class="clearfix"></div><ul class="ul_msg2"><li><a href="#"><i class="fa fa-pencil"></i> </a></li><li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li></ul></div></div>';
              $(".chatbox__body").append(html);
      }else{
        var html='<div class="chatbox__body__message chatbox__body__message--right"><div class="chatbox_timing"><ul><li><a href="#"><i class="fa fa-calendar"></i> '+value.created_at+'</a></li><li><a href="#"><i class="fa fa-clock-o"></i></a></a></li></ul></div><img src="{{asset('/')}}'+value.user.image+'" alt="Picture"><div class="clearfix"></div> <div class="ul_section_full"><ul class="ul_msg"><li><strong>'+value.user.name+'</strong></li><li>'+value.message+'</li></ul><div class="clearfix"></div><ul class="ul_msg2"><li><a href="#"><i class="fa fa-pencil"></i> </a></li><li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li></ul></div></div>';
              $(".chatbox__body").append(html);

      }
    console.log(value.message);
  });
   }
  });
 }

});
	
</script>
@endsection