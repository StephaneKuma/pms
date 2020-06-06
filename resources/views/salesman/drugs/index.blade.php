@extends('layouts.salesman.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('salesman.drugs.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Add Drug") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12 card">
            <div class="card-header">
              <h3 class="card-title">Drugs List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="drugForms" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Drug Name</th>
                  <th>Generic Name</th>
                  <th>Form</th>
                  <th>Company</th>
                  <th>Expire Date</th>
                  <th>Barcode</th>
                  <th>M.R.P.</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($drugs as $drug)
                    @dump($drug->barcode)
                        <tr>
                            <td>{{ $drug->name }}</td>
                            <td>{{ $drug->generic_name }}</td>
                            <td>{{ $drug->drug_form_id }}</td>
                            <td>{{ $drug->supplier_id }}</td>
                            <td>{{ $drug->expire_date }}</td>
                            <td>{{ $drug->barcode }}</td>
                            <td>{{ $drug->mrp }}</td>
                            <td class="text-center">
                                @if(Storage::disk('public')->exists('drug_thumbnails/'.$drug->thumb))
                                    <img src="{{Storage::url('drug_thumbnails/'.$drug->thumb)}}" alt="{{$drug->name}}" class="img-responsive img-rounded">
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('salesman.drugs.show', $drug->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">view</i>
                                </a>
                                <a href="{{ route('salesman.drugs.edit', $drug->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteDF({{$drug->id}})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{ route('salesman.drugs.destroy', $drug->id) }}" method="POST" id="del-drug-{{$drug->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Drug Name</th>
                    <th>Generic Name</th>
                    <th>Form</th>
                    <th>Company</th>
                    <th>Expire Date</th>
                    <th>Barcode</th>
                    <th>M.R.P.</th>
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
