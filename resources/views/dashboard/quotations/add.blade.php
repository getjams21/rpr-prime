{{ Form::open(['url' => '/quotations/createquotation', 'id'=>'quotationForm', 'files'=>true]) }}
<div class="row">
	<div class="panel panel-default">
	<div class="panel-body">
    	<div class="col-md-4">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <div class="form-group">
	            <label>Project Name</label>
	            <input class="form-control projectName" type="text" name="projectName" id="projectName" placeholder="Project Name" required>
          	</div>
          	<div class="form-group">
	            <label>Customer Name</label>
	            <input class="form-control searchCustomer" type="text" name="searchCustomer" id="searchCustomer" placeholder="Search Customer Name">
	            <select class="form-control" id="customer_id" name="customer_id">
	            <!-- AJAX CALL for Customer Search -->
	              <!-- <option class="" value="1" selected>Product</option>
	              <option class="" value="2">Service</option> -->
	            </select>
          	</div>
          	<div class="form-group">
	            <label>Sales Person</label>
	            <?php $user = Auth::user(); ?>
	            <input class="form-control searchSalePerson" type="text" name="searchSalePerson" id="searchSalePerson" placeholder="Search Sales Person's Name" value="{{$user->first_name.' '.$user->last_name}}" disabled>
	            <!-- <select class="form-control" id="type" name="type"> -->
	            <!-- AJAX CALL for Customer Search -->
	              <!-- <option class="" value="1" selected>Product</option>
	              <option class="" value="2">Service</option> -->
	            <!-- </select> -->
          	</div>
		  </div>
		</div>
	</div>
	<div class="col-md-8" >
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title"><b>Item Search</b></h3>
		  </div>
		  <div class="panel-body">
		    <table class="table table-striped table-bordered table-hover banks" id="itemTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Model</th>
						<th>UoM</th>
						<th>Price</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $rowID=0; ?>
					@foreach($items as $item)
					<?php $rowID++; ?>
					<tr id="rowID{{$item->id}}">
						<td>{{$item->name}}</td>
                          <td>{{$item->description}}</td>
                          <td>{{$item->model}}</td>
                          <td>{{$item->unit}}</td>
                          <td>Php&nbsp;{{ number_format($item->price, 2)}}</td>
                          <td><center><button class="btn btn-success btn-sm" onClick="triggerAddItem({{$item->id}})" type="button"><span class="fa fa-plus"></span> Add</button></center></td>
                    </tr>
					@endforeach
				</tbody>
			</table>
		  </div>
		</div>
	</div>
  	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover table-responsive" id="quoteTable">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Description</th>
						<th>Model</th>
						<th>UoM</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody id="quoteBody">
					<!-- AJAX Append for selected items -->
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td id="total"><label class="pull-right">TOTAL:</label></td>
						<td id="runningPrice"></td>
					</tr>
				</tfoot>
			</table>
			<center>
				<!-- <div class="checkbox"><label><input type="checkbox" value="">Approve</label></div> -->
				<button class="btn btn-primary btn-lg" type="submit" style="width:160px;">SAVE</button>
			</center>
	</div>
</div>
{{ Form::close() }}