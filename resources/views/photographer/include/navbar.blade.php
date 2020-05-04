<style type="text/css">
	.myimgstyle{display:block;width:160px;height:160px;-webkit-border-radius:50%;-moz-border-radius:50%;-ms-border-radius:50%;border-radius:50%;margin:0 auto;margin-bottom:10px}
	a:hover{text-decoration: none !important; }
</style>
<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
<h1 id="colorlib-logo"><a href="{{route('user.photographer.show',$photographer->id)}}"><img src="{{asset($photographer->image)}}" class="myimgstyle">
	
{{$photographer->name}}</a></h1>
<nav id="colorlib-main-menu" role="navigation">
<ul>
<li class="colorlib-active"><a href="{{route('home')}}">Home</a></li>
<li><a href="{{route('user.collection.show',$photographer->id)}}">Collection</a></li>
<li><a href="{{route('user.photographer.edit',$photographer->id)}}">Hire Me</a></li>
@if(Auth::check())
<li>
	<a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="zmdi zmdi-sign-in"></i>{{ __('Sign Out') }}</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
</li>
@endif
</ul>
</nav>

</aside>