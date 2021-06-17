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
                                    <span style="font-size: 1.25rem; color: black">Details Customer</span>
                                    <a href="{{ route('customers.index') }}" class="btn btn-primary float-right">Manage Customer</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>{{ $customer->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Mobile 1</th>
                                            <th>{{ $customer->mobile_no_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Office Contact No</th>
                                            <th>{{ $customer->office_contact }}</th>
                                        </tr>
                                        <tr>
                                            <th>Email 1</th>
                                            <th>{{ $customer->email_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Email 2</th>
                                            <th>{{ $customer->email_two }}</th>
                                        </tr>
                                        <tr>
                                            <th>Address 1</th>
                                            <th>{{ $customer->address_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Address 2</th>
                                            <th>{{ $customer->address_two }}</th>
                                        </tr>
                                        <tr>
                                            <th>City 1</th>
                                            <th>{{ $customer->city_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>City 2</th>
                                            <th>{{ $customer->city_two }}</th>
                                        </tr>
                                        <tr>
                                            <th>Country 1</th>
                                            <th>{{ $customer->country_one }}</th>
                                        </tr>
                                        <tr>
                                            <th>Country 2</th>
                                            <th>{{ $customer->country_two }}</th>
                                        </tr>
                                        <tr>
                                            <th>Fax No</th>
                                            <th>{{ $customer->fax_no }}</th>
                                        </tr>
                                        <tr>
                                            <th>Debit Amount</th>
                                            <th>{{ $customer->debit_amount }}</th>
                                        </tr>
                                        <tr>
                                            <th>Credit Amount</th>
                                            <th>{{ $customer->credit_amount }}</th>
                                        </tr>
                                        <tr>
                                            <th>Balance</th>
                                            <th>{{ number_format($customer->balance, 2) }}</th>
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
