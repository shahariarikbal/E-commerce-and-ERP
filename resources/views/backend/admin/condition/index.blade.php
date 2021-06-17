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
                                        <span style="font-size: 1.25rem; color: black">Condition List</span>
                                        <a href="{{ url('/products/condition/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Condition</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $key=> $info)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $info->name }}</td>
                                                        <td>
                                                            <a href="{{ url('/products/condition/delete/'.$info->id) }}" class="btn btn-sm btn-danger" title="Condition Delete">Delete</a>
                                                            <a href="{{ url('/products/condition/edit/'.$info->id) }}" class="btn btn-sm btn-info" title="Condition Edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($page == 'create' || $page == 'edit')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <span style="font-size: 1.25rem; color: black">Condition Create</span>
                                            <a href="{{ url('/products/condition') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Manage Condition</a>
                                        </div>
                                        <form action="{{ $page == 'edit' ? url('/products/condition/update/'.$data->id) : url('/products/condition/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <lable for="name">Name</lable>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', !empty($data) ? $data->name : '') }}" placeholder="Condition Name" required>
                                            </div>
                                            <button class="btn btn-primary btn-sm" type="submit">{{ $page == 'edit' ? 'Update' : 'Submit' }}</button>
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
