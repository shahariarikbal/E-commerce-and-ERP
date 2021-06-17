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
                                    <span style="font-size: 1.25rem; color: black">Supplier List</span>
                                    <a href="{{ url('supplier/trash-list') }}" class="btn btn-danger float-right"><i class="feather icon-trash-2"></i> Trash Supplier</a>
                                    <a href="{{ route('suppliers.create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Supplier</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Mobile 1</th>
                                                <th>Invoice No</th>
{{--                                                 <th>Net Total</th>
                                                <th>Debit</th>
                                                <th>Credit</th> --}}
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($suppliers as $key => $supplier)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($supplier->created_at)) }}</td>
                                                    <td>{{ $supplier->name ? substr($supplier->name,0,20) : null }}</td>
                                                    <td>{{ $supplier->mobile_no_one ? $supplier->mobile_no_one : null }}</td>
                                                    <td>{{ $supplier->invoice_no ? $supplier->invoice_no : null }}</td>
{{--                                                     <td>{{ $supplier->balance ? $supplier->balance : 0.00 }}</td>
                                                    <td>{{ $supplier->daily_paid ? $supplier->daily_paid : 0.00 }}</td>
                                                    <td>{{ $supplier->balance - $supplier->daily_paid }}</td> --}}
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="{{ route('suppliers.show', $supplier->id) }}" title="View Details" class="dropdown-item btn btn-sm btn-success">
                                                                    View
                                                                </a>
                                                                <a href="{{ url('/suppliers/'.$supplier->id.'/edit') }}" title="Edit Supplier" class="dropdown-item btn btn-sm btn-primary">
                                                                    Edit
                                                                </a>
                                                                <a href="{{ url('/supplier/invoice/'.$supplier->id) }}" title="Supplier Invoice" class="dropdown-item btn btn-sm btn-info">
                                                                    Invoice
                                                                </a>
{{--                                                                 <a href="{{ url('/supplier/advance/'.$supplier->id) }}" title="Supplier Advance" class="dropdown-item btn btn-sm btn-warning">
                                                                    Paid Amount
                                                                </a> --}}
                                                                <a href="{{ route('suppliers.destroy', $supplier->id) }}" title="Delete Supplier" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $supplier->id }}').submit();" class="dropdown-item btn btn-sm btn-danger">
                                                                    Delete
                                                                </a>
                                                                <form id="destroy-form-{{ $supplier->id }}" action="{{ route('suppliers.destroy', $supplier->id) }}" method="post">
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
