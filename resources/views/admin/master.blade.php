<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/app/public/profile/icon.png') }}" type="image/x-icon">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css') }}/vendor.bundle.css">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css') }}/app.bundle.css">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css') }}/theme-a.css">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css') }}/toastr.min.css">
    
</head>
<body>
	<div id="app_wrapper">
@include('admin.include.header_nav')
@include('admin.include.sidebar_left')

@yield('content')

@include('admin.include.chat_bar')
@include('admin.include.chatbox')
</div>
<div class="modal fade" id="schedule_modal" tabindex="-1" role="dialog" aria-labelledby="schedule_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-2">Title goes here</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in ligula id sem tristique ultrices eget id neque. Duis enim turpis, tempus at accumsan vitae, lobortis id sapien. Pellentesque nec orci mi, in pharetra ligula. Nulla facilisi. Nulla
					facilisi. Mauris convallis venenatis massa, quis consectetur felis ornare quis. Sed aliquet nunc ac ante molestie ultricies. Nam pulvinar ultricies bibendum.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-success">Ok</button>
				</div>
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	 <script src="{{ asset('public/admin/assets/js') }}/vendor.bundle.js"></script>
	<script src="{{ asset('public/admin/assets/js') }}/app.bundle.js"></script>
	<script src="{{ asset('public/admin/assets/js') }}/custom.js"></script>
	 <script src="{{ asset('public/admin/assets/js') }}/toastr.min.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

	@yield('script')
	@yield('script2')
</body>


<!-- Mirrored from materialwrap-html.authenticgoods.co/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jan 2020 16:55:39 GMT -->
</html>
