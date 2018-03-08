function registerName(){
	var name = $('#name').val();
	if(name == ''){
		$('#name').focus();
	}else{
		$('#registerName').submit();
	}
}