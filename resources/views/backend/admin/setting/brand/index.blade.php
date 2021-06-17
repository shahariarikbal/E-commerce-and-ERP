@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            @if($page == 'index')
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Web Brand List</span>
                                    <a href="{{ url('/web/brand/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Web Brand</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Brand Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=> $info)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $info->name }}</td>
                                                        <td>
                                                            <img src="{{ asset('/brand/'.$info->image) }}" height="50" width="50">
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/web/brand/edit/'.$info->id) }}" class="btn btn-sm btn-primary" title="Brand Edit">Edit</a>
                                                            <a href="{{ url('/web/brand-delete/'.$info->id) }}" class="btn btn-sm btn-danger" title="Brand Delete">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($page == 'create')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <span style="font-size: 1.25rem; color: black">Add New Brand</span>
                                            <a href="{{ url('/web/brands') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Manage Brand</a>
                                        </div>
                                        <form action="{{ url('/web/brand/store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <lable for="name">Name</lable>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Brand Name" required>
                                            </div>
                                            <div class="form-group">
                                                <lable for="image">Image</lable>
                                                <input type="file" name="image" id="image" class="form-control" required>
                                            </div>
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                                @if($page == 'edit')
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <span style="font-size: 1.25rem; color: black">Update Brand</span>
                                                <a href="{{ url('/web/brands') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Add Web Brand</a>
                                            </div>
                                            <form action="{{ url('/web/brand/update/'.$data->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <lable for="name">Name</lable>
                                                    <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control" placeholder="Enter Brand Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <lable for="image">Image</lable>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                    <img src="{{ asset('brand/'.$data->image) }}" height="50" width="50">
                                                </div>
                                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
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
@endsection
