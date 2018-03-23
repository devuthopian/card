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
	    	$('#inviteUrl').val(base_url+'/share/'+data.data.invitation_hash);
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

	    	enableEnableFieldFlags(data);


	    	$('#create_card_header').html('Edit Card');
	    	$('#card_name').val(data.card_name);
	    	$('#card_image_preview').attr('src', base_url+'/uploads/card/'+data.image);
	    	$('textarea#card_description').val(data.description);
	    	$('#bonus').val(data.bonus);
	    	$('#card_number').val(data.card_number);
	    	$('#type_name_id').val(data.type_name_id);
	    	$('#tier_name_id').val(data.tier_name_id);
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
	    	$('#type_name_label').html(data.type_name.name);
	    	$('#tier_label').html(data.tier_name.name);
			
	    	/** card description **/
			if(data.description.length>100){
				$('#description_label').html(data.description.substring(0, 100));
			}else{
				$('#description_label').html(data.description);
			}

			/** card rewards **/
			if(data.rewards.length>100){
				$('#rewards_label').html(data.rewards.substring(0, 100));
			}else{
				$('#rewards_label').html(data.rewards);
			}
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}


// Enable Disable field by flags when open edit and duplicate card.
function enableEnableFieldFlags(data){
	// is card name
	if(data.is_card_name == 1){
		$('#is_card_name').prop('checked', true);
	}else{
		$('#is_card_name').prop('checked', false);
	}
	$("#is_card_name").trigger('change');


	// is card name
	if(data.is_bonus == 1){
		$('#is_bonus').prop('checked', true);
	}else{
		$('#is_bonus').prop('checked', false);
	}
	$("#is_bonus").trigger('change');


	//is card number
	if(data.is_card_number == 1){
		$('#is_card_number').prop('checked', true);
	}else{
		$('#is_card_number').prop('checked', false);
	}
	$("#is_card_number").trigger('change');

	//is type name
	if(data.is_type_name == 1){
		$('#is_type_name').prop('checked', true);
	}else{
		$('#is_type_name').prop('checked', false);
	}
	$("#is_type_name").trigger('change');


	//is rewards
	if(data.is_rewards == 1){
		$('#is_rewards').prop('checked', true);
	}else{
		$('#is_rewards').prop('checked', false);
	}
	$("#is_rewards").trigger('change');

	//is rewards
	if(data.is_description == 1){
		$('#is_description').prop('checked', true);
	}else{
		$('#is_description').prop('checked', false);
	}
	$("#is_description").trigger('change');


	//is tier name
	if(data.is_tier_name == 1){
		$('#is_tier_name').prop('checked', true);
	}else{
		$('#is_tier_name').prop('checked', false);
	}
	$("#is_tier_name").trigger('change');
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

	    	enableEnableFieldFlags(data);

	    	$('#create_card_header').html('Create Duplicate Card');
	    	$('#card_name').val(data.card_name);
	    	$('#card_image_preview').attr('src', base_url+'/uploads/card/'+data.image);
	    	$('textarea#card_description').val(data.description);


	    	$('#bonus').val(data.bonus);
	    	$('#card_number').val(data.card_number);
	    	$('#type_name_id').val(data.type_name_id);
	    	$('#tier_name_id').val(data.tier_name_id);
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
	    	$('#type_name_label').html(data.type_name.name);
	    	$('#tier_label').html(data.tier_name.name);
			
	    	/** card description **/
			if(data.description.length>100){
				$('#description_label').html(data.description.substring(0, 100));
			}else{
				$('#description_label').html(data.description);
			}

			/** card rewards **/
			if(data.rewards.length>100){
				$('#rewards_label').html(data.rewards.substring(0, 100));
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

	//is card name
	$('#is_bonus').prop('checked', true);
	$("#is_bonus").trigger('change');
	$("#bonus").trigger('change');

	//is card name
	$('#is_card_name').prop('checked', true);
	$("#is_card_name").trigger('change');
	$("#card_name").trigger('change');

	//is card number
	$('#is_card_number').prop('checked', true);
	$("#is_card_number").trigger('change');

	//is type name
	$('#is_type_name').prop('checked', true);
	$("#is_type_name").trigger('change');
	$("#type_name_id").trigger('change');


	//is rewards
	$('#is_rewards').prop('checked', true);
	$("#is_rewards").trigger('change');
	$("#rewards").trigger('change');

	//is rewards
	$('#is_description').prop('checked', true);
	$("#is_description").trigger('change');
	$("#card_description").trigger('change');

	//is tier name
	$('#is_tier_name').prop('checked', true);
	$("#is_tier_name").trigger('change');


	
	$('#create_card_header').html('New Card');
	$('#card_name').val('');

	$('#type_name_id').val('');
	$('#tier_name_id').val('');
	
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


// Card Automatic changes
function cardAutomation(){
	// card name
	$("#card_name").on('change keyup paste', function() {
		if($(this).val()==''){
			$('#card_name_label').addClass('hide');
		}else{
			$('#card_name_label').removeClass('hide');
		}
	    $('#card_name_label').html($(this).val());
	});

	// card bonus
	$("#bonus").on('change keyup paste', function() {
		if($(this).val()==''){
			$('#bonus_block').addClass('hide');
		}else{
			$('#bonus_block').removeClass('hide');
		}
	    $('#bonus_label').html($(this).val());
	});

	// card number
	$("#card_number").on('change keyup paste', function() {
	    $('#card_number_label').html($(this).val());
	});

	// card number
	$("#card_background").on('change keyup paste', function() {
		var card_background = $("#card_background").val();
	    $('#card_container').css('background-color', card_background);
	});

	// type_name
	$("#type_name_id").on('change keyup paste', function() {
		if($("#type_name_id").val()!=''){	
			$('#type_name_label').removeClass('hide');	
		    $('#type_name_label').html($("#type_name_id option:selected").text());
		}else{
			$('#type_name_label').addClass('hide');	
			$('#type_name_label').html('');
		}
	});

	//tier
	$("#tier_name_id").on('change keyup paste', function() {
		if($("#tier_name_id").val()!=''){
	    	$('#tier_label').html($("#tier_name_id option:selected").text());
	    }
	});

	//rewards
	$("#card_description").on('change keyup paste', function() {
		var card_description = $(this).val();
		if(card_description==''){
	    	$('#description_label').addClass('hide');
	    }else{
	    	$('#description_label').removeClass('hide');
	    }
		if(card_description.length>100){
			$('#description_label').html(card_description.substring(0, 100));
		}else{
			$('#description_label').html(card_description);
		}
	});

	//rewards
	$("#rewards").on('change keyup paste', function() {
	    var card_rewards = $(this).val();
	    if(card_rewards==''){
	    	$('#rewards_block').addClass('hide');
	    }else{
	    	$('#rewards_block').removeClass('hide');
	    }
	    
		if(card_rewards.length>100){
			$('#rewards_label').html(card_rewards.substring(0, 100));
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

	// card image button
	$('#card_background_button').click(function(){
	    $('#card_background').click();
	});


	//hide / show flag
	//is card name
	$("#is_card_name").on('change', function() {
		if($("#is_card_name").is(':checked')) {
	    	$('#card_name_label').removeClass('hide');
	    }else{
	    	$('#card_name_label').addClass('hide');
	    }
	});

	//is card number
	$("#is_card_number").on('change', function() {
		if($("#is_card_number").is(':checked')) {
	    	$('#card_number_label').removeClass('hide');
	    }else{
	    	$('#card_number_label').addClass('hide');
	    }
	});

	//is type name
	$("#is_type_name").on('change', function() {
		if($("#is_type_name").is(':checked')) {
	    	$('#type_name_label').removeClass('hide');
	    }else{
	    	$('#type_name_label').addClass('hide');
	    }
	});


	//is rewards
	$("#is_rewards").on('change', function() {
		if($("#is_rewards").is(':checked')) {
	    	$('#rewards_block').removeClass('hide');
	    }else{
	    	$('#rewards_block').addClass('hide');
	    }
	});

	//is rewards
	$("#is_description").on('change', function() {
		if($("#is_description").is(':checked')) {
	    	$('#description_label').removeClass('hide');
	    }else{
	    	$('#description_label').addClass('hide');
	    }
	});

	//is tier name
	$("#is_tier_name").on('change', function() {
		if($("#is_tier_name").is(':checked')) {
	    	$('#tier_label').removeClass('hide');
	    }else{
	    	$('#tier_label').addClass('hide');
	    }
	});

	//is bonus
	$("#is_bonus").on('change', function() {
		if($("#is_bonus").is(':checked')) {
	    	$('#bonus_block').removeClass('hide');
	    }else{
	    	$('#bonus_block').addClass('hide');
	    }
	});
}


// Read image url to preview
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


/** Tier names **/
function addNewTierRow(){
	var tiers_count = (parseInt($('#tiers_count').val())+1);
	var tier_new_row = "<div id='tier"+tiers_count+"_block' class='tier_div'><span><input type='text' placeholder='Tier Name' name='tier["+tiers_count+"]' id='tier"+tiers_count+"' /></span></div>";
	$('.tiers_block').append(tier_new_row);
	$('#tiers_count').val(tiers_count);
}

// remove Tier row
function removeTierRow(){
	var tier_div_length = $('.tier_div').length;
	if(tier_div_length>1){
		$('.tier_div').last().remove();
		var tiers_count = (parseInt($('#tiers_count').val())-1);
		$('#tiers_count').val(tiers_count);
	}else{
		bootbox.alert('At least one tier is required.');
	}
}

// save Tiers
function saveTiers(){
	var user_profile_id = $('#user_profile_id').val();
	$.ajax({
	    url: base_url+'/user/tierNames/save',
	    dataType: 'json',
	    data: $('#saveTierNames').serialize()+'&profile_id='+user_profile_id,
	    type: 'post',
	    success: function( data, textStatus, jQxhr ){
	    	if(data.code == 1){
	    		var tierNamesArr = data.dataArr;
	    		var tierNames = '<option value="">--Select Tier--</option>';

	    		var tier_name_id = $('#tier_name_id').val();
	    		var selected_tier_name = '';
	    		$.each(tierNamesArr, function( index, value ) {
	    			if(tier_name_id == index){
	    				selected_tier_name = index;
	    			}
				  tierNames+='<option value='+index+'>'+value+'</option>';
				});
	    		
	    		$('#tier_name_id').html(tierNames);
	    		if(selected_tier_name!=''){
		    		$('#tier_name_id').val(selected_tier_name);
		    	}
		    	$('#tier_name_id').trigger('change');

	    		swal({
		            title: "Success",
		            text: data.message,
		            type: "success"
		        });
	    	}else{
	    		swal("Error", data.message, "error");
	    	}
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}
/** Tier names **/



/** Type names **/
function addNewRow(){
	var types_count = (parseInt($('#types_count').val())+1);
	var type_new_row = "<div id='type"+types_count+"_block' class='type_div'><span><input type='text' placeholder='Type Name' name='type["+types_count+"]' id='type"+types_count+"' /></span></div>";
	$('.types_block').append(type_new_row);
	$('#types_count').val(types_count);
}

// remove type row
function removeRow(){
	var type_div_length = $('.type_div').length;
	if(type_div_length>1){
		$('.type_div').last().remove();
		var types_count = (parseInt($('#types_count').val())-1);
		$('#types_count').val(types_count);
	}else{
		bootbox.alert('At least one type is required.');
	}
}

// Save TypeNames
function saveTypes(){
	var user_profile_id = $('#user_profile_id').val();
	$.ajax({
	    url: base_url+'/user/typeNames/save',
	    dataType: 'json',
	    data: $('#saveTypeNames').serialize()+'&profile_id='+user_profile_id,
	    type: 'post',
	    success: function( data, textStatus, jQxhr ){			
	    	if(data.code == 1){
	    		var typeNamesArr = data.dataArr;
	    		var typeNames = '<option value="">--Select Type--</option>';

	    		var type_name_id = $('#type_name_id').val();
	    		var selected_type_name = '';
	    		$.each(typeNamesArr, function( index, value ) {
	    			if(type_name_id == index){
	    				selected_type_name = index;
	    			}
				  typeNames+='<option value='+index+'>'+value+'</option>';
				});

	    		$('#type_name_id').html(typeNames);
	    		if(selected_type_name!=''){
		    		$('#type_name_id').val(selected_type_name);
		    	}
		    	$('#type_name_id').trigger('change');

	    		swal({
		            title: "Success",
		            text: data.message,
		            type: "success"
		        });
	    	}else{
	    		swal("Error", data.message, "error");
	    	}
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}
/** Type names **/


/* Crop functionality */
function openImageCropPopup(){
	var card_image_preview_src = $('#card_image_preview').attr('src');
	$('#imageForCrop').attr('src', card_image_preview_src);
	$('#imageForCrop').Jcrop({
      aspectRatio: 12/16,
      onSelect: updateCoords,
    });
	$('#cropImageModal').modal('toggle');
}

// close crop modal
function closeCropModal(){
	$('#cropImageModal').modal('toggle');
}

// update coordinates for crop
function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);

/*
    var rx = 100 / coords.w;
	var ry = 100 / coords.h;

	$('#preview').css({
		width: Math.round(rx * 500) + 'px',
		height: Math.round(ry * 370) + 'px',
		marginLeft: '-' + Math.round(rx * coords.x) + 'px',
		marginTop: '-' + Math.round(ry * coords.y) + 'px'
	});
*/
  };

// Check Coordinates
function checkCoords()
{
	if (parseInt($('#w').val())) return true;
	bootbox.alert('Please select a crop region then press submit.');
	return false;
};


// Document Ready
$( document ).ready(function() {
	setNeverExpire();
	cardAutomation();
	$('#card_background').colorpicker();
});