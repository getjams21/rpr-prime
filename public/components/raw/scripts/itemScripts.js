// Defining CSRF token | CSRF Protection
var _token = $('meta[name="csrf-token"]').attr('content');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Item Image Preview
function previewItemImage(id){
	// alert(APP_URL);
	// return false;
	$.post(imagePreviewURL,{id:id,token:_token},function(data){
  		if(data){
  			$.each($(data), function(key, value) {
  				if(value != ''){
  					var temp = value.toString().substr(value.indexOf('/')+40);
  					var filename = temp.substr(temp.indexOf('/')+1);
  					// alert(filename);
  					// return false;
  					$("#links").append('
				      	<a href="'+APP_URL+value+'" title="'+filename+'" data-gallery>
	                      <img src="'+APP_URL+value+'" alt="'+APP_URL+value+'" style="width:120px;height:120px;"
						  class="img img-reponsive">
	                  	</a>
	                  	<button class="btn btn-danger btn-sm" style="padding:0px 5px;margin-right:10px;">remove</button>
			      ');
  				}    
			});
			// return false;
	  		// $('#library-action').val(data['id']);
  		}
  	});
	$('#preview-images').modal('show');
}

//Edit Item Data
function triggerEditItem(id){
	$.post(url,{id:id,token:_token},function(data){
  		if(data){
  			$('.alert').remove();
	  			$('#name').val(data['name']);
	  			$('#description').val(data['description']);
	  			$('#model').val(data['model']);
	  			$('#price').val(data['price']);
	  			$('#unit').val(data['unit']);
	  			$('#type').val(data['type']);
	  			$('#isEdit').val(1);
	  			$('#id').val(data['id']);
	  			$('.deactivate').attr('href', '/deactivate-item/'+id+'');
	  			$('#myModalLabel').text('Update Item');
	  			$('.delete').show();
	  			$('#upload-img').hide();
  		}
  	});
	$('#item-library').modal('show');
}

// Document Ready
jQuery(document).ready(function($) {
	//Set Tables to DataTable Style
	$('.items').dataTable();
	//close image preview modal
	$('.close-image-modal').click(function(event) {
		$('#links').empty();
	});

	//close item modal
	$('.close-modal').click(function(event) {
		$('#isEdit').val('');
	  	$('#id').val('');
	  	$('#myModalLabel').text('New Item');
	  	$('#library-action').val('');
		$('#name').val('');
		$('#description').val('');
		$('#model').val('');
		$('#price').val('');
		$('#unit').val('');
		$('#upload-img').show();
	});
});