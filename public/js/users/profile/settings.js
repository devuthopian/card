function activeTab(tab_id){
	$('.tabs').addClass('hide');
	$('#'+tab_id).removeClass('hide');
}

function openAuthenticationPopup(social_provider){
	//window.open(base_url+"/auth/"+social_provider);

	var childWindow = window.open(base_url+"/user/social_accounts/"+social_provider,'newwindow',
     	config='height=600,width=1000,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no'
 	);


	var timer = setInterval(function () {
        if (childWindow.closed) {
            clearInterval(timer);
            window.location.reload(); // Refresh the parent page
            window.location = base_url+'/user/profile/settings?tab=connections';
        }
    }, 1000);

}

function sendOTP(){

    var mobile_number = $('#mobile_number').val();

    if(mobile_number!=''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url+'/user/mobile_verification/sendOTP',
            dataType: 'json',
            type: 'post',
            data: {'mobile_number':mobile_number},
            success: function( data, textStatus, jQxhr ){
                if(data.code == 1){
                    swal({
                        title: "Success",
                        text: data.message,
                        type: "success"
                    });
                    $('#sendOTPBlock').addClass('hide');
                    $('#verifyOTPBlock').removeClass('hide');
                }else{
                    swal("Error", data.message, "error");
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    }else{
        bootbox.alert('Please enter mobile number.');
    }
}

function verifyOTP(){
    var verification_code = $('#verification_code').val();
    var mobile_number = $('#mobile_number').val();

    if(verification_code!=''){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url+'/user/mobile_verification/verifyOTP',
            dataType: 'json',
            type: 'post',
            data: {'verification_code':verification_code, 'mobile_number':mobile_number},
            success: function( data, textStatus, jQxhr ){
                if(data.code == 1){
                    swal({
                        title: "Success",
                        text: data.message,
                        type: "success"
                    });

                    window.location = base_url+'/user/profile/settings?tab=connections';

                }else{
                    swal("Error", data.message, "error");
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    }else{
        bootbox.alert('Please enter verification code.');
    }
}

function closeSmsVerificationPopup(){
    $('#otpVerificationModal').on('hidden.bs.modal', function () {
        $('#mobile_number').val('');
        $('#verification_code').val('');
        $('#sendOTPBlock').removeClass('hide');
        $('#verifyOTPBlock').addClass('hide');
    })
}


// Document Ready
$( document ).ready(function() {
    closeSmsVerificationPopup();
});