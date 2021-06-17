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
                                <span style="font-size: 1.25rem; color: black">Account Receivable</span>
                            </div>
                            <div class="card-block" id="payable">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Client Name</th>
                                            <th>Invoice No</th>
                                            {{-- <th>Product</th> --}}
                                            <th>Unit Price</th>
                                            <th>Total Qty</th>
                                            <th>Net Total</th>
                                            {{-- <th>Total Price</th> --}}
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        {{-- 
                                            @php
                                                dd($customerSaleData[1]->saleProduct);
                                            @endphp --}}

                                        @php($sum = 0)
                                        @php($credit = 0)
                                        @php($i = 0)
                                        @foreach( $customerSaleData as $key => $sale )
                                            @php($credit = $credit + ($sale->net_total - $sale->paid_amount))
                                            @foreach( $sale->saleProduct as $saleProd )
                                                <tr>
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{ isset($sale->customer) ? substr($sale->customer->name,0,20) : null }}</td>
                                                    <td>
                                                        <a href="{{ url('sale/edit/' . $sale->id) }}">{{ $sale->invoice_no ? $sale->invoice_no : null }}</a>
                                                    </td>
                                                    {{-- <td>{{ isset($saleProd->product) ? Str::limit($saleProd->product->name, 10) : '' }}</td> --}}
                                                    <td>{{ $saleProd->rate }}</td>
                                                    <td>{{ $saleProd->available_qty }}</td>
                                                    <td>{{ $sale->net_total ? $sale->net_total : 0.00 }}</td>
                                                    {{-- <td>{{ $saleProd->total ? $saleProd->total : 0.00 }}</td> --}}
                                                    <td>{{ $sale->paid_amount ? $sale->paid_amount : 0.00 }}</td>
                                                    <td>{{ $credit }}</td>                           
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="{{ url('/sale/customer/invoice/'.$sale->customer->id) }}" title="Customer Invoice" class="dropdown-item btn btn-sm btn-info">
                                                                    Invoice
                                                                </a>
                                                                @if($sale->due_amount != 0)
                                                                <a href="{{ url('/sale/payment/' . $sale->id) }}" title="Customer Advance" class="dropdown-item btn btn-sm btn-warning">
                                                                    Payment
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php //$sum = $sum+$grandTotal; ?>
                                            @php($i++)
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Due : {{ $credit }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
