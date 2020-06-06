@extends('layouts.salesman.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a href="{{ route('salesman.customers.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Add Customer") }}</a>
    </div>
    <div class="col-md-10"></div>
</div>

<div class="row mt-5">
    <div class="col-12 card">
        <div class="card-header">
          <h3 class="card-title">Customers List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="drugForms" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Type</th>
              <th>Target</th>
              <th>Discount %</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->type }}</td>
                        <td>{{ $customer->target_amount }}</td>
                        <td>{{ $customer->target_discount }}</td>
                        <td class="text-center">
                            @if(Storage::disk('public')->exists('customer_thumbnails/'.$customer->thumb))
                                <img src="{{Storage::url('customer_thumbnails/'.$customer->thumb)}}" alt="{{$customer->name}}" class="img-responsive img-rounded">
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('salesman.customers.show', $customer->id) }}" class="btn btn-info btn-sm waves-effect">
                                <i class="material-icons">view</i>
                            </a>
                            <a href="{{ route('salesman.customers.edit', $customer->id) }}" class="btn btn-info btn-sm waves-effect">
                                <i class="material-icons">edit</i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteDF({{$customer->id}})">
                                <i class="material-icons">delete</i>
                            </button>
                            <form action="{{ route('salesman.customers.destroy', $customer->id) }}" method="POST" id="del-drug-{{$customer->id}}" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Type</th>
                <th>Target</th>
                <th>Discount %</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>
@endsection
