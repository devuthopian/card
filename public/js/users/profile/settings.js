function activeTab(tab_id){
	$('.tabs').addClass('hide');
	$('#'+tab_id).removeClass('hide');
}

$(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
     });
 });
