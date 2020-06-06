@extends('layouts.salesman.app')

@section('content')
<div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="{{ route('salesman.drugs.update', $drug->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="supplier_id" class="col-sm-3 col-form-label">{{ _('Form') }}</label>
                                        <div class="col-sm-9">
                                            <select name="supplier_id" id="supplier_id" class="form-control select2bs4" style="width: 100%;">
                                                <option selected="selected">-- Select a supplier --</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="name" class="col-sm-3 col-form-label">{{ _('Drug Name') }}</label>
                                        <div class="col-sm-9">
                                            <input name="name" value="{{ $drug->name }}" required autofocus type="text" class="form-control" id="name" placeholder="{{ _('Drug Name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">{{ _('Generic Name') }}</label>
                                        <div class="col-sm-9">
                                            <input name="generic_name" value="{{ $drug->generic_name }}" required type="text" class="form-control" id="generic_name" placeholder="{{ _('Generic Name') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="barcode" class="col-sm-3 col-form-label">{{ _('Barcode Number') }}</label>
                                        <div class="col-sm-9">
                                            <input name="barcode" value="{{ $drug->barcode }}" required type="number" class="form-control" id="barcode" placeholder="{{ _('Barcode Number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="strength" class="col-sm-3 col-form-label">{{ _('Strength') }}</label>
                                        <div class="col-sm-9">
                                            <input name="strength" value="{{ $drug->strength }}" required type="text" class="form-control" id="strength" placeholder="{{ _('Strength') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="drug_form" class="col-sm-3 col-form-label">{{ _('Form') }}</label>
                                        <div class="col-sm-9">
                                            <select name="drug_form_id" id="drug_form" class="form-control select2bs4" style="width: 100%;">
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
                                        <label for="trade_price" class="col-sm-3 col-form-label">{{ _('Trade Price') }}</label>
                                        <div class="col-sm-9">
                                            <input name="trade_price" value="{{ $drug->trade_price }}" required type="number" class="form-control" id="trade_price" placeholder="{{ _('Trade Price') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="mrp" class="col-sm-3 col-form-label">{{ _('M.R.P.') }}</label>
                                        <div class="col-sm-9">
                                            <input name="mrp" value="{{ $drug->mrp }}" required type="number" class="form-control" id="mrp" placeholder="{{ _('M.R.P.') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label for="box_size" class="col-sm-3 col-form-label">{{ _('Box Size') }}</label>
                                        <div class="col-sm-9">
                                            <input name="box_size" value="{{ $drug->box_size }}" required type="number" class="form-control" id="box_size" placeholder="{{ _('Box Size') }}">
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="box_price" class="col-sm-3 col-form-label">{{ _('Box Price') }}</label>
                                        <div class="col-sm-9">
                                            <input name="box_price" value="{{ $drug->box_price }}" required type="number" class="form-control" id="box_price" placeholder="{{ _('Box Price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ _('Expire date') }}</label>
                                        <div class="col-sm-9 input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="expire_date" value="{{ old('expire_date') }}" required type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="short_stock" class="col-sm-3 col-form-label">{{ _('Short Quantity') }}</label>
                                        <div class="col-sm-9">
                                            <input name="short_stock" value="{{ $drug->short_stock }}" required type="number" class="form-control" id="short_stock" placeholder="{{ _('Short Quantity') }}">
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
                                                <input name="image" value="{{ $drug->image }}" required type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label for="side_effect" class="col-sm-3 col-form-label">{{ _('Side Effect') }}</label>
                                        <div class="col-sm-9">
                                            <input name="side_effect" value="{{ $drug->side_effect }}" required type="text" class="form-control" id="side_effect" placeholder="{{ _('Side Effect') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 pr-4">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="custom-control custom-checkbox">
                                                <input name="favourite" value="1" class="col-sm-1 custom-control-input" type="checkbox" id="favourite" value="{{ $drug->favourite }}">
                                                <label for="favourite" class="col-sm-11 custom-control-label">Add To Favourite</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ _('Discount') }}</label>
                                        <div class="col-sm-9">
                                            <!-- radio -->
                                            <div class="row form-group clearfix">
                                                <div class="col-sm-2 icheck-success d-inline">
                                                    <input type="radio" name="discount" value="Yes" checked id="discount_yes">
                                                    <label for="discount_yes">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="col-sm-2 icheck-success d-inline">
                                                    <input type="radio" name="discount" value="No" id="discount_no">
                                                    <label for="discount_no">
                                                        No
                                                    </label>
                                                </div>
                                                <div class="col-sm-8"></div>
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
