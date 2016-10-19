<!-- User Add Modal -->
<div class="modal fade" id="user-library" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">New User</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-12">
      <div class="well customerForm">
      <div>
      {{ Form::open(['url' => '/users/createuser', 'id'=>'userForm']) }}
      <div class="form-group">
        <label>Username</label>
        <input class="form-control username" type="text" name="username" id="username" placeholder="Username" required>
      </div>
      <div class="form-group user-pwd">
        <label>Password</label>
        <input type="password" class="form-control password" name="password" id="password" placeholder="Password" required>
      </div>
      <div class="form-group user-pwd">
        <label>Retype Password</label>
        <input type="password" class="form-control retype-password" name="password_confirmation" placeholder="Retype Password" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input class="form-control lastname" type="text" name="last_name" id="last_name" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>First Name</label>
        <input class="form-control firstname" type="text" name="first_name" id="first_name" placeholder="First Name">
      </div>
      <div class="form-group">
        <label>Middle Initial</label>
        <input class="form-control mi" type="text" name="MI" id="mi" maxlength="1" style="width:38px;" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input class="form-control email" type="email" name="email" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label>Position</label>
        <select class="form-control" id="position" name="position">
          <option class="" value="1" selected>Admin</option>
          <option class="" value="2">Staff</option>
        </select>
        <input type="hidden" name="id" id="library-action" value="">
      </div>
      <div class="form-group">
        <label>Branch</label>
        <select class="form-control" id="branchID" name="branchID">
          <option class="" value="1" selected>Tacurong</option>
          <option class="" value="2">Cebu</option>
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
			<font size="5">Users</font>
			<button class="btn btn-primary add-user pull-right square" data-toggle="modal" data-target="#user-library">
		  	<span class="fa fa-plus"></span> New User
			</button>
		</div>
	</div>
	<div class="panel-body">	
		<div class="container-fluid">
			<div class="table-responsive" >
                <table class="table table-striped table-bordered table-hover banks">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Lastname</th>
                      <th>Firstname</th>
                      <th>MI</th>
                      <th>User Type</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
              		<!-- table data here -->
                  @foreach($Users as $User)
                      <tr>
                            <td>{{$User->username}}</td>
                            <td>{{$User->last_name}}</td>
                            <td>{{$User->first_name}}</td>
                            <td>{{$User->MI}}</td>
                            <td><?php 
                              if($User->position == 1){
                                echo 'Admin';
                              }elseif ($User->position == 2) {
                                echo 'Staff';
                              }
                              ?></td>
                            <td><center><button class="btn btn-success btn-sm" onclick="triggerEditUser({{$User->id}})"><span class="glyphicon glyphicon-cog"></span> Edit</button></center></td>
                       </tr>
                  @endforeach 
                  </tbody>
                </table>
              </div><!--table-responsive-->
		</div>
		
	</div>
</div>