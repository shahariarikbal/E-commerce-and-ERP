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
                                    <span style="font-size: 1.25rem; color: black">Supplier Money Receipt List</span>
                                    <a href="{{ route('suppliers.index') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Manage Supplier</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Supplier Name</th>
                                                <th>Invoice No</th>
                                                <th>Net Total</th>
                                                <th>Debit Amount</th>
                                                <th>Credit Amount</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($suppliers as $key => $supplier)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($supplier->created_at)) }}</td>
                                                    <td>
                                                        @if(isset($supplier->supplier->name))
                                                        {{ $supplier->supplier->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($supplier->supplier->invoice_no))
                                                        {{ $supplier->supplier->invoice_no }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $supplier->balance ? $supplier->balance : 0.00 }}</td>
                                                    <td>{{ $supplier->daily_paid ? $supplier->daily_paid : 0.00 }}</td>
                                                    <td>{{ $supplier->balance - $supplier->daily_paid }}</td>
                                                    <td>
                                                        <a href="{{ url('/supplier/vouser/'.$supplier->id) }}" title="View Details" class="btn btn-sm btn-success">
                                                            <i class="feather icon-eye" style="font-size: 15px;"></i>
                                                        </a>
                                                        <a href="{{ url('/supplier/receipt/download/'.$supplier->id) }}" title="Download Money Receipt" class="btn btn-sm btn-info">
                                                            <i class="feather icon-arrow-down" style="font-size: 15px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
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
