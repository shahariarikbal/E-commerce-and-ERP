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
                                    <span style="font-size: 1.25rem; color: black">Product List</span>

{{-- @php
    dd(request()->get('brand'));
@endphp --}}
                                    <form action="{{ Request::url() }}">
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="brand" id="" class="form-control select2bs4">
                                                    <option disabled="" selected>Select Brand</option>
                                                    @foreach (App\Model\WebBrand::all() as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == request()->get('brand') ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="category" id="" class="form-control select2bs4">
                                                    <option disabled="" selected>Select Manufacturer</option>
                                                    @foreach (App\Model\WebManufacture::all() as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == request()->get('category') ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="manu" id="" class=" select2bs4">
                                                    <option disabled="" selected>Select Category</option>
                                                    @foreach (App\Model\Category::all() as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == request()->get('manu') ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1 mt-1">
                                            <input type="submit" value="Go" class="btn btn-primary btn-sm d-block">
                                        </div>
                                    </div>
                                    </form>


                                    <a href="{{ url('products/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Product</a>
                                    <a href="{{ url('product/export') }}" class="btn btn-warning float-right" style="margin-right: 15px;"><i class="feather icon-file-text"></i> Export</a>
                                    <form method="GET" action="{{ url('products/index') }}" class="form-inline mb-3">
                                        {{-- @csrf --}}
                                        <input type="text" name="key" id="productSearch" placeholder="Search.." title="Type your search content">
                                        <button type="submit" class="btn btn-info mb-2" style="margin-left: 20px;"><i class="fa fa-search"></i> Search</button>
                                        <a href="{{ url('/products/index') }}" class="btn btn-danger mb-2" style="margin-left: 20px;"><i class="fa fa-search"></i> Clear</a>
                                    </form>

                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered nowrap">
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
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $key => $product)
                                            @php
                                                // dd($product->productCategory->first()->category->name);
                                            @endphp
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td style="text-transform: capitalize">
                                                        {{ $product->name ? Illuminate\Support\Str::limit($product->name, 20) : null }}
                                                    </td>
                                                    <td style="text-transform: capitalize">
                                                        {{ $product->sku ? $product->sku : '' }}
                                                    </td>
                                                    <!--<td>-->
                                                    <!--    @if(isset($product->product_model))-->
                                                    <!--    {{ \Illuminate\Support\Str::limit($product->product_model, 20) }}-->
                                                    <!--    @endif-->
                                                    <!--</td>-->
                                                    <td>
                                                        @if( $product->productCategory->count() > 0 && isset($product->productCategory->first()->category ) )
                                                        {{ \Illuminate\Support\Str::limit($product->productCategory->first()->category->name, 20)  }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if( $product->productSubcategory->count() > 0 && isset($product->productSubcategory->first()->subcategory) )
                                                        {{ \Illuminate\Support\Str::limit($product->productSubcategory->first()->subcategory->name, 20) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if( $product->productBrands->count() > 0 && isset($product->productBrands->first()->brand) )
                                                        {{ \Illuminate\Support\Str::limit($product->productBrands->first()->brand->name, 20) }}
                                                        @endif
                                                    </td>

                                                    <td>{{ $product->sale_price ? number_format($product->sale_price, 2) : null }}</td>
                                                    <td>{!! $product->status == 1 ? "<span class='badge badge-success'>active</span>" : "<span class='badge badge-danger'>Inactive</span>" !!}</td>
                                                    <td>
                                                        <a href="{{ url('/products/edit/'.$product->id) }}" title="Edit Product" class="btn btn-sm btn-info">
                                                            <i class="feather icon-edit"></i>
                                                        </a>          
                                                        @if($product->status === 1)
                                                            <a href="{{ url('/product/active/'.$product->id) }}" title="Inactive" class="btn btn-sm btn-success">
                                                                <i class="feather icon-thumbs-up"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/product/inactive/'.$product->id) }}" title="Active" class="btn btn-sm btn-secondary">
                                                                <i class="feather icon-thumbs-down"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ url('/products/delete/'.$product->id) }}" title="Delete Product" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $product->id }}').submit();" class="btn btn-sm btn-danger">
                                                            <i class="feather icon-trash"></i>
                                                        </a>
                                                        <form id="destroy-form-{{ $product->id }}" action="{{ url('/products/delete/'.$product->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchByProduct() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("productSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                tdArray = tr[i].getElementsByTagName("td");
                if (tdArray) {
                    for (j = 0; j < tdArray.length; j++) {
                        td = tdArray[j];
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }

    </script>
@endsection
