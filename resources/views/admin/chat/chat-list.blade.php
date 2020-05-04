@extends('admin.master')
@section('content')
<section id="content_outer_wrapper">
<div id="content_wrapper" class="card-overlay">
  <div id="header_wrapper" class="header-md ecom-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <header id="header">
            <h1>Chat</h1>
            <ol class="breadcrumb">
              <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li><a href="{{ route('admin.dashboard') }}">Manage Chat</a></li>
              <li class="active">Chat</li>
            </ol>
          </header>
        </div>
      </div>
    </div>
  </div>
  <div id="content" class="container-fluid">
    <div class="content-body">
    <div class="row">
      <div class="col-xs-12">
        <div class="card card-data-tables product-table-wrapper">
          <header class="card-heading">
            <h2 class="card-title">Chat</h2>
             @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong style="color: green;">Success!</strong>
                {{ session('msg') }}
            </div>
              @endif

            <small class="dataTables_info"></small>
          </header>
          <div class="card-body p-0">
            
            <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <div class="card">
                <div class="card-body">
                   <div class='chat-wrapper scrollbar'>
        <div class='chat-message' id="my-chat-message" style="overflow-x: scroll !important;height: 100px !important;">
          @forelse($chat_history as $chat)
          @if($chat->from_user_id!=Auth::id())
          <div class='chat-message
          chat-message-recipient'>
          <img class='chat-image chat-image-default' src="{{asset($chat->user->image)}}" />
          <div class='chat-message-wrapper'>
            <div class='chat-message-content'>
              <p>{{$chat->message}}
              </p>
            </div>
            <div class='chat-details'> <span class=' small'> {{$chat->created_at}}</span>
            </div>
          </div>
        </div>
        @else
        <div class='chat-message chat-message-sender'>
          <img class='chat-image chat-image-default' src="{{asset($chat->user->image)}}" />
          <div class='chat-message-wrapper '>
            <div class='chat-message-content'>
              <p>{{$chat->message}}</p>
            </div>
            <div class='chat-details'>
              <span class='small'>{{$chat->created_at}}</span>
            </div>
          </div>
        </div>
        @endif
        @empty
        @endforelse
  </div>
</div>
<footer id="compose-footer">
    <form class="form-horizontal compose-form" action="{{route('user.chat.store')}}" method="post" enctype="multipart/form-data" id="chat_start">
     @csrf
        @if(Auth::check())
          <input type="hidden" name="from_user_id" value="{{Auth::id()}}">
          @endif
          <input type="hidden" name="to_user_id" id="to_user_id" value="{{$to_user_id}}">
    <div class="form-group m-10 p-l-75 is-empty">
      <div class="input-group"> <label class="sr-only">Leave a comment...</label>
        <input type="text" name="message" class="form-control form-rounded input-lightGray chat_msg" placeholder="Leave a
        comment.."> <span class="input-group-btn"> <button type="button" class="btn
          btn-blue btn-fab  btn-fab-sm"> <i class="zmdi zmdi-mail-send"></i> </button>
        </span>
      </div>
    </div>
  </form>
</footer>
     
                   
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

</div>

@endsection
@section('script2')
<script type="text/javascript">
jQuery(document).ready(function(){
  console.log('bangladesh is ourt');
  jQuery('#chat_start').submit(function(e){
    e.preventDefault();
      var msg =$(this).serializeArray();
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
          async: true,
          processData:false,
          cache: false,
          dataType: "json",
          success: function(data){
            console.log(data);
            $(".chat_msg").val('');
             //$(".chat-message").empty();
             
               var html='<div class="chat-message chat-message-sender"><img class="chat-image chat-image-default" src="{{asset('/')}}'+data.chat.user.image+'" /><div class="chat-message-wrapper"><div class="chat-message-content"><p> '+data.chat.message+'</p></div><div class="chat-details"><span class=" small"> '+data.chat.created_at+'</span></div></div></div>';
              $("#my-chat-message").append(html);
            
           
             var names=['message'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
              //location.reload();
             if (data.error) {toastr.error(data.error);}
             if (data.success) {
               //toastr.options.showDuration = '2000';
              //toastr.success(data.success);
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

});
setInterval(function(){
  update_chat_history_data();
 }, 1000);
function update_chat_history_data()
 {
  var user_id = {!! json_encode($to_user_id) !!};
  var url = "{{ route('user.chat.show', ":id") }}";
  url = url.replace(':id', user_id);
 // console.log(url);
   $.ajax({
   url:url,
   method:"GET",
   data:{to_user_id:user_id},
   success:function(data){
     $("#my-chat-message").empty();
     $.each(data,function (key, value) {
      //console.log(data);
      if (value.from_user_id==user_id) {
         var html='<div class="chat-message chat-message-recipient"><img class="chat-image chat-image-default" src="{{asset('/')}}'+value.photographer.image+'" /><div class="chat-message-wrapper"><div class="chat-message-content"><p> '+value.message+'</p></div><div class="chat-details"><span class=" small"> '+value.created_at+'</span></div></div></div>';
        $("#my-chat-message").append(html);
      }else{
         var html='<div class="chat-message chat-message-sender"><img class="chat-image chat-image-default" src="{{asset('/')}}'+value.user.image+'" /><div class="chat-message-wrapper"><div class="chat-message-content"><p> '+value.message+'</p></div><div class="chat-details"><span class=" small"> '+value.created_at+'</span></div></div></div>';
        $("#my-chat-message").append(html);

      }
    //console.log(value.message);
  });
   }
  });
 }
});
</script>
@endsection