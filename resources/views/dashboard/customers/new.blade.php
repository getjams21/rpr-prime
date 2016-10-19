<!-- Add Customer Modal -->
<div class="modal fade" id="user-library" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['url' => '/customers/createcustomer', 'id'=>'customerForm']) }}
      <div class="modal-header">
        <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">New Customer</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-12">
      <div class="well customerForm">
        <div>
          <div class="form-group">
            <label>First Name</label>
            <input class="form-control first_name" type="text" name="first_name" id="first_name" placeholder="First Name" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input class="form-control last_name" type="text" name="last_name" id="last_name" placeholder="Last Name" required>
          </div>
          <div class="form-group">
            <label>Middle Initial</label>
            <input class="form-control MI" type="text" name="MI" id="MI" maxlength="1" style="width:38px;" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control address" type="text" name="address" id="address" placeholder="Address" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input class="form-control phone" type="text" name="phone" id="phone" placeholder="Phone Number" required>
          </div>
          <div class="form-group">
            <label>email</label>
            <input class="form-control email" type="email" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label>Contact Person</label>
            <input class="form-control contact_person" type="text" name="contact_person" id="contact_person" placeholder="Contact Person" required>
          </div>
          <div class="form-group">
            <label>TIN</label>
            <input class="form-control TIN" type="text" name="TIN" id="TIN" placeholder="TIN Number" required>
          </div>
          <div class="form-group">
            <label>Terms</label>
            <select class="form-control" id="terms" name="terms">
              <option class="" value="1" selected>Cash On Delivery</option>
              <option class="" value="2">15 Days</option>
              <option class="" value="3">30 Days</option>
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
        <a class="deactivate" href=""><button class="btn btn-danger delete pull-left" type="button">Deactivate</button></a>
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
			<font size="5">Customers</font>
			<button class="btn btn-primary add-user pull-right square" data-toggle="modal" data-target="#user-library">
		  	<span class="fa fa-plus"></span> New Customer
			</button>
		</div>
	</div>
	<div class="panel-body">	
		<div class="container-fluid">
			<div class="table-responsive" >
                <table class="table table-striped table-bordered table-hover banks">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>MI</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Contact Person</th>
                      <th>TIN</th>
                      <th>Terms</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
              		<!-- table data here -->
                    @foreach($Customers as $Customer)
                      <tr>
                        <td>{{$Customer->first_name}}</td>
                        <td>{{$Customer->last_name}}</td>
                        <td>{{$Customer->MI}}</td>
                        <td>{{$Customer->address}}</td>
                        <td>{{$Customer->phone}}</td>
                        <td>{{$Customer->email}}</td>
                        <td>{{$Customer->contact_person}}</td>
                        <td>{{$Customer->TIN}}</td>
                        <td><?php 
                          if($Customer->terms == 1){
                            echo 'Cash On Delivery';
                          }elseif ($Customer->terms == 2) {
                            echo '15 Days';
                          }elseif ($Customer->terms == 3) {
                            echo '30 Days';
                          }
                          ?></td>
                        <td><center><button class="btn btn-success btn-sm" onclick="triggerEditCustomer({{$Customer->id}})"><span class="glyphicon glyphicon-cog"></span> Edit</button></center></td>
                       </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div><!--table-responsive-->
		</div>
		
	</div>
</div>