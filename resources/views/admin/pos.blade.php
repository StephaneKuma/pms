@extends('layouts.salesman.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-outline-info" style="border-radius: none;">
        <div class="card-body" style="padding-top: 15px;">
            <div class="row">
              <div class="col-md-10">
                <div class="pos_inputs">
                   <form action="" method="post"  class="SalesForm" id="SalesForm" enctype="multipart/form-data">
                    <div class="row m-b-5">
                      <div class="col-md-3">
                        <input name="customer_type" value="WalkIn" type="radio" id="WalkIn_customer" tabindex="-1" checked="checked">
                        <label for="WalkIn_customer">Walk In Customer</label>
                      </div>
                      <div class="col-md-3">
                        <input name="customer_type" value="Regular" type="radio" id="regular_customer"  tabindex="-1">
                        <label for="regular_customer">Regular Customer</label>
                      </div>
                      <div class="col-md-3">
                        <input name="customer_type" value="Wholesale" type="radio" id="wholesale_customer" tabindex="-1">
                        <label for="wholesale_customer">Wholesale Customer</label>
                      </div>

                      <div class="col-md-2" style="margin-left: -42px;">
                          <a href="#" target="_blank" class="btn btn-sm btn-info waves-effect waves-light" tabindex="-1"><b>Create New Customer</b></a>
                      </div>

                      <div class="col-md-1">
                          <a href="http://localhost/mad-pharma-master/Invoice/manage_Invoice" target="_blank" class="btn btn-sm btn-info waves-effect waves-light" tabindex="-1"><b>Manage Invoice</b></a>
                      </div>
                    </div>
                    <div class="row m-b-5">
                      <div class="col-md-3 p-r-5">
                          <div class="input-group">
                              <span class="input-group-addon b-r-0"><i class="fa fa-search" aria-hidden="true"></i>
                              </span>
                              <input type="text" class="form-control" name="cusid" id="cusid" placeholder="Barcode , Phone No..." tabindex="1" autocomplete="off" >
                              <!--<select class="js-customer-data-ajax form-control customer" id="cusid" name="cusid" required  tabindex="1" autocomplete="off">
                              </select>-->
                          </div>
                      </div>
                      <div class="col-md-3 p-l-r-5">
                         <div class="input-group" >
                          <span class="input-group-addon b-r-0">
                          <i class="fa fa-user-circle"></i></span>
                          <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="customer name">
                        </div>
                      </div>
                      <div class="col-md-3 p-l-5">
                         <div class="input-group" >
                          <span class="input-group-addon b-r-0">
                          <i class="fa fa-user-o"></i></span>
                          <input type="text" class="form-control customer_id" name="customer_id" id="customer_id" placeholder="customer ID">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="row">
                          <div class="col-md-6">
                              <span class="custom-text-button">
                                Date:
                                7  Jun 20
                              </span>
                          </div>
                          <div class="col-md-6">
                              <span class="custom-text-button">
                                Time:
                                03:10 PM
                              </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-b-5">
                      <div class="col-md-9">
                        <div class="row pos-remove-spacing">
                          <div class="col-md-4" style="">
                            <div class="input-group">
                              <span class="input-group-addon b-r-0"><i class="fa fa-search" aria-hidden="true"></i>
                              </span>
                              <input type="hidden" id="proid" name="proid" value="">
                              <!--<select class="js-product-data-ajax form-control product" name="proval" style="width:100%" required id="product_name" tabindex="2" autocomplete="off">
                              </select>-->
                              <input type="text" class="form-control proval" name="proval" placeholder="Barcode , Product ID..."  id="product_name" tabindex="2" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control proname" name="proname" id="proname" placeholder="Product Name"  autocomplete="off"><sup><h6 id="expiry" style="color:red;margin-top: 5px;position:absolute;"></h6></sup>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group genric-left-sug">
                              <input type="text" class="form-control genname" name="genname" id="genname" placeholder="Generic Name" required  autocomplete="off">
                            </div>
                            <div class="input-group genric-right-sug"  >
                              <!--span class="input-group-addon suggestion-icon b-r-0"><i class="fa fa-gg"></i>
                              </span-->
                              <select id="lunch" class="form-control select2 generic gensuggestion" name="generic" title="" style="" placeholder=""  autocomplete="off">
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2" style="">
                            <div class="form-group">
                              <input type="text" class="form-control qty" name="qty" max="" id="qty" placeholder="Qty " required tabindex="4" autocomplete="off">
                              <!-- TABINDEX RESET INPUT  -->
                              <input type="text" tabindex="5" onfocus="document.getElementById('product_name').focus()" style="position: fixed; top: 9999px; left: 9999px">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-money"></i>
                              </span>
                              <input type="text" class="form-control mrp" name="mrp" id="mrp" placeholder="MRP" readonly tabindex="-1" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-cart-arrow-down"></i>
                              </span>
                              <input type="text" class="form-control stock" name="stock" id="stock" placeholder="Stock " readonly tabindex="-1" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    <form action="" method="post" name="SalesFormConfirm" class="SalesFormConfirm" id="SalesFormConfirm" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="table-responsive mb-15" style="height: 300px; overflow-y: auto; ">
                          <table class="table table-bordered pos_table scroll">
                            <thead>
                              <tr>
                                <th>Product Name
                                </th>
                                <th>Quantity
                                </th>
                                <th>Total
                                </th>
                                <th>Action
                                </th>
                              </tr>
                            </thead>
                            <tbody id="posinfo">

                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="row form-group">
                          <div class="col-md-5">
                            <label for="example-text-input" class=" col-form-label pos-label">Total Tk.
                            </label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control grandtotal" name="grandtotal" type="text" value="" style="" tabindex="-1" readonly>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-5">
                            <label for="example-text-input" class=" col-form-label pos-label">Discount
                            </label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control gdiscount" name="gdiscount" type="text" value="0" style="" tabindex="-1" readonly>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-5">
                            <label for="example-text-input" class=" col-form-label pos-label">Payable Tk.
                            </label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control payable" name="payable" type="text" value="" style="" tabindex="-1" readonly>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-5">
                            <label for="example-text-input" class=" col-form-label pos-label">Paid Tk.
                            </label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control pay" type="text" name="pay" value="" style="" tabindex="-1" required="1">
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-5">
                            <label for="example-text-input" class=" col-form-label pos-label">Return Tk.
                            </label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control return" name="return" type="text" value="" style="" tabindex="-1">
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-5">
                            <label for="example-text-input" class=" col-form-label pos-label">Due Tk.
                            </label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control due" name="due" type="text" value="" style="" tabindex="-1">
                          </div>
                        </div>
                        <!--Regular customer sales target view-->
                        <div class="row form-group">
                          <div class="col-md-12">
<!--                              <label for="example-text-input" id="sales" class="col-form-label" style="color:#007bff">
                            </label>-->
                            <!--Dues-->
                            <div id="sales">

                             </div>
                          </div>
                        </div>
                      </div>
                    </div><input type="hidden" id="cid" name="cid" value='' tabindex="-1">
                    <div class="row">
                      <div class="col-md-3">

                        <button type="button" id="saleSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 70%;">Sale & Invoice
                        </button>
                      </div>
                      <div class="col-md-3">
                        <button type="button" id="FinalSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 50%;">Save
                        </button>
                      </div>
                      <!--<div class="col-md-3">
                        <button type="submit" id="Billhold" class="btn waves-effect waves-light btn-secondary" style="width: 50%;">Hold Bill
                        </button>
                      </div>-->
                      <div class="col-md-3">
                        <button type="submit" id="salesposSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 70%;">Invoice & Print
                        </button>
                      </div>
                    </div>
                    </form>
                </div>
              </div>
              <div class="col-md-2">
                <!--Super sale-->
                <div class="card">
                  <div class="card-heading">
                    <span style="display: block; padding: 7px 10px; background-color: #a5a5a5; color: #fff;font-weight:600">
                      Super Sale
                    </span>
                  </div>
                  <div class="card-body" style="padding: 0; ">
                    <ul class="list-group custom_list" style="height: 420px; overflow-y: auto;">
                                             </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<div id="invoicemodal" class="modal fade" role="dialog" >
<div class="modal-dialog" style="width: 350px;">
  <!-- Modal content-->
  <div class="modal-content" id="invoicedom">

  </div><!-- ./model-content  -->
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
</div>
@endsection
