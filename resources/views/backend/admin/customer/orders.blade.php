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
                                    <span style="font-size: 1.25rem; color: black">Order List</span>
                                {{--     <a href="{{ url('customer/trash-list') }}" class="btn btn-danger float-right"><i class="feather icon-trash-2"></i> Trash Order</a>
                                    <a href="{{ route('customers.create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Order</a> --}}
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Customer</th>
                                                <th>Order Total</th>
                                                <th>Order Status</th>
                                                <th>Payment Type</th>
                                                <th>Download</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key => $order)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                                    <td>000{{ $order->customer ? $order->id : '' }}</td>
                                                    <td>{{ $order->customer ? $order->customer->name : '' }}</td>
                                                    <td>{{ $order->order_total }}</td>
                                                    <td>{{ $order->order_status }}</td>
                                                    <td>{{ $order->payment->count() > 0 ? $order->payment->sortBy('created_at')->first()->payment_type : '' }}</td>
                                                    <td><a href="{{ url('/customer/order/invoice/'.$order->customer_id) }}" class="btn btn-primary btn-sm">Invoice</a></td>
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
