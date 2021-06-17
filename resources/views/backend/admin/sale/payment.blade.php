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
                                    <span style="font-size: 1.25rem; color: black">Sale Payment</span>
                                    <a href="{{ url('customer/all/data/' . $sale->customer->id ) }}" class="btn btn-primary float-right">Sale Account</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('sale/payment/update/'.$sale->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <span style="font-size: 24px; margin-top: 20px;">{{ $sale->name }}</span>
                                                <div class="form-group mt-3">
                                                    <label>Payment</label>
                                                    <input type="number" class="form-control" name="daily_paid" id="daily_paid" placeholder="Payment">
                                                </div>
                                                <div class="form-group">
                                                    <label>Net Price</label>
                                                    <input type="number" name="net_total" id="net_total" readonly value="{{ $sale->net_total == null ? 0 : $sale->net_total }}" class="form-control credit" placeholder="Credit Amount">
                                                    <span style="color: red"> {{ $errors->has('net_total') ? $errors->first('net_total') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Debit Amount</label>
                                                    <input type="number" class="form-control" readonly name="paid_amount" value="{{ $sale->paid_amount == null ? 0 : $sale->paid_amount }}" id="paid_amount" placeholder="Debit Amount">
                                                </div>
                                                <div class="form-group">
                                                    <label>Due Amount</label>
                                                    <input type="number" name="due_amount" readonly id="due_amount" value="{{ $sale->due_amount == null ? 0 : $sale->due_amount }}" class="form-control" placeholder="Balance">
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

            daily_paid = parseInt($('#daily_paid').val());
            paid_amount = {{ $sale->paid_amount == null ? 0 : $sale->paid_amount }};
            console.log(paid_amount);
            $('#paid_amount').val((parseInt(daily_paid + paid_amount) ? parseInt(daily_paid + paid_amount) : 0).toFixed(2));

            net_total = {{ $sale->net_total == null ? 0 : $sale->net_total }};
            current_due_amount = (parseInt(net_total) - parseInt(daily_paid + paid_amount));
            $('#due_amount').val((parseInt(current_due_amount) ? parseInt(current_due_amount) : 0).toFixed(2));
        })
    </script>
@endsection
