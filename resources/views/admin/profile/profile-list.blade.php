@extends('admin.master')
@section('content')
<section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
          <div id="header_wrapper" class="header-xl  profile-header" style="background-image: url('{{asset('/public/admin/assets/img/headers/header-lg-03.jpg')}}');">
          </div>
          <div id="content" class="container-fluid">
            <div class="row">
              <div class="col-xs-12">
                <div class="card card-transparent">
                  <div class="card-body wrapper">
                    <div class="row">
                      <div class="col-md-12 col-lg-3">
                        <div class="card type--profile">
                          <header class="card-heading">
                            <img src="{{asset(Auth::user()->image)}}" alt="" class="img-circle">
                           
                            
                          </header>
                          <div class="card-body">
                            <h3 class="name">{{Auth::user()->name}}</h3>
                            <span class="title">{{ Auth::user()->role==2 ? 'Photographer' : 'Admin'}}</span>
                            <button type="button" class="btn btn-primary btn-round hide">Connect</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-8">
                        <div class="card">
                          <header class="card-heading p-0">
                            <div class="tabpanel m-b-30">
                              <ul class="nav nav-tabs nav-justified">
                                <li class="active " role="presentation"><a href="#profile-timeline" data-toggle="tab" aria-expanded="true">Profile</a></li>
                                @if(Auth::user()->role==1)
                                <li role="presentation"><a href="#profile-about" data-toggle="tab" aria-expanded="true">About Me</a></li>
                                @endif
                                <li role="presentation"><a href="#profile-contacts" data-toggle="tab" aria-expanded="true">Change Password</a></li>
                              </ul>
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
                              </script>
                              @endsection
                              
                            </div>
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane fadeIn active" id="profile-timeline">
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                                      <article>
                                        <div class="card card-comment" data-timeline="text">
                                          <div class="card-body">
                                            <form action="{{route('admin.profile.update',$user->id)}}" method="post" enctype="multipart/form-data" id="updateProfile">
                                              @csrf
                                            @method('PATCH ')
                                              <div class="form-group label-floating is-empty">
                                              <label class="control-label">Name</label><br>
                                              <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                              @error('name')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                              <span class="text-danger" id="name"></span>
                                            </div>
                                            <div class="form-group label-floating is-empty">
                                              <label class="control-label">Mobile</label><br>
                                              <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}">
                                              @error('mobile')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                              <span class="text-danger" id="mobile"></span>
                                            </div>
                                            <div class="form-group ">
                                               <p><img src="{{asset($user->image)}}" id="blah" alt="" width="150" class="rounded"></p>
                                               <input type="file" id="avatar" name="image" class="custom-file-input" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <label for="avatar" class="custom-file-label">Choose Pic file</label>
                                                 @error('image')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="image"></span>

                                            </div>
                                            <div class="form-group  is-empty">
                                              <label class="control-label">Address</label>
                                              <textarea class="form-control" name="address" rows="5">{{$user->address}}</textarea>
                                              @error('address')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                             <span class="text-danger" id="address"></span>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                          </form>
                                          </div>
                                           
                                          </div>
                                        </article>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="tab-pane fadeIn" id="profile-about">
                                      <div class="card card-transparent m-b-0">
                                        <div class="card-body p-t-0">
                                         <form action="{{route('admin.profile.aboutMe',$user->id)}}" method="post" enctype="multipart/form-data" id="aboutMself">
                                              @csrf
                                              @method('PATCH ')
                                              <div class="form-group label-floating is-empty">
                                              <label class="control-label">Title</label><br>
                                              <input type="text" class="form-control" name="title" value="{{$user->title}}">
                                              @error('title')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                              <span class="text-danger" id="title"></span>
                                            </div>
                                            <div class="form-group  is-empty">
                                              <label class="control-label">About Me</label>
                                              <textarea class="form-control" name="aboutme" rows="5">{{$user->about_me}}</textarea>
                                              @error('aboutme')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                             <span class="text-danger" id="aboutme"></span>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="tab-pane fadeIn" id="profile-contacts">
                                      <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="card type--profile m-10">
                                                  <div class="card-body">
                                                   <form action="{{route('admin.profile.changePassword',$user->id)}}" method="post" enctype="multipart/form-data" id="changePassword">
                                              @csrf
                                            @method('PATCH ')
                                              <div class="form-group label-floating is-empty">
                                              <label class="control-label">Current Password</label><br>
                                              <input type="password" class="form-control" name="current_password">
                                              @error('current_password')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                              <span class="text-danger" id="current"></span>
                                            </div>
                                            <div class="form-group label-floating is-empty">
                                              <label class="control-label">New Password</label><br>
                                              <input type="password" class="form-control" name="new_password">
                                              @error('new_password')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                              <span class="text-danger" id="new"></span>
                                              <span class="text-danger" id="char"></span>
                                            </div>
                                            <div class="form-group label-floating is-empty">
                                              <label class="control-label">Confirm Password</label><br>
                                              <input type="password" class="form-control" name="confirm_password">
                                              @error('confirm_password')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <br>
                                              <span class="text-danger" id="confirm"></span>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                          </form>
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
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>

                          @include('admin.include.footer')
                          </section>
@endsection