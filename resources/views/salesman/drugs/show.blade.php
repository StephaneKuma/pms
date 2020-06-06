@extends('layouts.salesman.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $drug->name }} Detail</h3>

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
                  <span class="info-box-text text-center text-muted">In Stock</span>
                  <span class="info-box-number text-center text-muted mb-0">
                      @if ($drug->instock)
                        {{ $drug->instock }}
                      @else
                        ----
                      @endif
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Short Stock</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $drug->short_stock }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Box Price</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $drug->box_price }}<span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="post">
                  <div class="user-block">
                    <span class="">
                      <a href="#">Side Effect</a>
                    </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    {{ $drug->side_effect }}
                  </p>
                </div>

                <div class="post clearfix">
                  <div class="user-block">
                    <span class="">
                        <a href="#">Strength</a>
                    </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    {{ $drug->strength }}
                  </p>
                </div>

                <div class="post">
                    <div class="user-block">
                        <span class="">
                            <a href="#">Expire Date</a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{ $drug->expire_date }}
                      </p>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            @if(Storage::disk('public')->exists('drugs/'.$drug->image))
                <img src="{{Storage::url('drugs/'.$drug->image)}}" alt="{{$drug->title}}" class="img-responsive img-rounded">
            @endif
          <h3 class="text-primary mt-2">Name : {{ $drug->name }}</h3>
          <h4 class="text-primary mt-2">Generic Name : {{ $drug->generic_name }}</h4>
          <p class="text-muted">{{ $drug->detail }}</p>
          <br>
          <div class="text-muted">
            <p class="text-sm">Supplier
              <b class="d-block">{{ $drug->supplier_id }}</b>
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
