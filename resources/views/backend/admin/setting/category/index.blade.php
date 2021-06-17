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
                                    <span style="font-size: 1.25rem; color: black">Web Category List</span>
                                    <a href="{{ url('/web/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Category</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category Name</th>
                                                <th>Category Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($webCategories as $key => $webCategory)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        @if(isset($webCategory->category->name))
                                                        {{ $webCategory->category->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('/category/'. $webCategory->image) }}" height="50" width="50">
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/web/category/edit/'.$webCategory->id) }}" class="btn btn-sm btn-success" title="Category Edit">Edit</a>
                                                        <a href="{{ url('/web/category-delete/'.$webCategory->id) }}" class="btn btn-sm btn-danger" title="Category Delete">Delete</a>
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
