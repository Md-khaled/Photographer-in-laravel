jQuery(document).ready(function(){
	 function readURL(input) {
	 	 console.log(input);
        if (input.files && input.files[0]) {

            var reader = new FileReader();
            
            reader.onload = function (e) {

                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar").change(function(){
        readURL(this);
    });
    function removeImage() {
        $('#blah').attr('src', ' ');
//      $("#remove").val(1);
    }
    function removetxt() {
    	 var names=['title','categorid','photo','description'];
          	 $.each(names,function (key, value) {

                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');
                            
                        });
    }
 jQuery('#createFormSubmit').submit(function(e){
 	  e.preventDefault();
 	  var img = document.createElement("img");
       var photos =$(this).serializeArray();
       //var img =$('avatar').val();
       //var formData = new FormData(this)[0].files[0];
       //var url = "http://localhost/photograph/admin/manage-photos";
      //var url = "{{route('admin.manage-photos.store')}}";
      url = $(this).attr('action');
      //console.log(url);
       $.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
   jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
   		  dataType: "json",
          success: function(data){
          	console.log(data);
          	 var names=['title','categorid','photo','description'];
          	 $.each(names,function (key, value) {

                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             
             if (data.success) {
             	 $('#product_add_modal').modal('hide');
             	   toastr.options.showDuration = '2000';
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
             	console.log(data.photos.title);

             }else{
             	//console.log(data.errors[0]);
             	
      	  var errors = data.errors;
      	  //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                	
                     $.each(errors,function (key, value) {
                     	console.log(value);
                     	$.each(names,function(j,val){
                     		 var name = '#' + val;
                            //console.log(key);
                     		if (value.toLowerCase().indexOf(val) >= 0) {
                     			//console.log(value);
                     			var ErrorID = '#' + val;
		                        $(ErrorID).removeClass("d-none");
		                        $(ErrorID).text(value);
                     		}
                     		
                     	});
                        
                        //console.log(ErrorID+' '+value);
                    })

                }
             }
              //var tt=$('#blah').attr('src');
              //console.log(tt);
            // $('#product_add_modal').modal('hide');
          },
          error: function (error) {
          	
          
          }
     });

 });
  $('#product_add_modal').on('hidden.bs.modal', function () {
  	removeImage();
  	removetxt();
    $('#createFormSubmit')[0].reset();
    });  
//Profile
function removeProfiletxt() {
var names=['title','image'];
 $.each(names,function (key, value) {
      var name = '#' + value;
      //console.log(key);
      $(name).addClass("d-none");
      $(name).text('');
      
  });
}
$('#pic_add_modal').on('hidden.bs.modal', function () {
    removeProfiletxt();
    $('#createPic')[0].reset();
    });
jQuery('#createPic').submit(function(e){
    e.preventDefault();
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(url);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
        dataType: "json",
          success: function(data){
            console.log(data);
             var names=['title','image'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             
             if (data.success) {
               $('#pic_add_modal').modal('hide');
              toastr.options.showDuration = '2000';
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
              console.log(data);

             }else{
              //console.log(data.errors[0]);
              
          var errors = data.errors;
          //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                  
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

  });
//update profile
jQuery('#updateProfile').submit(function(e){
    e.preventDefault();
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(photos);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
          dataType: "json",
          success: function(data){
            console.log(data);
             var names=['name','mobile','image','address'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             
             if (data.success) {
               $('#pic_add_modal').modal('hide');
              //toastr.options.positionClass = 'toast-top-center';
               toastr.options.showDuration = '2000';
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
             // location.reload();
              console.log(data);

             }else{
              //console.log(data.errors[0]);
              
          var errors = data.errors;
          //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                  
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

  });
//update profile(about me) 
jQuery('#aboutMself').submit(function(e){
    e.preventDefault();
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(photos);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
          dataType: "json",
          success: function(data){
            console.log(data);
             var names=['title','aboutme'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             
             if (data.success) {
               $('#pic_add_modal').modal('hide');
              //toastr.options.positionClass = 'toast-top-center';
               toastr.options.showDuration = '2000';
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
             // location.reload();
              console.log(data);

             }else{
              //console.log(data.errors[0]);
              
          var errors = data.errors;
          //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                  
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

  });
//update profile(change password) 
jQuery('#changePassword').submit(function(e){
    e.preventDefault();
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(photos);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
          dataType: "json",
          success: function(data){
            console.log(data);
             var names=['current','new','confirm','char'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             if (data.error) {toastr.error(data.error);}
             if (data.success) {
               $('#pic_add_modal').modal('hide');
              //toastr.options.positionClass = 'toast-top-center';
               toastr.options.showDuration = '2000';
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
             // location.reload();
              console.log(data);

             }else{
              //console.log(data.errors[0]);
              
          var errors = data.errors;
          //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                  
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

  });
//Pricing
function removePricetxt() {
var names=['category_id','day_price','hour_price'];
 $.each(names,function (key, value) {
      var name = '#' + value;
      //console.log(key);
      $(name).addClass("d-none");
      $(name).text('');
      
  });
}
$('#price_add_modal').on('hidden.bs.modal', function () {
    removePricetxt();
    $('#createPrice')[0].reset();
    });
jQuery('#createPrice').submit(function(e){
    e.preventDefault();
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(url);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
        dataType: "json",
          success: function(data){
           // console.log(data);
             var names=['categoryid','dayprice','hourprice'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             
             if (data.success) {
               $('#price_add_modal').modal('hide');
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
              //location.reload();
             // console.log(data);

             }else{
              //console.log(data.errors[0]);
              
          var errors = data.errors;
          //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                  
                     $.each(errors,function (key, value) {
                      if (value.indexOf("already ") !== -1) {
                          console.log('access');
                          $('#categoryid').removeClass("d-none");
                          $('#categoryid').text(value);
                         }else{console.log('not');}
                      $.each(names,function(j,val){
                         var name = '#' + val;

                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

  });
//District
function removeDistricttxt() {
var names=['name'];
 $.each(names,function (key, value) {
      var name = '#' + value;
      //console.log(key);
      $(name).addClass("d-none");
      $(name).text('');
      
  });
}
$('#district_add_modal').on('hidden.bs.modal', function () {
    removeDistricttxt();
    $('#createDistrict')[0].reset();
    });
jQuery('#createDistrict').submit(function(e){
    e.preventDefault();
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log(url);
       $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery.ajax({
          url: url ,
          method: 'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          cache: false,
        dataType: "json",
          success: function(data){
            console.log(data);
             var names=['name'];
             $.each(names,function (key, value) {
                            var name = '#' + value;
                            //console.log(key);
                            $(name).addClass("d-none");
                            $(name).text('');

                        });
             
             if (data.success) {
               $('#district_add_modal').modal('hide');
              toastr.success(data.success);
               setTimeout(function () { document.location.reload(true); }, 2000);
              //location.reload();
              console.log(data);

             }else{
              //console.log(data.errors[0]);
              
          var errors = data.errors;
          //console.log(errors);
                if($.isEmptyObject(errors) == false) {
                  
                     $.each(errors,function (key, value) {
                      console.log(value);
                      $.each(names,function(j,val){
                         var name = '#' + val;
                            //console.log(key);
                        if (value.toLowerCase().indexOf(val) >= 0) {
                          //console.log(value);
                          var ErrorID = '#' + val;
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        }
                        
                      });
                        
                    })

                }
             }
             
          },
          error: function (error) {
            
          }
     });

  });
});
