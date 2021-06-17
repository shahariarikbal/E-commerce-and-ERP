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
                                    <span style="font-size: 1.25rem; color: black">Web Product List</span>
                                    <a href="{{ url('/web/products/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Product</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($webProducts as $key => $webProduct)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $webProduct->name }}</td>
                                                    <td>
                                                        @if(!empty($webProduct->category->name))
                                                        {{ $webProduct->category->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('/product/'. $webProduct->image) }}" height="50" width="50">
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/web/product/edit/'.$webProduct->id) }}" class="btn btn-sm btn-primary" title="Product Edit">Edit</a>
                                                        <a href="{{ url('/web/product-delete/'.$webProduct->id) }}" class="btn btn-sm btn-danger" title="Product Delete">Delete</a>
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
