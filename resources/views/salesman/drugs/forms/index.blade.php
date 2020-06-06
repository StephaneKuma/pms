@extends('layouts.salesman.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('salesman.drugs.forms.create') }}" class="btn btn-block btn-primary"><i class="fa fa-add"></i> {{ _("Add Drug Form") }}</a>
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
                  <th>Id</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $counter = 1 ?>
                    @foreach ($drugForms as $drugForm)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $drugForm->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('salesman.drugs.forms.show', $drugForm->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">view</i>
                                </a>
                                <a href="{{ route('salesman.drugs.forms.edit', $drugForm->id) }}" class="btn btn-info btn-sm waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteDF({{$drugForm->id}})">
                                    <i class="material-icons">delete</i>
                                </button>
                                <form action="{{ route('salesman.drugs.forms.destroy', $drugForm->id) }}" method="POST" id="del-drugForm-{{$drugForm->id}}" style="display:none;">
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
