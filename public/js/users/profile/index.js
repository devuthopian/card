// Edit Profile Image
function editProfileImage(){
	$('#fileUploadBlock').removeClass('hide');
	$('#imageBlock').addClass('hide');
}

// Generate Invite Link
function generateInviteLink(){
	var profile_id = $('#profile_id').val();

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
	    url: base_url+'/user/profile/generateInviteUrl',
	    dataType: 'json',
	    type: 'post',
	    data: {'profile_id':profile_id},
	    success: function( data, textStatus, jQxhr ){
	    	$('#inviteUrl').val(base_url+'/share?id='+profile_id+'_'+data.data.unique_id);
	    	$('#invitation_id').val(data.data.id);
	    	$('#neverExpire').prop('checked', true);
	    	$('#invitePeopleModal').modal('toggle');
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}

// Copy Invite Link
function copyInviteLink(){
	var copyText = document.getElementById("inviteUrl");
  	copyText.select();
  	document.execCommand("Copy");
}

// Set Never Expire For Invite Link
function setNeverExpire(){
	$('#neverExpire').change(function () {

		var invitation_id = $('#invitation_id').val();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

    	$.ajax({
		    url: base_url+'/user/profile/updateNeverExpireInviteUrl',
		    dataType: 'json',
		    type: 'post',
		    data: {'invitation_id':invitation_id},
		    success: function( data, textStatus, jQxhr ){
		    	//alert(data.message);
		    	swal(data.message);
		    },
		    error: function( jqXhr, textStatus, errorThrown ){
		        console.log( errorThrown );
		    }
		});
 	});
}

// Zoom Card
function zoomImage(image_name){
	$('#cardImageZoom').attr('src', base_url+'/uploads/card/'+image_name);
	$('#zoomImageModal').modal('toggle');
}

// Release Card
function releaseCard(card_id){
	bootbox.confirm({
	    message: "Do you want to release this card ?",
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
				    url: base_url+'/user/card/release',
				    dataType: 'json',
				    type: 'post',
				    data: {'card_id':card_id},
				    success: function( data, textStatus, jQxhr ){
				    	if(data.code == 1){
				    		$('#released_option_'+card_id).addClass('hide');
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

// Remove Card
function removeCard(card_id){
	bootbox.confirm({
	    message: "Do you want to remove this card ?",
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
				    url: base_url+'/user/card/remove',
				    dataType: 'json',
				    type: 'post',
				    data: {'card_id':card_id},
				    success: function( data, textStatus, jQxhr ){
				    	if(data.code == 1){
				    		swal({
					            title: "Success",
					            text: data.message,
					            type: "success"
					        });

					        location.reload();

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

// Edit Card
function editCard(card_id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
	    url: base_url+'/user/card/'+card_id,
	    dataType: 'json',
	    type: 'get',
	    success: function( data, textStatus, jQxhr ){
	    	$('#create_card_header').html('Edit Card');
	    	$('#card_name').val(data.card_name);
	    	$('#card_image').attr('src', base_url+'/uploads/card/'+data.image);
	    	$('textarea#description').val(data.description);
	    	$('#card_id').val(data.id);
	    	$('#copy_card_id').val('');
	    	$('#cardImageBlock').removeClass('hide');
	    	$('#cardFileUploadBlock').addClass('hide');
	    	$('#createCardModal').modal('toggle');
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}


// Duplicate Card
function duplicateCard(card_id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
	    url: base_url+'/user/card/'+card_id,
	    dataType: 'json',
	    type: 'get',
	    success: function( data, textStatus, jQxhr ){
	    	$('#create_card_header').html('Create Duplicate Card');
	    	$('#card_name').val(data.card_name);
	    	$('#card_image').attr('src', base_url+'/uploads/card/'+data.image);
	    	$('textarea#description').val(data.description);
	    	$('#card_id').val('');
	    	$('#copy_card_id').val(data.id);
	    	$('#cardImageBlock').removeClass('hide');
	    	$('#cardFileUploadBlock').addClass('hide');
	    	$('#createCardModal').modal('toggle');
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}


// Open Create Card Popup
function openCreateCardPopup(){
	$('#create_card_header').html('New Card');
	$('#card_name').val('');
	$('#cardImageBlock').addClass('hide');
	$('#cardFileUploadBlock').removeClass('hide');
	$('textarea#description').val('');
	$('#card_id').val('');
	$('#copy_card_id').val('');

	$('#createCardModal').modal('toggle');
}

// Edit Card Image
function editCardImage(){
	$('#cardImageBlock').addClass('hide');
	$('#cardFileUploadBlock').removeClass('hide');
}


// Document Ready
$( document ).ready(function() {
	setNeverExpire();
});