// Defining CSRF token | CSRF Protection
var _token = $('meta[name="csrf-token"]').attr('content');

// Edit User Data
function triggerEditCustomer(id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$.post(url,{id:id,token:_token},function(data){
  		if(data){
  			$('.alert').remove();
  				//customer terms select
  				$('select#terms option[value="'+data['terms']+'"]').attr('selected',true);
	  			//data assigning
	  			$('#library-action').val(data['id']);
	  			$('#last_name').val(data['last_name']);
	  			$('#first_name').val(data['first_name']);
	  			$('#MI').val(data['MI']);
	  			$('#address').val(data['address']);
	  			$('#phone').val(data['phone']);
	  			$('#email').val(data['email']);
	  			$('#contact_person').val(data['contact_person']);
	  			$('#TIN').val(data['TIN']);
	  			$('#isEdit').val(1);
	  			$('#id').val(data['id']);
	  			$('.deactivate').attr('href', '/deactivate-customer/'+id+'');
	  			$('#myModalLabel').text('Update Customer');
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
	  	$('#myModalLabel').text('New Customer');
	  	$('#library-action').val('');
		$('#last_name').val('');
		$('#first_name').val('');
		$('#MI').val('');
		$('#address').val('');
		$('#phone').val('');
		$('#email').val('');
		$('#contact_person').val('');
		$('#TIN').val('');
	});
});