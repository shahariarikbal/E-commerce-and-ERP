@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        @if($page == 'index')
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Currency List</span>
                                    <a href="{{ url('/admin/currency/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Currency</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Currency Name</th>
                                                <th>Rate</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key => $info)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td style="text-transform: uppercase">{{ $info->name }}</td>
                                                        <td>{{ $info->price }}</td>
                                                        <td>
                                                            <a href="{{ url('/admin/currency/edit/'.$info->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                            <a href="{{ url('/admin/currency/delete/'.$info->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($page == 'create')
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size: 1.25rem; color: black">Currency Create</span>
                                        <a href="{{ url('/admin/currency/index') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Manage Currency</a>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ url('/admin/currency/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <lable>Currency name</lable>
                                                <input type="text" class="form-control" name="name" placeholder="Currency name" required>
                                            </div>
                                            <div class="form-group">
                                                <lable>Rate</lable>
                                                <input type="text" class="form-control" name="price" placeholder="Currency rate" required>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-sm btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($page == 'edit')
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size: 1.25rem; color: black">Currency Update</span>
                                        <a href="{{ url('/admin/currency/index') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Manage Currency</a>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ url('/admin/currency/update/'.$currency->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <lable>Currency name</lable>
                                                <input type="text" class="form-control" name="name" value="{{ $currency->name }}" placeholder="Currency name" required>
                                            </div>
                                            <div class="form-group">
                                                <lable>Rate</lable>
                                                <input type="text" class="form-control" name="price" value="{{ $currency->price }}" placeholder="Currency rate" required>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
