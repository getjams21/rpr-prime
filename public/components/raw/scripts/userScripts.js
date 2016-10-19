// Defining CSRF token | CSRF Protection
var _token = $('meta[name="csrf-token"]').attr('content');

// Edit User Data
function triggerEditUser(id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$.post(url,{id:id,token:_token},function(data){
  		if(data){
  			$('.alert').remove();
  				//user type select
  				$('select#position option[value="'+data['position']+'"]').attr('selected',true);
  				//branch select
  				$('select#branches option[value="'+data['branchID']+'"]').attr('selected',true);
	  			$('#library-action').val(data['id']);
	  			$('#username').val(data['username']);
	  			$('#last_name').val(data['last_name']);
	  			$('#first_name').val(data['first_name']);
	  			$('#mi').val(data['MI']);
	  			$('#email').val(data['email']);
	  			$('#position').val(data['position']);
	  			$('#isEdit').val(1);
	  			$('#id').val(data['id']);
	  			$('.deactivate').attr('href', '/deactivate-user/'+id+'');
	  			$('#myModalLabel').text('Update User');
	  			$('.delete').show();
  		}
  	});
	$('.user-pwd').hide();
	$('.password,.retype-password').removeAttr('required');
	$('#user-library').modal('show');
}

// Document Ready function
jQuery(document).ready(function($) {
	$('.close-modal').click(function(event) {
		$('#isEdit').val('');
	  	$('#id').val('');
	  	$('#myModalLabel').text('New User');
	  	$('#library-action').val('');
		$('#username').val('');
		$('#last_name').val('');
		$('#first_name').val('');
		$('#mi').val('');
		$('#email').val('');
		$('.user-pwd').show();
		$('.password,.retype-password').attr('required');
	});
});