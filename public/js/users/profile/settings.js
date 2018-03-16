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