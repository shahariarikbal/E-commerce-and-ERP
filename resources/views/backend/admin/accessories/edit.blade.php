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
                                    <span style="font-size: 1.25rem; color: black">Update Accessories Product</span>
                                    <a href="{{ url('accessories/index') }}" class="btn btn-primary float-right">Manage Accessories Product</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('accessories/update/'.$accessories->id) }}" method="POST" enctype="multipart/form-data" name="editAccessories">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Product Name <small style="color: red">*</small></label>
                                                    <input type="text" name="name" value="{{ $accessories->name }}" class="form-control" placeholder="Product name" required>
                                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category name</label>
                                                    <select name="cat_id" class="form-control" id="cat_id">
                                                        <option disabled selected>Select a Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $accessories->cat_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Subcategory name</label>
                                                    <select name="sub_cat_id" class="form-control" id="sub_cat_id">
                                                        <option disabled selected>Select a Subcategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $accessories->sub_cat_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('sub_cat_id') ? $errors->first('sub_cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>SKU/Part Number</label>
                                                    <input type="text" name="sku" value="{{ $accessories->sku }}" class="form-control" placeholder="SKU/Part Number">
                                                    <span style="color: red"> {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <select name="unit" class="form-control">
                                                        <option disabled selected>Select a Unit</option>
                                                        @foreach($units as $unit)
                                                            <option value="{{ $unit->name }}" {{ $unit->name === $accessories->unit ? 'selected' : '' }}>{{ $unit->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('unit') ? $errors->first('unit') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Product Measurement</label>
                                                    <input type="text" name="measurement" value="{{ $accessories->measurement }}" class="form-control" placeholder="Product Measurement, 25X25X25">
                                                    <span style="color: red"> {{ $errors->has('measurement') ? $errors->first('measurement') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sales Price</label>
                                                    <input type="text" name="price" value="{{ $accessories->price }}" class="form-control" placeholder="Sales Price">
                                                    <span style="color: red"> {{ $errors->has('price') ? $errors->first('price') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Product weight</label>
                                                    <input type="text" name="weight" value="{{ $accessories->weight }}" class="form-control" placeholder="Product Weight">
                                                    <span style="color: red"> {{ $errors->has('weight') ? $errors->first('weight') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                    <img src="{{ asset('/public/product/'.$accessories->image) }}" height="300" width="300">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>FCC ID</label>
                                                    <input type="text" name="model" value="{{ $accessories->model }}" class="form-control" placeholder="Product FCC ID">
                                                    <span style="color: red"> {{ $errors->has('model') ? $errors->first('model') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <select name="brand_id" class="form-control">
                                                        <option disabled selected>Select a Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ $brand->id == $accessories->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Manufacture Select</label>
                                                    <select class="form-control" name="manufacture_id" id="manufacture_id">
                                                        <option disabled selected>Select A Manufacture</option>
                                                        @foreach($webManufactureres as $webManufacture)
                                                            <option value="{{ $webManufacture->id }}" {{ $webManufacture->id == $accessories->manufacture_id ? 'selected' : '' }}>{{ $webManufacture->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Shipping Cost</label>
                                                    <input type="text" name="shipping_cost" id="edit_shipping_cost" value="{{ $accessories->shipping_cost }}" class="form-control" placeholder="Shipping Cost">
                                                    <span style="color: red"> {{ $errors->has('shipping_cost') ? $errors->first('shipping_cost') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>VAT</label>
                                                    <input type="text" name="vat" id="edit_vat" value="{{ $accessories->vat }}" class="form-control" placeholder="VAT">
                                                    <span style="color: red"> {{ $errors->has('vat') ? $errors->first('vat') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>TAX</label>
                                                    <input type="text" name="tax" id="edit_tax" value="{{ $accessories->tax }}" class="form-control" placeholder="TAX">
                                                    <span style="color: red"> {{ $errors->has('tax') ? $errors->first('tax') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Cost</label>
                                                    <input type="text" name="cost" id="edit_cost" class="form-control" value="{{ $accessories->cost }}" placeholder="Product Cost">
                                                    <span style="color: red"> {{ $errors->has('cost') ? $errors->first('cost') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Cost Of Goods Sold</label>
                                                    <input type="text" readonly name="total_cost" value="{{ $accessories->total_cost }}" id="edit_totalCost" class="form-control" placeholder="Cost Of Goods Sold">
                                                    <span style="color: red"> {{ $errors->has('total_cost') ? $errors->first('total_cost') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Product Quality</label><br/>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="new" id="inlineCheckbox1" value="New" {{ $accessories->new == 'New' ? 'checked' : '' }} style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox1">New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="hot" id="inlineCheckbox2" value="Hot" {{ $accessories->hot == 'Hot' ? 'checked' : '' }} style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox2">Hot</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="sale" id="inlineCheckbox3" value="Sale" {{ $accessories->sale == 'Sale' ? 'checked' : '' }} style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox3">Sale</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Product Qty</label>
                                                    <input type="text" name="qty" class="form-control" value="{{ $accessories->qty }}" placeholder="Add Product Qty">
                                                    <span style="color: red"> {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}</span>
                                                </div>
                                                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                    <label>Product Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="bulk_image[]" class="custom-file-container__custom-file__custom-file-input" accept="image/*" multiple aria-label="Choose File">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="overflow: auto!important"></div>
                                                    @if(!empty($accessories->bulkproducts))
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                @foreach($accessories->bulkproducts as $photo)
                                                                    <div class="col-md-2">
                                                                        <img src="{{ asset('/public/products/'.$photo->image) }}" style="height: 80px; width: 80px; margin-left: 47px;">
                                                                        <a href="{{ url('edit/multiple/accessories/image/delete/'.$photo->id) }}" onclick="return confirm('Are You Sure! Delete This File?');" id="imageFileDelete" class="btn btn-sm btn-danger" style="margin-left: 48px;" title="Delete">
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Short Description</label>
                                            <textarea class="form-control" name="short_description" rows="5" placeholder="Short Description">{{ $accessories->short_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Long Description</label>
                                            <textarea class="form-control summernote" name="long_description" placeholder="Long Description">{{ $accessories->long_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Key Features</label>
                                            <textarea class="form-control summernote" name="key_feature" placeholder="Key Features">{{ $accessories->key_feature }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Specification</label>
                                            <textarea class="form-control summernote" name="specification" placeholder="Specification">{{ $accessories->specification }}</textarea>
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
    <script src="{{ asset('/backend/assets/') }}/append.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            $('#edit_shipping_cost, #edit_vat, #edit_tax, #edit_cost').keyup(function(){
                var value1 = parseFloat($('#edit_shipping_cost').val()) || 0;
                var value2 = parseFloat($('#edit_vat').val()) || 0;
                var value3 = parseFloat($('#edit_tax').val()) || 0;
                var value4 = parseFloat($('#edit_cost').val()) || 0;
                $('#edit_totalCost').val(value1 + value2 + value3 + value4);
            });
        });

    </script>
    <script>
        document.forms['editAccessories'].elements['cat_id'].value="{{ $accessories->cat_id }}";
        document.forms['editAccessories'].elements['condition_id'].value="{{ $accessories->condition_id }}";
        document.forms['editAccessories'].elements['sub_cat_id'].value="{{ $accessories->sub_cat_id }}";
        document.forms['editAccessories'].elements['conditions'].value="{{ $accessories->conditions }}";
        document.forms['editAccessories'].elements['brand_id'].value="{{ $accessories->brand_id }}";
        document.forms['editAccessories'].elements['unit'].value="{{ $accessories->unit }}";
    </script>
    <script>
        $(document).ready(function () {
            $("#cat_id").change(function () {
                var category = $("#cat_id").val();
                var opt = "";
                $.ajax({
                    url:"{{ url('category/wish-subcategory') }}/" + category,
                    data:{cat_id:category},
                    success:function (data) {
                        opt += "<option>Select Sub Category</option>";
                        for (var i=0; i<data.length; i++){
                            opt += "<option value='"+ data[i].id +"'>"+ data[i].name +"</option>";
                        }
                        $("#sub_cat_id").html(opt);
                    }
                });
            });
        });
    </script>
@endsection
