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
                                        @if(isset($dailyPaid->sale->customer))
                                        {{ $dailyPaid->sale->customer->address_one }}
                                        @endif
                                    </span><br/>
                                    <span>Invoice No :
                                        @if(isset($dailyPaid->sale->invoice_no))
                                        {{ $dailyPaid->sale->invoice_no }}
                                        @endif
                                    </span><br/>
                                    <span>Date : {{ date('d M Y', strtotime($dailyPaid->created_at))  }}</span><br/>
                                    <span>Receipt No : Diplomacy-{{ $dailyPaid->id }}</span>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Type</td>
                                            <td>Amount</td>
                                        </tr>
                                        <tr>
                                            <td>Payment</td>
                                            <td>{{ $dailyPaid->daily_paid ? number_format($dailyPaid->daily_paid, 2) : null }}</td>
                                        </tr>
                                    </table>
                                    <span style="font-weight: bold; font-size: 15px;">Money Received {{ $dailyPaid->daily_paid ? number_format($dailyPaid->daily_paid, 2) : null }} AED</span><br/><br/>
                                    <a href="{{ url('/customer/money-receipts') }}" class="btn btn-danger">Cancel</a>
                                    <a href="{{ url('/customer/receipt/download/'.$dailyPaid->id) }}" class="btn btn-info"><i class="feather icon-printer" style="font-size: 18px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
