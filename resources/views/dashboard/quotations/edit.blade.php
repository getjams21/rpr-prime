<div class="modal fade" id="edit-quotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-modal close-image-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
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
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sales Person</label>
                      <?php $user = Auth::user(); ?>
                      <input class="form-control searchSalePerson" type="text" name="searchSalePerson" id="searchSalePerson" placeholder="Search Sales Person's Name" value="{{$user->first_name.' '.$user->last_name}}" disabled>
                    </div>
              </div>
            </div>
          </div>
          <div class="col-md-8" >
            <div class="panel panel-info" style="max-height:323px;">
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
                  <tr id="{{$rowID}}">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
      </div>     
    </div>
  </div>
</div>