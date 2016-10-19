<!-- User Add Modal -->
<div class="modal fade" id="user-library" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['url' => '/branches/createbranch', 'id'=>'branchForm']) }}
      <div class="modal-header">
        <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">New Branch</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-12">
      <div class="well customerForm">
        <div>
          <div class="form-group">
            <label>Name</label>
            <input class="form-control name" type="text" name="name" id="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control address" type="text" name="address" id="address" placeholder="Address" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input class="form-control phone" type="text" name="phone" id="phone" placeholder="Phone Number" required>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
        <input id="isEdit" name="isEdit" type="hidden" value="">
        <input id="id" name="id" type="hidden" value="">
        <button class="btn btn-primary" type="submit">Submit</button>
        <a class="deactivate" href=""><button class="btn btn-danger delete pull-left" type="button">Deactivate</button></a>
      </div>
      {{ form::close() }}      
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
<!-- Show Branch List -->
<div class="panel panel-info">
	<div class="panel-heading head">
		<div class="container-fluid">
			<font size="5">Branches</font>
			<button class="btn btn-primary add-user pull-right square" data-toggle="modal" data-target="#user-library">
		  	<span class="fa fa-plus"></span> New Branch
			</button>
		</div>
	</div>
	<div class="panel-body">	
		<div class="container-fluid">
			<div class="table-responsive" >
                <table class="table table-striped table-bordered table-hover banks">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
              		<!-- table data here -->
                      @foreach($Branches as $Branch)
                        <tr>
                            <td>{{$Branch->name}}</td>
                            <td>{{$Branch->address}}</td>
                            <td>{{$Branch->phone}}</td>
                            <td><center><button class="btn btn-success btn-sm" onclick="triggerEditBranch({{$Branch->id}})"><span class="glyphicon glyphicon-cog"></span> Edit</button></center></td>
                       </tr> 
                      @endforeach
                  </tbody>
                </table>
              </div><!--table-responsive-->
		</div>
		
	</div>
</div>