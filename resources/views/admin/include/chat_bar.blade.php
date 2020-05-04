<aside id="app_sidebar-right">
	<div class="sidebar-inner sidebar-overlay">
		<div class="tabpanel">
			<ul class="nav nav-tabs nav-justified">
				<li class="active" role="presentation"><a href="#sidebar_chat" data-toggle="tab" aria-expanded="true">Chat</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="sidebar_chat">
					<form class="m-l-15 m-r-15 m-t-30">
						<div class="input-group search-target">
							<span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
							<div class="form-group is-empty">
								<input type="text" value="" placeholder="Filter contacts..." class="form-control" data-search-trigger="open">
							</div>
						</div>
					</form>
					<ul class="description">
						<li class="title">
							Online
						</li>
					</ul>
					<ul class="list-group p-0">
						@forelse($photographers as $photographer)
						<li class="list-group-item" data-chat="open" data-chat-name="{{$photographer->name}}" data-touserid="{{$photographer->id}}">
							<span class="pull-left"><img src="{{asset('storage/app/public/admin/img/profiles')}}/07.jpg" alt="" class="img-circle max-w-40 m-r-10 "></span>
							<i class="badge mini success status"></i>
							<div class="list-group-item-body">
								<div class="list-group-item-heading">{{$photographer->name}}</div>
								<div class="list-group-item-text">{{$photographer->district->name}}</div>
							</div>
						</li>
						@empty
						@endforelse
						
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</aside>
@section('script2')
<script type="text/javascript">
jQuery(document).ready(function(){
  var elems = document.querySelectorAll('*');
var arr = [];
for (var i = 0, len = elems.length; i < len; i++) {
  arr.push(elems[i]);
}
 // console.log('bangladesh');
  $('[data-chat]').on('click', function (e) {

     var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('chat-name');
  $(".recipient").text(to_user_name);
  $("#to_user_id").val(to_user_id);
  console.log(to_user_name);
      var $body = $('body'),
          element = $(this),
          className = element.data('chat'),
          $target = $('#chat_compose_wrapper');
      if (className == 'open') {
        if ($target.hasClass(className)) {
          $target.removeClass(className);
        } else {
          $target.addClass(className);
        }
      }
      if (className == 'close') {
        $target.removeAttr('class');
      }
    });
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
             $(".chat-message").empty();
             $.each(data.chat,function (key, value) {
               var html='<div class="chat-message chat-message-recipient"><img class="chat-image chat-image-default" src="{{asset('storage/app/public/admin/img/profiles')}}/05.jpg" /><div class="chat-message-wrapper"><div class="chat-message-content"><p>Hey Mike, we have funding for our new project!</p></div><div class="chat-details"><span class="today small"></span></div></div></div>';
              $(".chat-message").append(html);
             });
           
             var names=['message'];
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
});
</script>
@endsection