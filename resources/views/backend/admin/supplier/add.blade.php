@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Add new Supplier</span>
                                    <a href="{{ route('suppliers.index') }}" class="btn btn-primary float-right">Manage Supplier</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('suppliers.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Supplier Name <small style="color: red">*</small></label>
                                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Supplier name" required>
                                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile No 1</label>
                                                    <input type="number" name="mobile_no_one" value="{{ old('mobile_no_one') }}" class="form-control" placeholder="Mobile No 1">
                                                    <span style="color: red"> {{ $errors->has('mobile_no_one') ? $errors->first('mobile_no_one') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Address 1</label>
                                                    <input type="email" name="email_one" value="{{ old('email_one') }}" class="form-control" placeholder="Email Address one">
                                                    <span style="color: red"> {{ $errors->has('email_one') ? $errors->first('email_one') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 1</label>
                                                    <textarea class="form-control" name="address_one" rows="3" placeholder="Address one">{{ old('address_one') }}</textarea>
                                                    <span style="color: red"> {{ $errors->has('address_one') ? $errors->first('address_one') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>City 1</label>
                                                    <input type="text" name="city_one" value="{{ old('city_one') }}" class="form-control" placeholder="City one">
                                                    <span style="color: red"> {{ $errors->has('city_one') ? $errors->first('city_one') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Country 1</label>
                                                    <input type="text" name="country_one" value="{{ old('country_one') }}" class="form-control" placeholder="Country one">
                                                    <span style="color: red"> {{ $errors->has('country_one') ? $errors->first('country_one') : ' ' }}</span>
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Credit (Advance)</label>--}}
{{--                                                    <input type="number" name="previous_advance" id="previous_advance" value="{{ old('previous_advance') }}" class="form-control" placeholder="Credit Amount">--}}
{{--                                                    <span style="color: red"> {{ $errors->has('previous_advance') ? $errors->first('previous_advance') : ' ' }}</span>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Fax No</label>
                                                    <input type="text" name="fax_no" value="{{ old('fax_no') }}" class="form-control" placeholder="Fax">
                                                    <span style="color: red"> {{ $errors->has('fax_no') ? $errors->first('fax_no') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Office Contact No</label>
                                                    <input type="number" name="office_contact" value="{{ old('office_contact') }}" class="form-control" placeholder="Office Contact No">
                                                    <span style="color: red"> {{ $errors->has('office_contact') ? $errors->first('office_contact') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Address 2</label>
                                                    <input type="email" name="email_two" value="{{ old('email_two') }}" class="form-control" placeholder="Email Address two">
                                                    <span style="color: red"> {{ $errors->has('email_two') ? $errors->first('email_two') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <textarea class="form-control" name="address_two" rows="3" placeholder="Address two">{{ old('address_two') }}</textarea>
                                                    <span style="color: red"> {{ $errors->has('address_two') ? $errors->first('address_two') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>City 2</label>
                                                    <input type="text" name="city_two" value="{{ old('city_two') }}" class="form-control" placeholder="City two">
                                                    <span style="color: red"> {{ $errors->has('city_two') ? $errors->first('city_two') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Country 2</label>
                                                    <input type="text" name="country_two" value="{{ old('country_two') }}" class="form-control" placeholder="Country two">
                                                    <span style="color: red"> {{ $errors->has('country_two') ? $errors->first('country_two') : ' ' }}</span>
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Debit</label>--}}
{{--                                                    <input type="text" name="previous_due" id="debit" value="{{ old('previous_due') }}" class="form-control" placeholder="Debit Amount">--}}
{{--                                                    <span style="color: red"> {{ $errors->has('previous_due') ? $errors->first('previous_due') : ' ' }}</span>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Supplier Website</label>
                                                <input type="text" name="supplier_web" id="supplier_web" value="{{ old('supplier_web') }}" class="form-control" placeholder="Supplier website">
                                            </div>
{{--                                            <div class="form-group col-md-12">--}}
{{--                                                <label>Balance</label>--}}
{{--                                                <input type="text" name="balance" readonly id="totalAmount" value="{{ old('balance') }}" class="form-control" placeholder="Balance">--}}
{{--                                            </div>--}}
                                        </div>
                                        <button type="submit" class="btn btn-success float-right">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('#previous_advance, #debit').on('input',function() {
            var advance = parseInt($('#previous_advance').val());
            var due = parseInt($('#debit').val());
            $('#totalAmount').val((advance - due ? advance - due : 0).toFixed(2));
        });
    </script>
@endsection
