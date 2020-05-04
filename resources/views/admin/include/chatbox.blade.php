<section id="chat_compose_wrapper">
	<div class="tippy-top">
		<div class="recipient">Allison Grayce</div>
		<ul class="card-actions icons right-top">
			<li>
				<a href="javascript:void(0)">
					<i class="zmdi zmdi-videocam"></i>
				</a>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
					<i class="zmdi zmdi-more-vert"></i>
				</a>
				<ul class="dropdown-menu btn-primary dropdown-menu-right">
					<li>
						<a href="javascript:void(0)">Option One</a>
					</li>
					<li>
						<a href="javascript:void(0)">Option Two</a>
					</li>
					<li>
						<a href="javascript:void(0)">Option Three</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)" data-chat="close">
					<i class="zmdi zmdi-close"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="chat-wrapper scrollbar">
		<div class="chat-message ">
		</div>
	</div>
	<footer id="compose-footer">
		<form class="form-horizontal compose-form" action="{{route('user.chat.store')}}" method="post" enctype="multipart/form-data" id="chat_start">
			 @csrf
			  @if(Auth::check())
		      <input type="hidden" name="from_user_id" value="{{Auth::id()}}">
		      @endif
		      <input type="hidden" name="to_user_id" id="to_user_id">
			<ul class="card-actions icons left-bottom">
				<li>
					<a href="javascript:void(0)">
						<i class="zmdi zmdi-attachment-alt"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="zmdi zmdi-mood"></i>
					</a>
				</li>
			</ul>
			<div class="form-group m-10 p-l-75 is-empty">
				<div class="input-group">
					<span class="text-danger" id="message"></span>
					<label class="sr-only">Leave a comment...</label>
					<input type="text" name="message" class="form-control form-rounded input-lightGray chat_msg" placeholder="Leave a comment..">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-blue btn-fab  btn-fab-sm">
							<i class="zmdi zmdi-mail-send"></i>
						</button>
					</span>
				</div>
			</div>
		</form>
	</footer>
</section>
@section('script')
<script type="text/javascript">
	//console.log('from chatbox');
</script>
@endsection