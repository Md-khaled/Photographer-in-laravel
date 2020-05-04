<header id="app_topnavbar-wrapper">
			<nav role="navigation" class="navbar topnavbar">
				<div class="nav-wrapper">
					<ul class="nav navbar-nav pull-left left-menu">
						<li class="app_menu-open">
							<a href="javascript:void(0)" data-toggle-state="app_sidebar-left-open" data-key="leftSideBar">
								<i class="zmdi zmdi-menu"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav left-menu hidden-xs">
						<li>
							<a href="{{ route('home') }}" class="nav-link">
								<span>Home</span>
							</a>
						</li>
						
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown avatar-menu">
							<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
								<span class="meta">
									<span class="avatar">
										<img src="{{asset(Auth::user()->image)}}" alt="" class="img-circle max-w-35">
										<i class="badge mini success status"></i>
									</span>
									<span class="name">{{Auth::user()->name}}</span>
									<span class="caret"></span>
								</span>
							</a>
							<ul class="dropdown-menu btn-primary dropdown-menu-right">
								<li>
									<a href="{{ route('admin.profile.index') }}"><i class="zmdi zmdi-account"></i> Profile</a>
								</li>
								<li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="zmdi zmdi-sign-in"></i>{{ __('Sign Out') }}</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
								</li>
							</ul>
						</li>
						
						<li class="dropdown hidden-xs hidden-sm">

							<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
								<span class="badge mini status danger" style="font-size: 20px;  color: black;">{{$chatuser['totalchat']!=0?$chatuser['totalchat']:''}}</span>
								<i class="zmdi zmdi-notifications"></i>
							</a>
							<ul class="dropdown-menu dropdown-lg-menu dropdown-menu-right dropdown-alt" style="overflow-y: scroll;height: 300px; font-size: 20px;">
								@forelse($chatuser as $chatusr)
								@if($chatusr['lastmsg']!=null)
								<li>
									<a href="{{route('user.chat_to_user.show',$chatusr['id'])}}" style="padding: 0px !important;">
									<div class="card">
										<div class="card-body">
											<ul class="list-group ">
												<li class="list-group-item ">
													<span class="pull-left"><img src="{{asset($chatusr["image"])}}" alt="" class="img-circle max-w-40 m-r-10 "></span>
													<div class="list-group-item-body">
														<div class="list-group-item-heading">{{$chatusr['name']}} {{ $chatusr['unseen']!=0 ?'('.$chatusr['unseen'].')': '' }}</div>
														<div class="list-group-item-text">{{$chatusr['lastmsg']??''}}</div>
													</div>
												</li>
												
											</ul>
										</div>
									</div>
									</a>
								</li>
								@endif
								@empty
								@endforelse
								<li class="dropdown-menu-footer hide">
									<a href="javascript:void(0)">
										All notifications
									</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
				<form role="search" action="#" class="navbar-form" id="navbar_form">
					<div class="form-group">
						<input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
						<i data-navsearch-close class="zmdi zmdi-close close-search"></i>
					</div>
					<button type="submit" class="hidden btn btn-default">Submit</button>
				</form>
			</nav>
		</header>