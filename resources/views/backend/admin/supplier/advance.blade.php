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
                                    <span style="font-size: 1.25rem; color: black">Supplier Advance</span>
                                    <a href="{{ route('suppliers.index') }}" class="btn btn-primary float-right">Manage Supplier</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('supplier/advance/update/'.$supplier->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <span style="font-size: 24px; margin-top: 20px;">{{ $supplier->name }}</span>
                                                <div class="form-group">
                                                    <label>Daily Paid</label>
                                                    <input type="number" class="form-control" name="daily_paid" id="daily_paid" placeholder="Paid Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label>Net Total</label>
                                                    <input type="number" name="credit_amount" id="credit" readonly value="{{ $supplier->balance }}" class="form-control credit" placeholder="Credit Amount">
                                                    <span style="color: red"> {{ $errors->has('credit_amount') ? $errors->first('credit_amount') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Debit Amount</label>
                                                    <input type="number" class="form-control" readonly name="debit_amount" value="{{ $supplier->daily_paid }}" id="debit" placeholder="Paid Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label>Due Balance</label>
                                                    <input type="text" name="balance" readonly id="totalAmount" value="{{ $supplier->previous_due }}" class="form-control" placeholder="Balance">
                                                </div>
                                                <button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Update</button>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
    <script  src="{{ asset('/backend/') }}/files/bower_components/jquery/js/jquery.min.js"></script>
    <script>

        $('input').on('change', function () {
            var after = parseInt($('#debit').val());
            var credit = parseInt($('#credit').val());
            var before = parseInt($('#daily_paid').val());
            var debitCredit = (parseInt(credit) - parseInt(after + before));
            $('#debit').val((parseInt(after + before) ? parseInt(after + before) : 0).toFixed(2));
            $('#totalAmount').val((parseInt(debitCredit) ? parseInt(debitCredit) : 0).toFixed(2));
        })
    </script>
@endsection
