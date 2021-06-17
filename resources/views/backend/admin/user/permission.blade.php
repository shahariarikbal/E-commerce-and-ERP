@extends('backend.admin.master')

@section('content')
    <style>
        #productSearch {
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
    </style>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black; display: inline-block;">Permission</span>
                                        <a href="{{ url('admin/user/manage') }}" class="btn btn-success float-right mt-2" style="margin-right: 15px;"><i class="feather icon-plus"></i> Manage User</a>
                                    <form action="{{ Request::url() }}" method="GET">
                                        <div class="row mt-4">
                                            <div class="col-md-2">                                            
                                                <label for="" style="vertical-align: sub">Select a user</label>
                                            </div>
                                            <div class="col-md-4">
                                                    <select name="user" id="" class="form-control">
                                                        @foreach (App\Model\Admin::all() as $user)
                                                            <option value="{{ $user->id }}" {{ $user->id == Request::get('user') ? 'selected' : ''}}>{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Go" class="btn btn-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @if(Request::filled('user') && !is_null( $user = App\Model\Admin::find(Request::get('user')) ) )
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <form action="{{ url('admin/user/permission/update', Request::get('user') ) }}" method="POST">
                                            @csrf
                                            
                                            <table id="myTable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <td>Functions</td>
                                                    <td>Permission</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Users</td>
                                                        <td><input type="checkbox" name="users" {{ $user->users == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer</td>
                                                        <td><input type="checkbox" name="customer" {{ $user->customer == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Currency</td>
                                                        <td><input type="checkbox" name="currency" {{ $user->currency == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Supplier</td>
                                                        <td><input type="checkbox" name="supplier" {{ $user->supplier == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product Management</td>
                                                        <td><input type="checkbox" name="product" {{ $user->product == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Purchase Management</td>
                                                        <td><input type="checkbox" name="purchase" {{ $user->purchase == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sale Management</td>
                                                        <td><input type="checkbox" name="sale" {{ $user->sale == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stock Management</td>
                                                        <td><input type="checkbox" name="stock" {{ $user->stock == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Report Management</td>
                                                        <td><input type="checkbox" name="report" {{ $user->report == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account Management</td>
                                                        <td><input type="checkbox" name="account" {{ $user->account == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Website</td>
                                                        <td><input type="checkbox" name="website" {{ $user->website == 1 ? 'checked' : '' }}></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="submit" value="Update" class="btn btn-info float-right">
                                        </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
