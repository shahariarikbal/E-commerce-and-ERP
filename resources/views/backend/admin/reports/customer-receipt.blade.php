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
                                    <span style="font-size: 1.25rem; color: black">
                                        @if(isset($saleProduct->customer->name))
                                        {{ $saleProduct->customer->name }}
                                        @endif
                                    </span>
                                </div>
                                <div class="card-body">
                                    <span>
                                        @if(isset($saleProduct->customer->address_one))
                                            {{ $saleProduct->customer->address_one }}
                                        @endif
                                    </span><br/>
                                    <span>Invoice No :
                                        @if(isset($saleProduct->customer->invoice_no))
                                            {{ $saleProduct->customer->invoice_no }}
                                        @endif
                                    </span><br/>
                                    <span>Date : {{ date('d M Y', strtotime($saleProduct->created_at))  }}</span><br/>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Type</td>
                                            <td>Amount</td>
                                        </tr>
                                        <tr>
                                            <td>Payment</td>
                                            <td>
                                                {{ number_format($saleProduct->total,2) }}
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="{{ url('/today/customer/receipt') }}" class="btn btn-danger">Cancel</a>
                                    <a href="{{ url('/today/customer/receipt/download/'.$saleProduct->id) }}" class="btn btn-info"><i class="feather icon-printer" style="font-size: 18px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
