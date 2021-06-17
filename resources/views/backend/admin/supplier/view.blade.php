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
                                    <span style="font-size: 1.25rem; color: black">Details Supplier</span>
                                    <a href="{{ route('suppliers.index') }}" class="btn btn-primary float-right">Manage Supplier</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>{{ $supplier->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Mobile 1</th>
                                            <th>{{ $supplier->mobile_no_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Office Contact No</th>
                                            <th>{{ $supplier->office_contact }}</th>
                                        </tr>
                                        <tr>
                                            <th>Fax No</th>
                                            <th>{{ $supplier->fax_no }}</th>
                                        </tr>
                                        <tr>
                                            <th>Email 1</th>
                                            <th>{{ $supplier->email_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Address 1</th>
                                            <th>{{ $supplier->address_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Country 1</th>
                                            <th>{{ $supplier->country_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>City 1</th>
                                            <th>{{ $supplier->city_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Email 2</th>
                                            <th>{{ $supplier->email_two }}</th>
                                        </tr>

                                        <tr>
                                            <th>Address 2</th>
                                            <th>{{ $supplier->address_two }}</th>
                                        </tr>
                                        <tr>
                                            <th>Country 2</th>
                                            <th>{{ $supplier->country_two }}</th>
                                        </tr>

                                        <tr>
                                            <th>City 2</th>
                                            <th>{{ $supplier->city_two }}</th>
                                        </tr>

                                        <tr>
                                            <th>Supplier Website</th>
                                            <th>{{ $supplier->supplier_web }}</th>
                                        </tr>

                                        <tr>
                                            <th>Previous Due</th>
                                            <th>{{ $supplier->previous_due }}</th>
                                        </tr>
                                        <tr>
                                            <th>Previous Advance</th>
                                            <th>{{ $supplier->previous_advance }}</th>
                                        </tr>
                                        <tr>
                                            <th>Balance</th>
                                            <th>{{ number_format($supplier->balance, 2) }}</th>
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
@endsection
