@extends('layouts.salesman.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $customer->name }} Detail</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Email</span>
                    <span class="info-box-number text-center text-muted mb-0">
                        {{ $customer->email }}
                    </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Phone</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $customer->phone }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Address</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $customer->address }}<span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="post">
                    <div class="user-block">
                        <span class="">
                            <a href="#">Description</a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{ $customer->note }}
                      </p>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            @if(Storage::disk('public')->exists('customers/'.$customer->image))
                <img src="{{Storage::url('customers/'.$customer->image)}}" alt="{{$customer->name}}" class="img-responsive img-rounded">
            @endif
          <h3 class="text-primary mt-2">Name : {{ $customer->name }}</h3>
          <br>
          <div class="text-muted">
            <p class="text-sm">Pharmacy
              <b class="d-block">{{ $customer->company_id }}</b>
            </p>
          </div>
          <div class="text-center mt-5 mb-3">
            <a href="#" class="btn btn-sm btn-warning">Edit</a>
            <a href="#" class="btn btn-sm btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
