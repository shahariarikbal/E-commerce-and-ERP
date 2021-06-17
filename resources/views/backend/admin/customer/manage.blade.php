@extends('backend.admin.master')

@section('style')
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Customer List</span>
                                    <a href="{{ url('customer/trash-list') }}" class="btn btn-danger float-right"><i class="feather icon-trash-2"></i> Trash Customer</a>
                                    <a href="{{ route('customers.create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Customer</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Invoice No</th>
                                                {{-- <th>Net Total</th> --}}
                                                {{-- <th>Debit</th> --}}
                                                {{-- <th>Credit</th> --}}
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customers as $key => $customer)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($customer->created_at)) }}</td>
                                                    <td>{{ $customer->name ? $customer->name : null }}</td>
                                                    <td>{{ $customer->invoice_no ? $customer->invoice_no : null }}</td>
{{--                                                     <td>{{ $customer->net_total ? $customer->net_total : null }}</td>
                                                    <td>{{ $customer->paid_amount ? $customer->paid_amount : 0 }}</td>
                                                    <td>{{ $customer->net_total - $customer->paid_amount }}</td> --}}
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="{{ route('customers.show', $customer->id) }}" title="View Details" class="dropdown-item btn btn-sm btn-success">
                                                                    View
                                                                </a>
                                                                <a href="{{ url('/customers/'.$customer->id.'/edit') }}" title="Edit Customer" class="dropdown-item btn btn-sm btn-info">
                                                                    Edit
                                                                </a>
 {{--                                                                <a href="{{ url('/customer/advance/'.$customer->id) }}" title="Customer Advance" class="dropdown-item btn btn-sm btn-warning">
                                                                    Paid Amount
                                                                </a> --}}
                                                                @if($customer->status == 'online')
                                                                    <a href="{{ url('/online/customer/invoice/'.$customer->id) }}" title="Customer Invoice" class="dropdown-item btn btn-sm btn-info">
                                                                        Invoice
                                                                    </a>
                                                                @else
                                                                <a href="{{ url('/sale/customer/invoice/'.$customer->id) }}" title="Customer Invoice" class="dropdown-item btn btn-sm btn-info">
                                                                    Invoice
                                                                </a>
                                                                @endif
                                                                <a href="{{ route('customers.destroy', $customer->id) }}" title="Delete Customer" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $customer->id }}').submit();" class="dropdown-item btn btn-sm btn-danger">
                                                                    Delete
                                                                </a>
                                                                <form id="destroy-form-{{ $customer->id }}" action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                </form>
                                                            </div>
                                                        </div>
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
