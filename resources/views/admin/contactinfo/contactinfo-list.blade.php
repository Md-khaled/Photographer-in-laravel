@extends('admin.master')
@section('content')
<section id="content_outer_wrapper">
<div id="content_wrapper" class="card-overlay">
  <div id="header_wrapper" class="header-md ecom-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <header id="header">
            <h1>Profile Photo</h1>
            <ol class="breadcrumb">
              <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li><a href="{{route('admin.manage-contactinfo.index')}}">Photograph</a></li>
              <li class="active">Profile Photo</li>
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
            <h2 class="card-title">Manage Profile Pic</h2>
              @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong style="color: green;">Success!</strong>
                {{ session('msg') }}
            </div>
              @endif
            <small class="dataTables_info"></small>
            <div class="card-search">
              <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                <i class="zmdi zmdi-search search-icon-left"></i>
                <input type="text" class="form-control filter-input" placeholder="Filter Products..." autocomplete="off">
                <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close"><i class="zmdi zmdi-close"></i></a>
              </div>
            </div>
            <ul class="card-actions icons right-top">
              <li id="deleteItems" style="display: none;">
                <span class="label label-info pull-left m-t-5 m-r-10 text-white"></span>
                <a href="javascript:void(0)" id="confirmDelete" data-toggle="tooltip" data-placement="top" data-original-title="Delete Product(s)">
                  <i class="zmdi zmdi-delete"></i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" data-card-search="open" data-toggle="tooltip" data-placement="top" data-original-title="Filter Products">
                  <i class="zmdi zmdi-filter-list"></i>
                </a>
              </li>
              <li class="dropdown" data-toggle="tooltip" data-placement="top" data-original-title="Show Entries">
                <a href="javascript:void(0)" data-toggle="dropdown">
                  <i class="zmdi zmdi-more-vert"></i>
                </a>
                <div id="dataTablesLength">
                </div>
              </li>
              <li>
                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="Export All">
                  <i class="zmdi zmdi-inbox"></i>
                </a>
              </li>
            </ul>
          </header>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-2">Photo Title</th>
                    <th data-orderable="false" class="col-xs-2" width="50%">Image</th>
                    <th class="col-xs-1">Created At</th>
                    <th data-orderable="false" class="col-xs-1">Action</th>
                    <th data-orderable="false" class="col-xs-2">
                      <button class="btn btn-primary btn-fab  animate-fab" data-toggle="modal" data-target="#pic_add_modal"><i class="zmdi zmdi-plus"></i></button>
                    </th>

                  </tr>
                </thead>
                <tbody id="rowadd">
                  @forelse($profiles as $profile)
                  <tr>
                    <td>{{$profile->title}}</td>
                    <td><img src="{{asset($profile->image)}}" alt="" class="img-thumbnail" /></td>
                    <td>{{$profile->created_at}}</td>
                    <td >
                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
                        <i class="zmdi zmdi-caret-down"></i></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation">
                            <a style="padding-left: 2px !important" href="{{route('admin.manage-contactinfo.edit',$profile->id)}}"><i class="zmdi zmdi-edit"></i></a>
                          </li>
                          <li role="presentation">
                           <form action="{{route('admin.manage-contactinfo.destroy',$profile->id)}}" method="post" onsubmit="return confirm('Are you sure?');">
                             @csrf
                             @method('DELETE')
                             <button  style="border: none; background-color: transparent;outline: none;cursor: pointer;"><i class="zmdi zmdi-delete"></i></button>
                         </form>
                         </form>
                         </a>
                          </li>   
                        </ul>
                      </div>
                      <td width="5%"></td>
                      </td>
                   <!-- <td><a href="javascript:void(0)" id="product-edit" class="icon edit-product"><i class="zmdi zmdi-edit"></i></a></td>-->
                  </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <aside class="drawer-right-lg mw-lightGray drawer-fixed ecom-edit-panel">
    <div class="drawer-content">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 General Info
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <div class="card">
                <div class="card-body">
                   <form class="form-horizontal"  method="POST" enctype="multipart/form-data" id="editFormSubmit">
                        @csrf
                    
                    <div class="form-group label-floating">
                      <label class="control-label">Title</label><br>
                      <input type="text" class="form-control" name="title" id="editTitle">
                    </div>
                    <div class="form-group">
                      <div id="edit_product_desc">Say hello to a triangular cluster of neatly organized chaos, wrapped in a tasty cyan-to-magenta rainbow roll and deep-fried to imperfection.</div>
                    </div>
                    <div class="chips chips-placeholder"></div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>
</div>
@include('admin.include.footer')
</section>

</div>
<!--modal product add-->
<div class="modal fade" id="pic_add_modal" tabindex="-1" role="dialog" aria-labelledby="tab_modal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header p-b-15">
              
              <h4 class="modal-title">Product Setup</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
                
              </ul>
            </div>
            <div class="modal-body p-0">
              <div class="tabpanel">
                <ul class="nav nav-tabs p-0">
                  <li class="active" role="presentation"><a href="#product_add_general" data-toggle="tab" aria-expanded="true">General Info</a></li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane fadeIn active" id="product_add_general">
                  <div class="card card p-20 p-t-10 m-b-0">
                    <div class="card-body">
                      <form class="form-horizontal" action="{{route('admin.manage-contactinfo.store')}}" method="post" enctype="multipart/form-data" id="createPic">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group label-floating is-empty">
                          <label class="control-label">Photo Title</label>
                          <input type="text" class="form-control" name="title" value="{{old('title')}}">
                          @error('title')
                           <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <br>
                          <span class="text-danger" id="title"></span>
                        </div>
                        <div class="form-group ">
                           <p><img id="blah" alt="" width="150" class="rounded"></p>
                           <input type="file" id="avatar" name="image" class="custom-file-input">
                            <label for="avatar" class="custom-file-label">Choose Photo file</label>
                             @error('image')
                             <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <span class="text-danger" id="image"></span>

                        </div>
                         
                         
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Pic</button>
              </div>
              </form>
            </div>
            <!-- modal-content -->
          </div>
          <!-- modal-dialog -->
        </div>
@endsection