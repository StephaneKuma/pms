@extends('layouts.salesman.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="#" class="btn btn-block btn-primary"><i class="fa fa-bars"></i> {{ _("Manage Drugs") }}</a>
        </div>
        <div class="col-md-10"></div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="#" method="post">
                        @csrf

                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">{{ _('Supplier') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="{{ _('Supplier Name') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">{{ _('Drug Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="{{ _('Drug Name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">{{ _('Generic Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="{{ _('Generic Name') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">{{ _('Barcode Number') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputPassword3" placeholder="{{ _('Barcode Number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">{{ _('Strength') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="{{ _('Strength') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="drug_form" class="col-sm-3 col-form-label">{{ _('Form') }}</label>
                                        <div class="col-sm-9">
                                            <select id="drug_form" class="form-control select2bs4" style="width: 100%;">
                                                <option selected="selected">-- Select a drug form --</option>
                                                @foreach ($forms as $form)
                                                    <option value="{{ $form->id }}">{{ $form->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">{{ _('Trade Price') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="{{ _('Trade Price') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="drug_form" class="col-sm-3 col-form-label">{{ _('M.R.P.') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="{{ _('M.R.P.') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">{{ _('Box Size') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="{{ _('Box Size') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="drug_form" class="col-sm-3 col-form-label">{{ _('Box Price') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="{{ _('Box Price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ _('Expire date') }}</label>
                                        <div class="col-sm-9 input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="drug_form" class="col-sm-3 col-form-label">{{ _('Short Quantity') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="{{ _('Short Quantity') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ _('Image') }}</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="drug_form" class="col-sm-3 col-form-label">{{ _('Short Quantity') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="{{ _('Short Quantity') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-lg btn-primary">Submit</button>
                                        <button type="button" class="btn btn-lg btn-warning">Cancel</button>
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
