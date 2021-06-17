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
                                    <span style="font-size: 1.25rem; color: black">Add new Product</span>
                                    <a href="{{ url('accessories/index') }}" class="btn btn-primary float-right">Manage Accessories</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('accessories/store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Product Name <small style="color: red">*</small></label>
                                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Product name" required>
                                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category name</label>
                                                    <select name="cat_id" class="form-control" id="cat_id">
                                                        <option disabled selected>Select a Category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Subcategory name</label>
                                                    <select name="sub_cat_id" class="form-control" id="sub_cat_id">
                                                        <option disabled selected>Select a Subcategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('sub_cat_id') ? $errors->first('sub_cat_id') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>SKU/Part Number</label>
                                                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" placeholder="SKU/Part Number">
                                                    <span style="color: red"> {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <select name="unit" class="form-control">
                                                        <option disabled selected>Select a Unit</option>
                                                        @foreach($units as $unit)
                                                        <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('unit') ? $errors->first('unit') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Measurement</label>
                                                    <input type="text" name="measurement" value="{{ old('measurement') }}" class="form-control" placeholder="Product Measurement, 25X25X25">
                                                    <span style="color: red"> {{ $errors->has('measurement') ? $errors->first('measurement') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sales Price</label>
                                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Sales Price">
                                                    <span style="color: red"> {{ $errors->has('price') ? $errors->first('price') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Previous Price</label>
                                                    <input type="text" name="pre_price" value="{{ old('pre_price') }}" class="form-control" placeholder="Previous price">
                                                </div>
                                                <div class="form-group">
                                                    <label>Product weight</label>
                                                    <input type="text" name="weight" value="{{ old('weight') }}" class="form-control" placeholder="Product Weight">
                                                    <span style="color: red"> {{ $errors->has('weight') ? $errors->first('weight') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Image</label>
                                                    <input type="file" name="image" class="form-control" required>
                                                </div>
                                                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                    <label>Product Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="bulk_image[]" class="custom-file-container__custom-file__custom-file-input" accept="image/*" multiple aria-label="Choose File">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="overflow: auto!important"></div>
                                                    <span style="color: red"> {{ $errors->has('bulk_image') ? $errors->first('bulk_image') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Product Quality</label><br/>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="new" id="inlineCheckbox1" value="New" style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox1">New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="hot" id="inlineCheckbox2" value="Hot" style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox2">Hot</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="sale" id="inlineCheckbox3" value="Sale" style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox3">Sale</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Condition</label><br/>
                                                    <select class="form-control" name="condition_id">
                                                        <option selected disabled>Select A Contiton</option>
                                                        @foreach($conditions as $key=> $condition)
                                                            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('conditions') ? $errors->first('conditions') : ' ' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>FCC ID</label>
                                                    <input type="text" name="model" value="{{ old('model') }}" class="form-control" placeholder="Product FCC ID">
                                                    <span style="color: red"> {{ $errors->has('model') ? $errors->first('model') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <select name="brand_id" class="form-control">
                                                        <option disabled selected>Select a Brand</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Manufacture Select</label>
                                                    <select class="form-control" name="manufacture_id" id="manufacture_id">
                                                        <option disabled selected>Select A Manufacture</option>
                                                        @foreach($webManufactureres as $webManufacture)
                                                            <option value="{{ $webManufacture->id }}">{{ $webManufacture->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Shipping Cost</label>
                                                    <input type="text" name="shipping_cost" id="shipping_cost" value="{{ old('shipping_cost') }}" class="form-control" placeholder="Shipping Cost">
                                                    <span style="color: red"> {{ $errors->has('shipping_cost') ? $errors->first('shipping_cost') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>VAT</label>
                                                    <input type="text" name="vat" id="vat" value="{{ old('vat') }}" class="form-control" placeholder="VAT">
                                                    <span style="color: red"> {{ $errors->has('vat') ? $errors->first('vat') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>TAX</label>
                                                    <input type="text" name="tax" id="tax" value="{{ old('tax') }}" class="form-control" placeholder="TAX">
                                                    <span style="color: red"> {{ $errors->has('tax') ? $errors->first('tax') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Cost</label>
                                                    <input type="text" name="cost" id="cost" value="{{ old('cost') }}" class="form-control" placeholder="Product Cost">
                                                    <span style="color: red"> {{ $errors->has('cost') ? $errors->first('cost') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Cost Of Goods Sold</label>
                                                    <input type="text" readonly name="total_cost" value="{{ old('total_cost') }}" id="totalCost" class="form-control" placeholder="Cost Of Goods Sold">
                                                    <span style="color: red"> {{ $errors->has('total_cost') ? $errors->first('total_cost') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Qty</label>
                                                    <input type="text" name="qty" value="{{ old('qty') }}" class="form-control" placeholder="Add Product Qty">
                                                    <span style="color: red"> {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Short Description</label>
                                            <textarea class="form-control" name="short_description" rows="5" placeholder="Short Description">{{ old('short_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Long Description</label>
                                            <textarea class="form-control summernote" name="long_description" placeholder="Long Description">{{ old('long_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Key Features</label>
                                            <textarea class="form-control summernote" name="key_feature" placeholder="Key Features">{{ old('key_feature') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Specification</label>
                                            <textarea class="form-control summernote" name="specification" placeholder="Specification">{{ old('specification') }}</textarea>
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

    <script>
        $(function(){
            $('#shipping_cost, #vat, #tax, #cost').keyup(function(){
                var value1 = parseFloat($('#shipping_cost').val()) || 0;
                var value2 = parseFloat($('#vat').val()) || 0;
                var value3 = parseFloat($('#tax').val()) || 0;
                var value4 = parseFloat($('#cost').val()) || 0;
                $('#totalCost').val(value1 + value2 + value3 + value4);
            });
        });

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
