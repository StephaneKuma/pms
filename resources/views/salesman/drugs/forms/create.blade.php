@extends('layouts.salesman.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('salesman.drugs.forms.create') }}" class="btn btn-block btn-primary"><i class="fa fa-bars"></i> {{ _("Manage Drug Forms") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="{{ route('salesman.drugs.forms.store') }}" method="post">
                        @csrf

                        <div class="col-12">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">{{ _('Name') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ _('Drug Form Name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-lg btn-warning">Cancel</button>
                                    </div>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
