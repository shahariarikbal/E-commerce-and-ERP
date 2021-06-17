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
                                    <span style="font-size: 1.25rem; color: black">Brand List</span>
                                    <a href="{{ route('brands.create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Brand</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Brand Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($brands as $key => $brand)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $brand->name }}</td>
                                                        <td>
                                                            @if($brand->status === 'active')
                                                                <span class="badge badge-success">{{ $brand->status }}</span>
                                                            @else
                                                                <span class="badge badge-danger">{{ $brand->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td width="20%">
                                                            <a href="{{ url('/brands/'.$brand->id.'/edit') }}" class="btn btn-sm btn-success">
                                                                <i class="feather icon-edit" style="font-size: 20px;"></i>
                                                            </a>
                                                            @if($brand->status === 'active')
                                                                <a href="{{ url('/brand/active/'.$brand->id) }}" title="Inactive" class="btn btn-sm btn-info">
                                                                    <i class="feather icon-thumbs-up" style="font-size: 20px;"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ url('/brand/inactive/'.$brand->id) }}" title="Active" class="btn btn-sm btn-secondary">
                                                                    <i class="feather icon-thumbs-down" style="font-size: 20px;"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('brands.destroy', $brand->id) }}" title="Delete Category" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $brand->id }}').submit();" class="btn btn-sm btn-danger">
                                                                <i class="feather icon-trash" style="font-size: 20px;"></i>
                                                            </a>
                                                            <form id="destroy-form-{{ $brand->id }}" action="{{ route('brands.destroy', $brand->id) }}" method="post">
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
