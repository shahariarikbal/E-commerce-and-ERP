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
                                    <span style="font-size: 1.25rem; color: black">DiplomacyKey Ltd</span>
                                </div>
                                <hr/>
                                <div class="card-body">
                                    <span>
                                        @if(isset($supplier->supplier->address_one))
                                        {{ $supplier->supplier->address_one }}
                                        @endif
                                    </span><br/>
                                    <span>Invoice No :
                                        @if(isset($supplier->supplier->invoice_no))
                                        {{ $supplier->supplier->invoice_no }}
                                        @endif
                                    </span><br/>
                                    <span>Date : {{ date('d M Y', strtotime($supplier->created_at))  }}</span><br/>
                                    <span>Receipt No : {{ $supplier->supplier->receipt_no }}</span>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Type</td>
                                            <td>Amount</td>
                                        </tr>
                                        <tr>
                                            <td>Payment</td>
                                            <td>{{ $supplier->daily_paid ? number_format($supplier->daily_paid, 2) : null }}</td>
                                        </tr>
                                    </table>
                                    <span style="font-weight: bold; font-size: 15px;">Money Received {{ $supplier->daily_paid ? number_format($supplier->daily_paid, 2) : null }} AED</span><br/><br/>
                                    <a href="{{ url('/supplier/money-receipts') }}" class="btn btn-danger">Cancel</a>
                                    <a href="{{ url('/supplier/receipt/download/'.$supplier->id) }}" class="btn btn-info"><i class="feather icon-printer" style="font-size: 18px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
