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
                                    <span style="font-size: 1.25rem; color: black">Customer Trash List</span>
                                    <a href="{{ route('customers.index') }}" class="btn btn-success float-right"><i class="feather icon-plus"></i> Manage Customer</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Customer Name</th>
                                                <th>Mobile 1</th>
                                                <th>Email 1</th>
                                                <th>Balance</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trashCustomer as $key => $customer)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $customer->name ? $customer->name : null }}</td>
                                                    <td>{{ $customer->mobile_no_one ? $customer->mobile_no_one : null }}</td>
                                                    <td>{{ $customer->email_one ? $customer->email_one : null }}</td>
                                                    <td>{{ $customer->balance ? number_format($customer->balance, 2) : null }}</td>
                                                    <td>
                                                        <a href="{{ url('/customer/restore/'.$customer->id) }}" title="Restore Customer" class="btn btn-sm btn-warning">
                                                            <i class="feather icon-refresh-ccw"></i>
                                                        </a>
                                                        <a href="{{ url('customer/destroy', $customer->id) }}" title="Delete Customer" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $customer->id }}').submit();" class="btn btn-sm btn-danger">
                                                            <i class="feather icon-trash"></i>
                                                        </a>
                                                        <form id="destroy-form-{{ $customer->id }}" action="{{ url('/customer/destroy', $customer->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
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
