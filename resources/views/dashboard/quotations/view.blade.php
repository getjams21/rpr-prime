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
			<font size="5">Quotations</font>
      <a href="/quotations/new">
  			<button class="btn btn-primary add-user pull-right square">
  		  	<span class="fa fa-plus"></span> New Quotation
  			</button>
      </a>
		</div>
	</div>
	<div class="panel-body">	
		<div class="container-fluid">
			<div class="table-responsive" >
                <table class="table table-striped table-bordered table-hover banks">
                  <thead>
                    <tr>
                      <th>Project Name</th>
                      <th>Quotation ID</th>
                      <th>Customer</th>
                      <th>Sales Person</th>
                      <th>Options</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($quotations as $quotation)
                    <tr>
                        <td>{{$quotation->projectName}}</td>
                        <td>{{$quotation->customID}}</td>
                        <td><?php
                        $customerName = $quotation->Customer->first_name.' '.$quotation->Customer->last_name;
                        $custAddress = $quotation->Customer->address;
                        $custContact = $quotation->Customer->contact_person;
                        $custPhone = $quotation->Customer->phone;
                        $custEmail = $quotation->Customer->email;
                        echo $customerName;
                        
                        ?></td>
                        <td>
                          <?php 
                          $salesMan = $quotation->user->first_name.' '.$quotation->user->last_name;
                          echo $salesMan;
                          ?>
                        </td>
                        <td> <button class="btn btn-success btn-sm" onclick="triggerViewItems('{{$quotation->id}}','{{$customerName}}','{{$quotation->projectName}}','{{$quotation->Customer->id}}','{{$quotation->user_id}}',{{$quotation->status}},{{$quotation->discount}},'{{$custAddress}}','{{$custContact}}','{{$custPhone}}','{{$custEmail}}')">View/Edit</button></td>
                        <td>
                          @if($quotation->status == 0)
                            <font color="#3c8dbc"><b><span class="fa fa-unlock"></span> &nbsp;On Process</b></font>
                          @elseif($quotation->status == 1)
                            <font color="#00a65a"><b><span class="fa fa-lock"></span> &nbsp;Done Deal</b></font>
                          @elseif($quotation->status == 2)
                            <font color="red"><b><span class="fa fa-remove"></span> &nbsp;Cancelled</b></font>
                          @endif
                        </td>
                    </tr>
              		  @endforeach
                  </tbody>
                </table>
              </div><!--table-responsive-->
		</div>
		
	</div>
</div>