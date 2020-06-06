@extends('layouts.salesman.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a href="{{ route('salesman.customers.index') }}" class="btn btn-block btn-primary"><i class="fa fa-bars"></i> {{ _("Manage Customers") }}</a>
    </div>
    <div class="col-md-10"></div>
</div>

<div class="row mt-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="row" action="{{ route('salesman.customers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <div class="row">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="company_id" class="col-sm-3 col-form-label">{{ _('Pharmacy') }}</label>
                                    <div class="col-sm-9">
                                        <select name="company_id" id="company_id" class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">-- Select a pharmacy --</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <label for="name" class="col-sm-3 col-form-label">{{ _('Name') }}</label>
                                    <div class="col-sm-9">
                                        <input name="name" value="{{ old('name') }}" required autofocus type="text" class="form-control" id="name" placeholder="{{ _('Name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="type" class="col-sm-3 col-form-label">{{ _('Client Type') }}</label>
                                    <div class="col-sm-9">
                                        <select name="type" id="type" class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">-- Select a type --</option>
                                            <option value="Regular">{{ _('Regular') }}</option>
                                            <option value="Wholesale">{{ _('Wholesale') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <label for="email" class="col-sm-3 col-form-label">{{ _('Email') }}</label>
                                    <div class="col-sm-9">
                                        <input name="email" value="{{ old('email') }}" required type="email" class="form-control" id="email" placeholder="{{ _('Client mail') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="phone" class="col-sm-3 col-form-label">{{ _('Phone') }}</label>
                                    <div class="col-sm-9">
                                        <input name="phone" value="{{ old('phone') }}" required type="tel" class="form-control" id="strength" placeholder="{{ _('Phone number') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="address" class="col-sm-3 col-form-label">{{ _('Address') }}</label>
                                    <div class="col-sm-9">
                                        <input name="address" value="{{ old('address') }}" required type="text" class="form-control" id="address" placeholder="{{ _('Location') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="target_amount" class="col-sm-3 col-form-label">{{ _('Target Amount') }}</label>
                                    <div class="col-sm-9">
                                        <input name="target_amount" value="{{ old('target_amount') }}" required type="number" class="form-control" id="target_amount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="regular_discount" class="col-sm-3 col-form-label">{{ _('Regular Discount') }}</label>
                                    <div class="col-sm-9">
                                        <input name="regular_discount" value="{{ old('regular_discount') }}" required type="number" class="form-control" id="regular_discount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="target_discount" class="col-sm-3 col-form-label">{{ _('Target Discount') }}</label>
                                    <div class="col-sm-9">
                                        <input name="target_discount" value="{{ old('target_discount') }}" required type="number" class="form-control" id="target_discount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6 pr-4">
                                <div class="row">
                                    <label for="note" class="col-sm-3 col-form-label">{{ _('Note') }}</label>
                                    <div class="col-sm-9">
                                        <input name="note" value="{{ old('note') }}" required type="text" class="form-control" id="note" placeholder="{{ _('Description') }}">
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
                                            <input name="image" value="{{ old('image') }}" required type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
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
