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
                                    <span style="font-size: 1.25rem; color: black">Supplier Trash List</span>
                                    <a href="{{ route('suppliers.index') }}" class="btn btn-success float-right"><i class="feather icon-plus"></i> Manage Supplier</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Supplier Name</th>
                                                <th>Mobile 1</th>
                                                <th>Email 1</th>
                                                <th>Balance</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trashSupplier as $key => $supplier)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $supplier->name ? $supplier->name : null }}</td>
                                                    <td>{{ $supplier->mobile_no_one ? $supplier->mobile_no_one : null }}</td>
                                                    <td>{{ $supplier->email_one ? $supplier->email_one : null }}</td>
                                                    <td>{{ $supplier->balance ? number_format($supplier->balance, 2) : null }}</td>
                                                    <td>
                                                        <a href="{{ url('/supplier/restore/'.$supplier->id) }}" title="Restore Supplier" class="btn btn-sm btn-warning">
                                                            <i class="feather icon-refresh-ccw"></i>
                                                        </a>
                                                        <a href="{{ url('supplier/destroy', $supplier->id) }}" title="Delete Supplier" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $supplier->id }}').submit();" class="btn btn-sm btn-danger">
                                                            <i class="feather icon-trash"></i>
                                                        </a>
                                                        <form id="destroy-form-{{ $supplier->id }}" action="{{ url('/supplier/destroy', $supplier->id) }}" method="post">
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
