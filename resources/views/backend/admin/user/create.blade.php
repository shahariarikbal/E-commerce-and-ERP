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
                                    <span style="font-size: 1.25rem; color: black">Add new User</span>
                                    <a href="{{ url('admin/user/manage') }}" class="btn btn-primary float-right">Manage User</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('admin/user/store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                                            <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                                            <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                                            <span style="color: red"> {{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Select role</label>
                                            <select name="role" id="role" class="form-control" >
                                                <option value="admin">Super Admin</option>
                                                <option value="sales">Sales</option>
                                                <option value="accounts">Accounts</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
