@extends('admin.master')
@section('content')
<section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
          <div id="header_wrapper" class="header-lg overlay ecom-header">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <header id="header">
                    <h1>Welcome back, {{Auth::user()->name}}.</h1>
                    <small>Here’s what’s happening with your store right now.</small>
                  </header>
                </div>
              </div>
            </div>
          </div>
          <div id="content" class="container">
            <div class="content-body">
               @if(Auth::user()->role==0)
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="card sales-card">
                  <header class="card-heading ">
                    <h2 class="card-title">Total Photographer</h2>
                    <ul class="card-actions icons right-top">
                      <li>
                        <a href="javascript:void(0)" data-toggle="refresh">
                          <i class="zmdi zmdi-refresh-alt"></i>
                        </a>
                      </li>
                     
                    </ul>
                  </header>
                  <div class="card-body newSignups">
                    <div class="row">
                      <div class="col-sm-12">
                        <h2 class="timer" data-from="0" data-to="{{$totaluser->photographer}}" data-speed="1000" data-refresh-interval="50"></h2>
                        <span class="timer users block" data-from="0" data-to="{{$totaluser->total}}" data-speed="1000" data-refresh-interval="50"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <div class="card sales-card">
                  <header class="card-heading ">
                    <h2 class="card-title">Total user</h2>
                    <ul class="card-actions icons right-top">
                      <li>
                        <a href="javascript:void(0)" data-toggle="refresh">
                          <i class="zmdi zmdi-refresh-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </header>
                  <div class="card-body newSignups">
                    <div class="row">
                      <div class="col-sm-12">
                        <h2 class="timer" data-from="0" data-to="{{$totaluser->user}}" data-speed="1000" data-refresh-interval="50"></h2>
                        <span class="timer users block" data-from="0" data-to="{{$totaluser->total}}" data-speed="1000" data-refresh-interval="50"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(Auth::user()->role!=0)
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="card sales-card">
                  <header class="card-heading ">
                    <h2 class="card-title">Total Completed Order</h2>
                    <ul class="card-actions icons right-top">
                      <li>
                        <a href="javascript:void(0)" data-toggle="refresh">
                          <i class="zmdi zmdi-refresh-alt"></i>
                        </a>
                      </li>
                     
                    </ul>
                  </header>
                  <div class="card-body newSignups">
                    <div class="row">
                      <div class="col-sm-12">
                        <h2 class="timer" data-from="0" data-to="{{$totalorder->completed}}" data-speed="1000" data-refresh-interval="50"></h2>
                        From <span class="timer orders inline" data-from="0" data-to="{{$totalorder->total}}" data-speed="1000" data-refresh-interval="50"></span> Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <div class="card sales-card">
                  <header class="card-heading ">
                    <h2 class="card-title">Total Pending Order</h2>
                    <ul class="card-actions icons right-top">
                      <li>
                        <a href="javascript:void(0)" data-toggle="refresh">
                          <i class="zmdi zmdi-refresh-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </header>
                  <div class="card-body newSignups">
                    <div class="row">
                      <div class="col-sm-12">
                        <h2 class="timer" data-from="0" data-to="{{$totalorder->pending}}" data-speed="1000" data-refresh-interval="50"></h2>
                        From <span class="timer  inline" data-from="0" data-to="{{$totalorder->total}}" data-speed="1000" data-refresh-interval="50"></span> Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(Auth::user()->role!=2)
            <div class="row">
              <div class="col-xs-12">
               <div id="piechart" style="width: 100%; height: 500px;"></div>
              </div>
            </div>
            @endif
          </div>
          
        </div>
      </div>
      @include('admin.include.footer')
        </section>
@endsection
@section('script')
<script type="text/javascript">
  @if(Auth::user()->role==1)
@if (session()->has('danger1'))
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.hideMethod = 'noop';
    // toastr.options.showDuration = '5000';
    toastr.error("{{ session('danger1') }}");
@endif
 @if (session()->has('danger2'))
  //toastr.options.showDuration = '5000';
toastr.options.positionClass = 'toast-bottom-right';
toastr.options.hideMethod = 'noop';
    toastr.error("{{ session('danger2') }}");
@endif
   @endif                           
   var bb={!! json_encode($array) !!};
   var final = [];
  
 // console.log(bb);
 google.charts.load('current', {'packages':['corechart']});  
 google.charts.setOnLoadCallback(drawChart);  
   function drawChart() {

        var data = google.visualization.arrayToDataTable(bb);

        var options = {
           title: 'Percentage of visitors',  
           is3D:true, 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
@endsection