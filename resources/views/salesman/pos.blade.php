@extends('layouts.salesman.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 pr-2">
                            <div class="row">
                                <div class="col-12">
                                    <form action="#" method="POST">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <form action="#">
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
                                                          <a href="http://localhost/mad-pharma-master/Customer/Create" target="_blank" class="btn btn-sm btn-info waves-effect waves-light" tabindex="-1"><b>Create New Customer</b></a>
                                                      </div>

                                                      <div class="col-md-1">
                                                          <a href="http://localhost/mad-pharma-master/Invoice/manage_Invoice" target="_blank" class="btn btn-sm btn-info waves-effect waves-light" tabindex="-1"><b>Manage Invoice</b></a>
                                                      </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <form action="#" method="POST">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputFile">File input</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="exampleInputFile">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="">Upload</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form action="#" method="POST">
                                <div class="card card-info">
                                    <div class="card-header">
                                      <h3 class="card-title">Sale</h3>
                                    </div>
                                    <div class="card-body">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                      </div>

                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span class="input-group-text">.00</span>
                                        </div>
                                      </div>

                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span class="input-group-text">.00</span>
                                        </div>
                                      </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
