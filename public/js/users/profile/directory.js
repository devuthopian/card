// Zoom Card
function zoomImage(image_name){
	$('#cardImageZoom').attr('src', base_url+'/uploads/card/'+image_name);
	$('#zoomImageModal').modal('toggle');
}