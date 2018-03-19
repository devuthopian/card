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
	    	$('#card_image_preview').attr('src', base_url+'/uploads/card/'+data.image);
	    	$('textarea#card_description').val(data.description);
	    
	    	$('#bonus').val(data.bonus);
	    	$('#card_number').val(data.card_number);
	    	$('#gender').val(data.gender);
	    	$('#tier').val(data.card_tier);
	    	$('#rewards').val(data.rewards);
	    	$('#mask_image_preview').attr('src', base_url+'/uploads/card/'+data.mask_image);

	    	$('#card_id').val(data.id);
	    	$('#copy_card_id').val('');
	    	$('#cardImageBlock').removeClass('hide');
	    	$('#cardFileUploadBlock').addClass('hide');
	    	$('#createCardModal').modal('toggle');

	    	/** Preview Card **/

		    	$('#card_name_label').html(data.card_name);
		    	$('#bonus_label').html(data.bonus);
		    	$('#card_number_label').html(data.card_number);
		    	$('#gender_label').html(data.gender);
		    	$('#tier_label').html(data.card_tier);
				
		    	/** card description **/
				if(data.description.length>100){
					$('#description_label').html(data.description.substring(0, 100)+' ...');
				}else{
					$('#description_label').html(data.description);
				}

				/** card rewards **/
				if(data.rewards.length>100){
					$('#rewards_label').html(data.rewards.substring(0, 100)+' ...');
				}else{
					$('#rewards_label').html(data.rewards);
				}
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
	    	$('#card_image_preview').attr('src', base_url+'/uploads/card/'+data.image);
	    	$('textarea#card_description').val(data.description);


	    	$('#bonus').val(data.bonus);
	    	$('#card_number').val(data.card_number);
	    	$('#gender').val(data.gender);
	    	$('#tier').val(data.card_tier);
	    	$('#rewards').val(data.rewards);
	    	$('#mask_image_preview').attr('src', base_url+'/uploads/card/'+data.mask_image);


	    	$('#card_id').val('');
	    	$('#copy_card_id').val(data.id);
	    	$('#cardImageBlock').removeClass('hide');
	    	$('#cardFileUploadBlock').addClass('hide');
	    	$('#createCardModal').modal('toggle');

	    	/** Preview Card **/

	    	$('#card_name_label').html(data.card_name);
	    	$('#bonus_label').html(data.bonus);
	    	$('#card_number_label').html(data.card_number);
	    	$('#gender_label').html(data.gender);
	    	$('#tier_label').html(data.card_tier);
			
	    	/** card description **/
			if(data.description.length>100){
				$('#description_label').html(data.description.substring(0, 100)+' ...');
			}else{
				$('#description_label').html(data.description);
			}

			/** card rewards **/
			if(data.rewards.length>100){
				$('#rewards_label').html(data.rewards.substring(0, 100)+' ...');
			}else{
				$('#rewards_label').html(data.rewards);
			}
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

function cardAutomation(){
	// card name
	$("#card_name").on('change keyup paste', function() {
	    $('#card_name_label').html($(this).val());
	});

	// card bonus
	$("#bonus").on('change keyup paste', function() {
	    $('#bonus_label').html($(this).val());
	});

	// card number
	$("#card_number").on('change keyup paste', function() {
	    $('#card_number_label').html($(this).val());
	});

	// gender
	$("#gender").on('change keyup paste', function() {
	    $('#gender_label').html($(this).val());
	});

	// tier
	$("#gender").on('change keyup paste', function() {
	    $('#gender_label').html($(this).val());
	});


	//tier
	$("#tier").on('change keyup paste', function() {
	    $('#tier_label').html($(this).val());
	});

	//rewards
	$("#card_description").on('change keyup paste', function() {
		var card_description = $(this).val();
		if(card_description.length>100){
			$('#description_label').html(card_description.substring(0, 100)+' ...');
		}else{
			$('#description_label').html(card_description);
		}
	});

	//rewards
	$("#rewards").on('change keyup paste', function() {
	   /* $('#rewards_label').html($(this).val());*/
	    var card_rewards = $(this).val();
		if(card_rewards.length>100){
			$('#rewards_label').html(card_rewards.substring(0, 100)+' ...');
		}else{
			$('#rewards_label').html(card_rewards);
		}
	});

	$("#card_image").change(function() {
	  readURL(this);
	});

	// card image button
	$('#card_image_button').click(function(){
	    $('#card_image').click();
	});

	$("#mask_image").change(function() {
	  readURL(this);
	});
	
	// card image button
	$('#mask_image_button').click(function(){
	    $('#mask_image').click();
	});
	
}


function readURL(input) {
	preview_image = input.id;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#'+preview_image+'_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}




// Document Ready
$( document ).ready(function() {
	setNeverExpire();
	cardAutomation();
});