@extends('layouts.salesman.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $form->name }} Detail</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 order-2 order-md-1">
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <h3>{{ $form->name }}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="divider"></div>
                <div class="mt-5">
                    <p>
                        <a class="btn btn-lg btn-warning" href="{{ route('salesman.drugs.forms.edit', $form->id) }}">Edit</a>
                    </p>
                    <form class="mt-5" action="{{ route('salesman.drugs.forms.destroy', $form->id) }}" method="post">
                        @csrf

                        <button class="btn btn-lg btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
