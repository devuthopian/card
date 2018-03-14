// Release Card
function approveUser(user_id){
	bootbox.confirm({
	    message: "Do you want to approve this user ?",
	    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn-success'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn-danger'
	        }
	    },
	    callback: function (result) {
	        if(result){
	        	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

	        	$.ajax({
				    url: base_url+'/admin/user/approve',
				    dataType: 'json',
				    type: 'post',
				    data: {'user_id':user_id},
				    success: function( data, textStatus, jQxhr ){
				    	if(data.code == 1){
				    		swal("Success", data.message, "success");
				    	}else{
				    		swal("Error", data.message, "error");
				    	}

				    	location.reload();
				    	
				    },
				    error: function( jqXhr, textStatus, errorThrown ){
				        console.log( errorThrown );
				    }
				});
	        }
	    }
	});
}