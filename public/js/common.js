function sendInvitation(){
	var email = $('#email').val();

	if(email!=''){
		$.ajax({
	        url: 'sendInvitation',
	        dataType: 'json',
	        type: 'post',
	        data: {'email':email},
	        success: function( data, textStatus, jQxhr ){
	        	$('#inviteModal').modal('toggle');
	        },
	        error: function( jqXhr, textStatus, errorThrown ){
	            console.log( errorThrown );
	        }
	    });
	}
}

function logoutConfirm(){
	bootbox.confirm({
	    message: "Are you sure ?",
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
	        	$('#logout-form').submit();
	        }
	    }
	});
}