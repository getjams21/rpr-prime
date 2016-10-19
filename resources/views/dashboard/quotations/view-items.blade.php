{{ Form::open(['url' => '/quotations/editquotation', 'id'=>'quotationForm', 'files'=>true]) }}
<div class="modal fade" id="preview-items" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-modal close-item-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
        <div class="col-md-12">
          <!-- div class="col-md-2"> -->
              <center><img src="{{ asset("/components/images/logo/rpr64x64.png")}}" class="responsive" align="left" width="100" height="100" >
          <!-- </div> -->
          <!-- <div class="col-md-10"> -->

              <label align="center">
                <!-- <center> -->
                Tacurong Office: Unit 2, Delgado bldg., Malvar St. Poblacion, Tacurong City
                <br>
                <font color="red">Cebu Office: Unit 1, Cand bldg., National H-w,ay Poblacion, Alcov, Cebu</font>
                <br>
                Email: solutions@rprprime.com Website: www.rprprime.com
                <br>
                Landline: 064-562-3220 Mobile: 0917-840-4736 Skype: leopamkri
                <!-- </center> -->
              </label>
              </center>
          <!-- </div> -->
        </div>
      </div>
      <div class="modal-body">
        <div class="col-md-12" style="margin-bottom: 20px;">
          <div class="breadcrumb" style="background-color:#00c76c;border-radius:0px;font-size:18px;">
            <center><span><font color="white"><b>QUOTATION</b></font></span></center>
          </div>
          <h4 id="quotation-details">
            
          </h4>
        </div>
        <div class="panel panel-default edit-quotation" hidden>
        <div class="panel-body">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                    <label>Project Name</label>
                    <input class="form-control projectName" type="text" name="projectName" id="projectName" placeholder="Project Name" value="" required>
                    <input type="hidden" name="quotation_id" id="quotation_id" value="">
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
                    <input type="hidden" name="user_id" value="" id="user_id">
                    <!-- <select class="form-control" id="type" name="type"> -->
                    <!-- AJAX CALL for Customer Search -->
                      <!-- <option class="" value="1" selected>Product</option>
                      <option class="" value="2">Service</option> -->
                    <!-- </select> -->
                  </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
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
        <div class="container-fluid">
          <div class="col-md-12">
          <table class="table table-striped table-bordered table-hover table-responsive" id="quoteTable">
        <thead>
          <tr>
            <th>Item Image</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Model</th>
            <th>UoM</th>
            <th>Qty</th>
            <th>Price</th>
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
            <td></td>
            <td></td>
            <td id="total"><label class="pull-right">SUB TOTAL:</label></td>
            <td id="runningPrice"></td>
          </tr>
           <tr id="tr-discount">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><label class="pull-right">Discount:</label></td>
            <td id="discPrice"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><label class="pull-right">VAT:</label></td>
            <td><span id="vat">(12%) &nbsp;</span></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><font size="3px;"><label class="pull-right">GRAND TOTAL:</label></font></td>
            <td><font color="#008d4c" size="3px;"><label id="gTotal"></label></font></td>
          </tr>
        </tfoot>
        <input type="hidden" name="discount" id="discount" value="">
      </table>
      <div class="well" id="cancel-group" hidden>
        <center> <div class="checkbox">
              <label>
                <input type="checkbox" class="cancelQuotation" name="cancelQuotation" id="cancelQuotation">
               <font color="red"> Cancel this Quotation </font>
              </label>
            </div>
            <div class="form-group cancel-reason">
            </div>
        </center>
      </div>
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <center id="btns">
          <button type="button" class="btn btn-primary btn-edit-quotation" style="min-width:100px;">Edit</button>
          <button type="button" class="btn btn-default close-modal close-item-modal" data-dismiss="modal" style="min-width:100px;">Close</button>
        </center>
      </div>     
    </div>
  </div>
</div>
{{ Form::close() }}