// Defining CSRF token | CSRF Protection
var _token = $('meta[name="csrf-token"]').attr('content');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Add Item
var num=1;
var runningPrice=0;
var prevPrice = 0;
var origPrice = [];
var origSubtotal;
function triggerAddItem(id){
	$('tr#rowID'+id).hide();
	$.post(getItem,{id:id,token:_token},function(data){
		if(data){
			// alert(data['name']);
			// return false;
			var price = data['price'];
			$('table#quoteTable').find('tbody#quoteBody').append('
				<tr id="trow'+num+'">
					<td>'+data['name']+'</td>
					<td>'+data['description']+'</td>
					<td>'+data['model']+'</td>
					<td>'+data['unit']+'</td>
					<td id="qty'+num+'" class="qty" contenteditable>1</td>
					<td class="price" id="price'+num+'" contenteditable>'+numeral(price).format('0,0.00')+'</td>
					<td> <button class="btn btn-danger btn-sm remove" id="'+num+'" type="button">Remove</button></td>
					<input type="hidden" id="itemID'+num+'" name="id['+num+']" value="'+data['id']+'">
					<input type="hidden" id="quantity'+num+'" name="quantity['+num+']" value="'+data['quantity']+'">
					<input type="hidden" id="origPrice'+num+'" value="'+price+'">
					<input type="hidden" id="itemPrice'+num+'" name="price['+num+']" value="'+numeral(price).format('0.00')+'">
				</tr>
			');
		}
		// $('#price'+num+'').autoNumeric();
		num++;
		runningPrice = (parseFloat(runningPrice)+parseFloat(price));
		$('td#runningPrice').html(numeral(runningPrice).format('0,0.00').bold());
		// $('td#runningPrice').autoNumeric();

	});
}

//View Items
function triggerViewItems(id,cName,pName,cID,uID,status,discount,cAddress,cContact,cPhone,cEmail){
	if (status == 1) {
		$('.btn-edit-quotation').remove();
		$('#btns').prepend('
			<button type="button" class="btn btn-primary btn-print-quotation" style="min-width:100px;">Print</button>
		');
	}else{
		$('.btn-save-quotation').remove();
	}
	$('#projectName').val(pName);
	$('#quotation_id').val(id);
	$('#user_id').val(uID);
	$('#customer_id').append('
		<option value="'+cID+'">'+cName+'</option');
	$.post(itemViewURL,{id:id,token:_token},function(data){
		// alert(data);
		var customID;
		var total=0;
		if(data){
			var ctr=1;
			$.each($(data), function(key, value) {
				var price = value['adjusted_price'];
				var qty = value['quantity'];
				var origPrice = price / qty;
				total = total + parseFloat(price);
				customID = value['customID'];
				$('table#quoteTable').find('tbody').append('
					<tr id="trow'+ctr+'">
						<td><img src="'+APP_URL+''+value['link']+'" class="img-thumbnail" width="100" height="100"></td>
						<td>'+value['name']+'</td>
						<td>'+value['description']+'</td>
						<td>'+value['model']+'</td>
						<td>'+value['unit']+'</td>
						<td id="qty'+ctr+'" class="qty">'+value['quantity']+'</td>
						<td class="price" id="price'+ctr+'">'+numeral(price).format('0,0.00')+'</td>
						<input type="hidden" id="itemID'+ctr+'" name="id['+ctr+']" value="'+value['id']+'">
						<input type="hidden" id="quantity'+ctr+'" name="quantity['+ctr+']" value="'+value['quantity']+'">
						<input type="hidden" id="origPrice'+ctr+'" value="'+origPrice+'">
						<input type="hidden" id="qDetails_id'+ctr+'" name="qDetails_id['+ctr+']" value="'+value['qDetail_id']+'">
						<input type="hidden" id="itemPrice'+ctr+'" name="price['+ctr+']" value="'+numeral(price).format('0.00')+'">
						<td class="remove-op" hidden> <button class="btn btn-danger btn-sm remove" id="'+ctr+'" type="button">Remove</button></td>
					</tr>
				');
				ctr++;
			});
		}
		var subTotal = total - discount;
		var vat = subTotal * .12;
		var grandTotal = subTotal + vat;
		origSubtotal = subTotal;
		$('td#discPrice').html(numeral(discount).format('0,0.00'));
		$('#discount').val(discount);
		$('span#vat').html(numeral(vat).format('0,0.00'));
		$('span#gTotal').html(numeral(grandTotal).format('0,0.00'));
		$('#quotation-details').html('
			<div class="pull-left">
              Company/Customer: '+cName+' <br>
              Address: '+cAddress+' <br>
              Project Name: '+pName+'
            </div>
            <div class="pull-right">
              Contact Person: '+cContact+' <br>
              Telephone No.: '+cPhone+' <br>
              Email Address: '+cEmail+'
            </div>
		');
			// Quotation #: <b>'+customID+'</b><br> Project Name: <b>'+pName+'</b><br> Customer/Company Name: <b>'+cName+'</b>

		$('#runningPrice').html(numeral(total).format('0,0.00'));
		$('#preview-items').modal('show');
	});
}

//Get previous value of price before qty has change
// $(document).on('click', '.qty', function(event) {
// 	var id = event.target.id;
// 	id = parseInt(id.substr(3,1));
// 	var origQty = parseInt($('td#qty'+id).text());
// 	origPrice[id] = numeral($('#itemPrice'+id).val()).format('0.00') / origQty;
// 	// alert(origPrice[1]);
// });
//Focusout event to edit quantity
$(document).on('focusout', '.qty', function(event) {
	
	var id = event.target.id;
	id = id.substr(3,1);
	// alert(origPrice['1']);
	var qty = parseInt($('td#qty'+id).text());
	// if(qty >  )
	var rowCount = $('#quoteTable >tbody >tr').length;
	var origPrice = parseFloat($('#origPrice'+id).val());
	var updatedPrice = qty * origPrice;
	// return false;
	var newPrice=0;
	$('td#price'+id).text(numeral(updatedPrice).format('0,0.00'));
	$('#itemPrice'+id).val(numeral(updatedPrice).format('0.00'));
	for (var ctr = 1; ctr <= rowCount; ctr++) {
			newPrice = newPrice + parseFloat(numeral($('td#price'+ctr).text()).format('0.00'));
	};
	runningPrice = newPrice;
	var discount = parseFloat($('#discount').val());
	var subTotal = runningPrice - discount;
	var vat = subTotal * .12;
	var grandTotal = subTotal + vat;
	$('span#vat').text(vat);
	$('td#gTotal').text(grandTotal);
	$('td#runningPrice').html(numeral(runningPrice).format('0,0.00').bold());
	$('#quantity'+id).val(qty);

	// origPrice = 0;
	/* Act on the event */
});
//Remove Item on List
$(document).on('click', '.remove', function(event) {
	var id = event.target.id;
	var selectedPrice = numeral($('td#price'+id).text()).format('0.00');
	var itemID = $('#itemID'+id).val();
	var rowCount = $('#quoteTable >tbody >tr').length;
	// runningPrice = runningPrice - selectedPrice;
	$('tr#trow'+id).empty();
	// $('td#runningPrice').html(numeral(runningPrice).format('0,0.00').bold());
	$('tr#rowID'+itemID).show();
	var newPrice = 0;
	for (var ctr = 1; ctr <= rowCount; ctr++) {
			newPrice = newPrice + parseFloat(numeral($('td#price'+ctr).text()).format('0.00'));
	};
	runningPrice = newPrice;
	$('td#runningPrice').html(numeral(runningPrice).format('0,0.00').bold());
	/* Act on the event */
});
//On Click event for a price edit
$(document).on('click', '.price', function(event) {
	var id = event.target.id;
	prevPrice = $('#'+id).text();
});
//On Focusout event for a price edit
$(document).on('focusout', '.price', function(event) {
	var id = event.target.id;
	var newPrice = $('#'+id).text();
	var rowCount = $('#quoteTable >tbody >tr').length;
	newPrice = parseFloat(numeral(newPrice).format('0.00'));
	prevPrice = parseFloat(numeral(prevPrice).format('0.00'));
	if(newPrice > prevPrice){
		var addition = newPrice - prevPrice;
		runningPrice = runningPrice + addition;
	}else if(newPrice < prevPrice){
		var deduction = prevPrice - newPrice;
		runningPrice = runningPrice - deduction;
	}
	// $('td#runningPrice').html(numeral(runningPrice).format('0,0.00').bold());
	var itemPriceID = id.substr(5,1);
	$('#itemPrice'+itemPriceID).val(numeral(newPrice).format('0.00'));
	var newPrice = 0;
	for (var ctr = 1; ctr <= rowCount; ctr++) {
			newPrice = newPrice + parseFloat(numeral($('td#price'+ctr).text()).format('0.00'));
	};
	runningPrice = newPrice;
	$('td#runningPrice').html(numeral(runningPrice).format('0,0.00').bold());
});

//show options for editing quotations
$(document).on('click', '.btn-edit-quotation', function(event) {
	var itemID;
	var rowCount = $('#quoteTable >tbody >tr').length;
	for (var ctr = 1; ctr <= rowCount; ctr++) {
		//Add editable content attribute to data in quotation table
		$('td#qty'+ctr).attr('contenteditable', 'true');
		$('td#price'+ctr).attr('contenteditable', 'true');
		//Hide data from item search table
		itemID = $('#itemID'+ctr).val();
		$('#rowID'+itemID).hide();
	};
	$('td#discPrice').attr('contenteditable', 'true');
	$('.edit-quotation').show();
	$('.remove-op').show();
	$('#btns').prepend('
		<button type="button" class="btn btn-success btn-deal-quotation" style="min-width:100px;">Deal</button>
		<button type="submit" class="btn btn-info btn-save-quotation" style="min-width:100px;">Save</button>
	');
	$('#cancel-group').show();
	$(this).hide();
	/* Act on the event */
});

//Click Button Deal
$(document).on('click', '.btn-deal-quotation', function(event) {
	var id = $('#quotation_id').val();
	$.post(dealProject,{id:id,token:_token},function(data){
		 window.location.href = "quotations";
	});

});

//Click Button Print
$(document).on('click', '.btn-print-quotation', function(event) {
	var bootstrapCSS = APP_URL+'/bower_components/admin-lte/bootstrap/css/bootstrap.min.css';
	var fontAwesome = APP_URL+'/bower_components/admin-lte/fontawesome/css/font-awesome.min.css';
	var ionicons = APP_URL+'/bower_components/admin-lte/fontawesome/ionicons.min.css';
	var adminLTE = APP_URL+'/bower_components/admin-lte/dist/css/AdminLTE.min.css';
	var skinBlue = APP_URL+'/bower_components/admin-lte/dist/css/skins/skin-blue.min.css';
	var mystyle = APP_URL+'/components/css/mystyle.min.css';
	// alert(bootstrapCSS);
	// return false;
	$('#preview-items').printThis({
		debug: false,              
	    importCSS: true,             
	    importStyle: true,         
	    printContainer: true,       
	    loadCSS: [bootstrapCSS,fontAwesome,ionicons,adminLTE,skinBlue,mystyle],            
	    removeInline: false,        
	    printDelay: 333,            
	    header: null,             
	    formValues: true 
	});
});

//Discount input computation
$(document).on('keyup', '#discPrice', function(event) {
	// alert('test');
	var discount = parseFloat($(this).text());
	$('#discount').val(discount);
	var subTotal = origSubtotal;
	if(!isNaN(discount)){
		// alert('test');
		// subTotal = numeral($('#origSubtotal').val()).format('0.00');
		subTotal = subTotal - discount;
	}
	var vat = subTotal * .12;
	var grandTotal = subTotal + vat;
	$('span#vat').html(numeral(vat).format('0,0.00').bold());
	$('label#gTotal').html(numeral(grandTotal).format('0,0.00').bold());
});

//Document Ready functions
jQuery(document).ready(function($) {
	//Search Customer
	$('#searchCustomer').keyup(function(event) {
		$("#customer_id").empty();
		var key = $(this).val();
		$.post(customerSearch,{key:key,token:_token},function(data){
  		if(data){
  			// alert(data);

  			$.each($(data), function(key, value) {
  				// alert(value['id']);
  				// return false;
  				if(value != ''){
  					$("#customer_id").append('
				      	<option class="" value="'+value['id']+'">'+value['first_name']+' '+value['last_name']+'</option>
			        ');
  				}    
			});
			return false;
	  		// $('#library-action').val(data['id']);
  		}
  	});
	});

	//Close View Item Modal
	$('.close-item-modal').click(function(event) {
		$('.btn-edit-quotation').remove();
		$('tbody#quoteBody > tr').remove();
		$('td#runningPrice').html(numeral(0).format('0.00').bold());
		$('.btn-save-quotation').remove();
		$('.edit-quotation').hide();
		$('#cancel-group').hide();
		$('.btn-edit-quotation').show();
		$('.btn-deal-quotation').hide();
		$('.btn-print-quotation').remove();
		var rowCount = $('#quoteTable >tbody >tr').length;
		for (var ctr = 1; ctr <= rowCount; ctr++) {
			//Remove editable content attribute to data in quotation table
			$('td#qty'+ctr).removeAttr('contenteditable');
			$('td#price'+ctr).removeAttr('contenteditable');
		};
		$('#btns').prepend('
			<button type="button" class="btn btn-primary btn-edit-quotation" style="min-width:100px;">Edit</button>
		');
		$('td#discPrice'+ctr).attr('contenteditable', false);
	});

	$('#cancelQuotation').click(function(event) {
		if (this.checked) {
			$('.cancel-reason').append('
	          <label>Reason for Cancellation <font color="red">*</font></label>
	          <textarea class="form-control" name="cancel_reason" style="max-width:400px;min-height:80px;" placeholder="Please state your reason why you have to cancel this quotation" required></textarea>
			');
			$('.btn-deal-quotation').hide();
		}else{
			$('.cancel-reason').empty();
			$('.btn-deal-quotation').show();
		};
	});
});