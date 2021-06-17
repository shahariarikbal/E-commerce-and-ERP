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
                                        <span style="font-size: 1.25rem; color: black">Country List</span>
                                        <a href="{{ url('/web/country/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Country</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Country Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $key=> $info)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $info->name }}</td>
                                                        <td>
                                                            <a href="{{ url('/web/country/edit/'.$info->id) }}" class="btn btn-sm btn-primary" title="Country Edit">Edit</a>
                                                            <a href="{{ url('/web/country/delete/'.$info->id) }}" class="btn btn-sm btn-danger" title="Country Delete">Delete</a>
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
                                            <span style="font-size: 1.25rem; color: black">Add New Country</span>
                                            <a href="{{ url('/web/country/list') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Manage Country</a>
                                        </div>
                                        <form action="{{ url('/web/country/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <lable for="name">Name</lable>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Country Name" required>
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
                                            <span style="font-size: 1.25rem; color: black">Update Country</span>
                                            <a href="{{ url('/web/country/list') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Manage Country</a>
                                        </div>
                                        <form action="{{ url('/web/country/update/'.$data->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <lable for="name">Name</lable>
                                                <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control" placeholder="Enter Country Name" required>
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
