@extends('backend.admin.master')

@section('content')
{{-- @dd('hello') --}}
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Customer Money Receipt List</span>
                                    <a href="{{ route('customers.index') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Manage Customer</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Invoice No</th>
                                                <th>Receipt No</th>
                                                <th>Daily Paid</th>
                                                <th>Debit Amount</th>
                                                {{-- <th>Due Balance</th> --}}
                                                <th>Credit Amount</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dailyPaids as $key => $dailyPaid)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($dailyPaid->created_at)) }}</td>
                                                    <td>
                                                        @if(isset($dailyPaid->sale) && isset($dailyPaid->sale->customer ))
                                                        {{ $dailyPaid->sale->customer->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($dailyPaid->sale))
                                                        {{ $dailyPaid->sale->invoice_no }}
                                                        @endif
                                                    </td>
                                                    <td>Diplomacy-{{ $dailyPaid->id }}</td>
                                                    <td>{{ $dailyPaid->daily_paid }}</td>
                                                    <td>{{ $debitSum = $dailyPaid->debit_amount }}</td>
                                                    {{-- <td>{{ $dailyPaid->balance ? number_format($dailyPaid->balance, 2) : '0.00' }}</td> --}}
                                                    <td>{{ $dailyPaid->credit_amount ? number_format($dailyPaid->credit_amount, 2) : null }}</td>
                                                    <td>
                                                        <a href="{{ url('/customer/vouser/'.$dailyPaid->id) }}" title="View Details" class="btn btn-sm btn-success">
                                                            <i class="feather icon-eye" style="font-size: 15px;"></i>
                                                        </a>
                                                        <a href="{{ url('/customer/receipt/download/'.$dailyPaid->id) }}" title="Download Money Receipt" class="btn btn-sm btn-info">
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
