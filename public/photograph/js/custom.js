$( document ).ready(function() {

/*  $("#nday").bind("keyup change",function(e){
  	var cat=$("#category_id").val();
  	var status = $(this).val();
  	console.log(cat);
  	console.log(status);
  	 var status = $(this).val();
  	if (status=='day') {
  		$("#times").hide();
  		$("#datetimepicker1").show();
  		//$("datetimepicker1").prop('required',true);
  		//$('#datetimepicker1').prop('name', 'Date');

  	}else{
  		$('#dates').removeAttr('name');
  		$("#datetimepicker1").hide();
  		$("#times").show();
  	}
  	
  });*/
 //hire photographer
jQuery('#hirePhotographer').submit(function(e){
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
 //Rating photographer
/*jQuery('#rating-user').submit(function(e){
    e.preventDefault();
     //var AuthUser = {!! json_encode(Auth::check()) !!};
       var photos =$(this).serializeArray();
      url = $(this).attr('action');
      console.log();
      exit();
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

  });*/
});