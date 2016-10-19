// Defining CSRF token | CSRF Protection
var _token = $('meta[name="csrf-token"]').attr('content');

// Edit User Data
function triggerEditBranch(id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$.post(url,{id:id,token:_token},function(data){
  		if(data){
  			$('.alert').remove();
  			$('#library-action').val(data['id']);
  			$('#name').val(data['name']);
  			$('#address').val(data['address']);
  			$('#phone').val(data['phone']);
  			$('#isEdit').val(1);
  			$('#id').val(data['id']);
  			$('.deactivate').attr('href', '/deactivate-branch/'+id+'');
  			$('#myModalLabel').text('Update Branch');
  			$('.delete').show();
  		}
  	});
	$('#user-library').modal('show');
}

// Document Ready function
jQuery(document).ready(function($) {
	$('.close-modal').click(function(event) {
		$('#isEdit').val('');
	  	$('#id').val('');
	  	$('#myModalLabel').text('New Branch');
	  	$('#library-action').val('');
		$('#name').val('');
		$('#address').val('');
		$('#phone').val('');
	});
});