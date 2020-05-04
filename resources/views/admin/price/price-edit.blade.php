@extends('admin.master')
@section('content')
<section id="content_outer_wrapper">
<div id="content_wrapper" class="card-overlay">
  <div id="header_wrapper" class="header-md ecom-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <header id="header">
            <h1>Price</h1>
            <ol class="breadcrumb">
              <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li><a href="{{route('admin.manage-price.index')}}">Manage Price</a></li>
              <li class="active">Price</li>
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
            <h2 class="card-title">Update Price</h2>
             @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong style="color: green;">Success!</strong>
                {{ session('msg') }}
            </div>
              @endif
            <a href="{{route('admin.manage-price.index')}}" class="btn btn-primary  pull-right"><i class="zmdi zmdi-arrow-left"></i></a>

            <small class="dataTables_info"></small>
          </header>
          <div class="card-body p-0">
            
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
                   <form action="{{route('admin.manage-price.update',$price->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH ')
                        <div class="form-group label-floating is-empty">
                               <label class="control-label">Category Name</label><br/>
                              @forelse ($category as $cat)
                               @if($cat->id==$price->category_id)
                                <input type="text" class="form-control" name="categoryid" value="{{$cat->name}}" readonly="readonly">
                              @endif
                              @empty
                              @endforelse
                            @error('categoryid')
                             <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <span class="text-danger" id="categorid"></span>
                        </div>
                        <div class="form-group label-floating is-empty">
                          <label class="control-label">Day Price</label><br/>
                          <input type="text" class="form-control" name="dayprice" value="{{$price->day_price}}">
                          @error('dayprice')
                           <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <br>
                          <span class="text-danger" id="dayprice"></span>
                        </div>
                        <div class="form-group label-floating is-empty">
                          <label class="control-label">Hourly Price</label><br/>
                          <input type="text" class="form-control" name="hourprice" value="{{$price->hour_price}}">
                          @error('hourprice')
                           <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <br>
                          <span class="text-danger" id="hourprice"></span>
                        </div>
                       
                        
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Pic</button>
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
</section>

</div>

@endsection