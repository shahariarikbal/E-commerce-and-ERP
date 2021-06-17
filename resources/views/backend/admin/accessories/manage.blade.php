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
                                    <span style="font-size: 1.25rem; color: black">Accessories Product List</span>
                                    <a href="{{ url('accessories/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Accessories</a>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-right: 15px;"><i class="feather icon-plus"></i> Bulk Accessories</button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <!--<th>FCC ID</th>-->
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Brand</th>
                                                <th>Sale Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($accessories as $key => $product)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td style="text-transform: capitalize">
                                                        {{ $product->name ? Illuminate\Support\Str::limit($product->name, 20) : null }}
                                                    </td>
                                                    <td>
                                                        @if(isset($product->sku))
                                                        {{ \Illuminate\Support\Str::limit($product->sku, 20) }}
                                                        @endif
                                                    </td>
                                                    <!--<td>-->
                                                    <!--    @if(isset($product->model))-->
                                                    <!--    {{ \Illuminate\Support\Str::limit($product->model, 20) }}-->
                                                    <!--    @endif-->
                                                    <!--</td>-->
                                                    <td>
                                                        @if(isset($product->category->name))
                                                        {{ \Illuminate\Support\Str::limit($product->category->name, 20)  }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($product->subcategory->name))
                                                        {{ \Illuminate\Support\Str::limit($product->subcategory->name, 20) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($product->brand->name))
                                                        {{ \Illuminate\Support\Str::limit($product->brand->name, 20) }}
                                                        @endif
                                                    </td>
                                                    
                                                    <td>{{ $product->price ? number_format($product->price, 2) : null }}</td>
                                                    <td>
                                                        <a href="{{ url('/accessories/edit/'.$product->id) }}" title="Edit Product" class="btn btn-sm btn-info">
                                                            <i class="feather icon-edit"></i>
                                                        </a>
                                                        <a href="{{ url('/accessories/delete/'.$product->id) }}" title="Delete Product" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $product->id }}').submit();" class="btn btn-sm btn-danger">
                                                            <i class="feather icon-trash"></i>
                                                        </a>
                                                        <form id="destroy-form-{{ $product->id }}" action="{{ url('/accessories/delete/'.$product->id) }}" method="post">
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bulk Accessories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/bulk/accessories/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label style="margin-left: 20px;">Excel File</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
