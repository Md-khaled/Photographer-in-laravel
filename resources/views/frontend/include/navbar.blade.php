<div class="navbar navbar-default default" role="navigation">
      <div class="navbar-header">
        <div class="navbar-brand"><a href="index.html"><img src="#" srcset="{{asset('public/front')}}/style/images/logo.png 1x, {{asset('public/front')}}/style/images/logo@2x.png 2x" alt="" /></a></div>
        <div class="nav-bars-wrapper">
          <div class="nav-bars-inner">
            <div class="nav-bars" data-toggle="collapse" data-target=".navbar-collapse"><span></span></div>
          </div>
          <!-- /.nav-bars-inner --> 
        </div>
        <!-- /.nav-bars-wrapper -->
        <div class="header-other">
          <div class="btn-group pull-right text-right"> <a href="#" class="share-button btn btn-light dropdown-toggle" data-toggle="dropdown"><span></span><i class="fa fa-user" aria-hidden="true"></i> &nbsp{{Auth::user()->name??'Login'}}</a>
            <div class="dropdown-menu">
              <style type="text/css">
                .mystyle {
                  display: block;
                  padding: 6px 10px;
                  border-top: 1px solid rgba(0,0,0,0.1);
                  text-transform: uppercase;
                  font-size: 11px;
                  letter-spacing: 1.5px;
                  font-weight: 900;
                  color: #3c3c3c;
                  text-align: center;
              }
              </style>
              <div class="goodshare-wrapper"> 
                @if (Route::has('login'))
                
                    @auth
                     
                      <a class="mystyle" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp {{ __('LogOut') }}</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                  
                    @else
                        <a class="mystyle" href="{{ route('admin.dashboard') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbspLogin</a>
                    @endauth
                
            @endif
                </div>
              <!-- /.goodshare-wrapper --> 
            </div>
            <!-- /.dropdown-menu --> 
          </div>
          <!-- /.btn-group --> 
        </div>
        <!-- /.header-other --> 
      </div>
      <!-- /.navbar-header -->
      <div class="nav-wrapper">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#!">Location <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @forelse($districts as $district)
                <li><a href="{{route('sreach-by-location',$district->id)}}">{{$district->name}}</a></li>
                @empty
                <li><a href="#"></a></li>
                @endforelse
              </ul>
            </li>
           <!--  <li><a href="#">Contact</a></li> -->
              <li><a href="{{ route('user.services.create') }}">Services</a></li>       
              <li><a href="{{ route('user.contact.index') }}">Contact</a></li>       
              <li><a href="{{ route('user.contact.create') }}">About</a></li>  
              @if (Auth::check())
              <li>   <a href="{{ url('admin/dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
              @endif     
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
      <!--/.nav-wrapper --> 
    </div>