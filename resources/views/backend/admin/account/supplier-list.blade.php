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
                                    <span style="font-size: 1.25rem; color: black">Account Payable</span>
                                </div>
                                <div class="card-block" id="payable">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Invoice No</th>
                                                <th>Net Total</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($sum = 0)
                                            @foreach($suppliersData as $key => $supplier)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $supplier->name ? substr($supplier->name,0,20) : null }}</td>
                                                    <td>
                                                        {{ $supplier->invoice_no ? $supplier->invoice_no : null }}
                                                    </td>
                                                    <td>{{ $supplier->balance ? $supplier->balance : 0.00 }}</td>
                                                    <td>{{ $supplier->daily_paid ? $supplier->daily_paid : 0.00 }}</td>
                                                    <td>{{ $grandTotal = $supplier->balance - $supplier->daily_paid }}</td>
                                                    <td>
                                                        <a href="{{ url('/supplier/invoice/'.$supplier->id) }}" title="Supplier Invoice" class="btn btn-sm btn-info">
                                                            Invoice
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $sum = $sum+$grandTotal; ?>
                                            @endforeach
                                            </tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total Due : {{ $sum }}</td>
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
