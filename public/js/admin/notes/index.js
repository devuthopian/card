function openCreateNotePopup(){
	CKEDITOR.instances['description'].setData('');
	$('#note_title').html('Add Note');
	$('#createNoteModal').modal('toggle');
}

function editNote(note_id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
	    url: base_url+'/admin/note/'+note_id,
	    dataType: 'json',
	    type: 'get',
	    data: {},
	    success: function( data, textStatus, jQxhr ){
	    	CKEDITOR.instances['description'].setData(data.description);
	    	$('#note_title').html('Edit Note');
	    	$('#id').val(data.id);
	    	$('#createNoteModal').modal('toggle');
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}

function validateNote(){
	var description = CKEDITOR.instances['description'].getData();
	if(description==''){
		bootbox.alert('Please enter description.');
		return false;
	}
}

$( document ).ready(function() {
    CKEDITOR.replace( 'description' );
});