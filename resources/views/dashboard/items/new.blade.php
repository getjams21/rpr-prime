<!-- Add Customer Modal -->
<div class="modal fade" id="item-library" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['url' => '/items/createitem', 'id'=>'itemForm', 'files'=>true]) }}
      <div class="modal-header">
        <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">New Item</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-12">
      <div class="well customerForm">
        <div>
          <div class="form-group">
            <label>Item Name</label>
            <input class="form-control name" type="text" name="name" id="name" placeholder="Item Name" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control description" type="text" name="description" id="description" placeholder="Description" required></textarea>
          </div>
          <div class="form-group">
            <label>Model</label>
            <input class="form-control model" type="text" name="model" id="model" placeholder="Model" required>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input class="form-control price" type="number" step="any" name="price" id="price" placeholder="Price" required>
          </div>
          <div class="form-group ">
            <label>Effectivity Date</label>
            <div class="input-group date" data-provide="datepicker">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker" name="effectivity_date">
            </div>
          </div>
          <div class="form-group">
            <label>UoM</label>
            <input class="form-control unit" type="text" name="unit" id="unit" placeholder="Unit of Measure" required>
          </div>
          <div class="form-group" id="upload-img">
            <label>Upload Images</label>
            {!! Form::file('images[]', array('multiple'=>true)) !!}
          </div>
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" id="type" name="type">
              <option class="" value="1" selected>Product</option>
              <option class="" value="2">Service</option>
            </select>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <input id="isEdit" name="isEdit" type="hidden" value="">
        <input id="id" name="id" type="hidden" value="">
        <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Submit</button>
        <a class="deactivate" href=""><button class="btn btn-danger delete pull-left" type="button" >Deactivate</button></a>
      </div>
      {{ Form::close() }}      
    </div>
  </div>
</div>
<!-- Notification Section -->
@if (Session::has('flash_message'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <p>{{Session::get('flash_message') }}</p>
  </div>
@endif
<!-- Show User List -->
<div class="panel panel-info">
	<div class="panel-heading head">
		<div class="container-fluid">
			<font size="5">Items</font>
			<button class="btn btn-primary add-user pull-right square" data-toggle="modal" data-target="#item-library">
		  	<span class="fa fa-plus"></span> New Item
			</button>
		</div>
	</div>
	<div class="panel-body">	
		<div class="container-fluid">
			<div class="table-responsive" >
                <table class="table table-striped table-bordered table-hover items">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Model</th>
                      <th>Price</th>
                      <th>Unit</th>
                      <th>Type</th>
                      <th>Images</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
              		<!-- table data here -->
                    @foreach($Items as $Item)
                    <?php $item_id = ''; ?>
                      <tr>
                          <td>{{$Item->name}}</td>
                          <td>{{$Item->description}}</td>
                          <td>{{$Item->model}}</td>
                          <td>{{$Item->price}}</td>
                          <td>{{$Item->unit}}</td>
                          <td><?php
                              if($Item->type == 1){
                                echo 'Product';
                              }else{
                                echo 'Service';
                              }
                              foreach($Item->images as $image)
                              {
                                  $item_id = $image->item_id;
                              }
                              // dd($Item->images->ItemImage->item_id);?></td>
                          <td><center><button class="btn btn-info btn-sm" onclick="previewItemImage({{
                            $item_id
                          }})">Preview Image</button></center></td>
                          <td><center><button class="btn btn-success btn-sm" onclick="triggerEditItem({{$Item->id}})"><span class="glyphicon glyphicon-cog"></span> Edit</button></center></td>
                     </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div><!--table-responsive-->
		</div>
		
	</div>
</div>