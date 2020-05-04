@extends('photographer.master')
@section('content')
<div id="colorlib-main">
<section class="ftco-section ftco-bread">
<div class="container">
<div class="row no-gutters slider-text justify-content-center align-items-center">
<div class="col-md-8 ftco-animate">
<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Hire Me</span></p>
<h1 class="bread">Hire Me</h1>
</div>
</div>
</div>
</section>
<section class="ftco-section contact-section">
<div class="container">

<div class="row block-9">
<div class="col-md-10 d-flex">

<form class="bg-light p-5 contact-form" action="{{route('user.photographer.store')}}" method="post" enctype="multipart/form-data" id="">
@csrf
<div class="form-group">
	@if(session()->has('msg'))
	<div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong style="color: green;">Success!</strong>
    {{ session('msg') }}
</div>
  @endif
  </div>
  @if(Auth::check())
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
@endif
<input type="hidden" name="photographer_id" value="{{$photographer->id}}">
<div class="form-group">
	<select class="form-control" name="category_id" required="required" id="category_id">
		<option value="">Select Services</option>
		@forelse($price as $pr)
		<option value="{{$pr->category->id}}">{{$pr->category->name}}</option>
		@empty
		@endforelse
	</select>
	@error('category_id')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group"  >
<div class='input-group date'>
  <input type='text' name="start_date" class="form-control" id='datetimepicker1' placeholder="Enter date"/>
</div>
@error('start_date')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group"  >
<div class='input-group date' style="display: none;">
  <input type='text'  class="form-control" id='datetimepicker2' placeholder="Enter date"/>
</div>
@error('end_date')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group" id="times" style="display: none;">
<input type="time" class="form-control" placeholder="Subject" >
@error('times')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class=" form-group">
 <input type="number" class="form-control col-md-12 mb-4" id="nday" name="nday" min="1" title="Number Of Hire Day" placeholder="Number Of Hire Day"><br>
 @error('nday')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class=" form-group">
 <input type="text" class="form-control col-md-12 mb-4" name="total" id="Total" placeholder="Price automically calculate">
 @error('total')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Transaction ID" name="transaction_id">
@error('transaction_id')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<!--style="width: 30rem;" //it use for reponsive -->
<div class="form-group alert alert-success  text-wrap">
<h3> Payment</h3>
  <p>
    <strong>bkash No :  {{$photographer->mobile}}</strong>
    <br>
    <strong>Account Type: Personal</strong>
  </p>
  <p  class="text-break">
   Please send the above money to this Bkash No and write your transaction code below there..
  </p>
   
</div>

<div class="form-group">
<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5 pull-right">
</div>
</form>
</div>
<div class="col-md-6 d-flex">
<div>

</div>
</div>
</div>
</div>
</section>
@endsection
@section('script')
<script type="text/javascript">
$( document ).ready(function() {
		//format:'YYYY-MM-DD hh:mm:ss',
		var booking = {!! json_encode($booking->toArray()) !!};
	$(function() {
		var dateRange = []; 
		$.each(booking, function( index, value ){
var startDate = value.start_date, // some start date
    endDate  = value.end_date; // some end date
    
    for (var d = new Date(startDate); d <= new Date(endDate); d.setDate(d.getDate() + 1)) {
     dateRange.push( moment(d,'YYYY-MM-DD').toDate());
}
});
console.log(booking);

	var dd=["2020-03-20","2020-03-26"];
  $('#datetimepicker1').datetimepicker({
  	format:'YYYY-MM-DD',
  	 disabledDates: dateRange
                   
                        
  });
   $('#datetimepicker2').datetimepicker({
  	format:'YYYY-MM-DD',
  });
});
	  $("#nday").bind("keyup change",function(e){
  	var cat=$("#category_id").val();
  	var status = $(this).val();
  	var users = {!! json_encode($price->toArray()) !!};
	console.log(users);
	$.each(users, function( index, value ){
		if (value.category_id==cat) {
			$("#Total").val(value.day_price*status);
    console.log(value.day_price*status);

		}
});
  	console.log(cat);
  	console.log(status);
});

	
});
 
</script>
@endsection