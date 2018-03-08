// create Profile Popup
function openCreateProfilePopup(){
	$('#createProfileModal').modal('toggle');
}

function removeProfile(profile_id){
	bootbox.confirm({
	    message: "Do you want to remove this profile ?",
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
				    url: base_url+'/user/profile/remove',
				    dataType: 'json',
				    type: 'post',
				    data: {'profile_id':profile_id},
				    success: function( data, textStatus, jQxhr ){
				    	if(data.code == 1){
				    		$('#profile_'+profile_id).remove();
				    		swal("Success", data.message, "success");
				    	}else{
				    		swal("Error", data.message, "error");
				    	}
				    	
				    },
				    error: function( jqXhr, textStatus, errorThrown ){
				        console.log( errorThrown );
				    }
				});
	        }
	    }
	});
}



function setDefaultProfile(profile_id){
	bootbox.confirm({
	    message: "Do you want to set this profile as default ?",
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
				    url: base_url+'/user/profile/setDefault',
				    dataType: 'json',
				    type: 'post',
				    data: {'profile_id':profile_id},
				    success: function( data, textStatus, jQxhr ){
				    	if(data.code == 1){
				    		$('.setDefaultButtons').removeClass('hide');
				    		$('.removeProfileButtons').removeClass('hide');
				    		$('#defaultProfileButton'+profile_id).addClass('hide');
				    		$('#removeProfileButton'+profile_id).addClass('hide');
				    		
				    		swal("Success", data.message, "success");
				    	}else{
				    		swal("Error", data.message, "error");
				    	}
				    	
				    },
				    error: function( jqXhr, textStatus, errorThrown ){
				        console.log( errorThrown );
				    }
				});
	        }
	    }
	});
}