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
                                    <a href="{{ url('products/index') }}" class="btn btn-primary float-right">Manage Product</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('products/store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Product Type</label>
                                            <select class="form-control" name="product_type" id="product_type">
                                                <option disabled selected>Select A Product Type</option>
                                                <option value="Feature" @if(old('product_type') == 'Feature') selected="selected"@endif>Feature Product</option>
                                                <option value="Top Rated" @if(old('product_type') == 'Top Rated') selected="selected"@endif>Top Rated</option>
                                                <option value="Best Seller" @if(old('product_type') == 'Best Seller') selected="selected"@endif>Best Seller</option>
                                                <option value="Attention" @if(old('product_type') == 'Attention') selected="selected"@endif>Attention</option>
                                                <option value="Latest" @if(old('product_type') == 'Latest') selected="selected"@endif>Latest</option>
                                                <option value="Upcoming" @if(old('product_type') == 'Upcoming') selected="selected"@endif>Upcoming Product</option>
                                                <option value="New Arrival" @if(old('product_type') == 'New Arrival') selected="selected"@endif>New Arrival</option>
                                                <option value="Our Product" @if(old('product_type') == 'Our ProductTrait') selected="selected"@endif>Our Product</option>
                                                <option value="Discount" @if(old('product_type') == 'Discount') selected="selected"@endif>Discount Product</option>
                                                <option value="Free Shipping" @if(old('product_type') == 'Free Shipping') selected="selected"@endif>Free Shipping Product</option>
                                                <option value="Offers" @if(old('product_type') == 'Offers') selected="selected"@endif>Offers Product</option>
                                                <option value="Super Deal" @if(old('product_type') == 'Super Deal') selected="selected"@endif>Super Deal Product</option>
                                                <option value="Software" @if(old('product_type') == 'Software') selected="selected"@endif>Software</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Name <span style="color: red">*</span></label>
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Product name" required>
                                                <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Category name</label>
                                                    <select name="cat_id[]" multiple="multiple" class="form-control select2bs4" id="cat_id">
                                                        <option value="na">No Category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" @if(old('cat_id') == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Subcategory name</label>
                                                    <select name="sub_cat_id[]" class="form-control select2bs4" id="sub_cat_id" multiple="multiple">
                                                        <option value="na">No Subcategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" @if(old('sub_cat_id') == $subcategory->id) selected="selected"@endif>{{ $subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add Tag</label><br/>
                                                    @foreach($countries as $key=> $info)
                                                        <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                            <input class="form-check-input" type="checkbox" name="country_id[]" id="country{{ $key }}" value="{{ $info->name }}" @if(is_array(old('country_id')) && in_array($info->name, old('country_id'))) checked @endif style="margin-left: 3px;">
                                                            <label class="form-check-label" for="country{{ $key }}">{{ $info->name }}</label>
                                                        </div>
                                                    @endforeach
                                                    <span style="color: red"> {{ $errors->has('country_id') ? $errors->first('country_id') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Add Accessories</label><br/>
                                                    <select class="form-control select2bs4" multiple="multiple" name="accessories_id[]">
                                                        <option value="na">No Accessories</option>
                                                        @foreach($products as $key=> $info)
                                                            @if(!empty($info))
                                                            <option value="{{ $info->id }}" {{ old('accessories_id') && old('accessories_id') === $info->id ? 'selected' : '' }}>{{ $info->sku }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('accessories_id') ? $errors->first('accessories_id') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>SKU/Part Number <span style="color: red">*</span></label>
                                                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" placeholder="SKU/Part Number">
                                                    <span style="color: red"> {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <select name="unit" class="form-control">
                                                        <option disabled selected>Select a Unit</option>
                                                        <option value="na">No Unit</option>
                                                        @foreach($units as $unit)
                                                        <option value="{{ $unit->name }}" @if(old('unit') == $unit->id) selected="selected"@endif>{{ $unit->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('unit') ? $errors->first('unit') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Height</label>
                                                    <input class="form-control" name="height" placeholder="height" value="">
                                                    <span style="color: red"> {{ $errors->has('height') ? $errors->first('height') : ' ' }}</span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Depth</label>
                                                    <input class="form-control" name="depth" placeholder="depth" value="">
                                                    <span style="color: red"> {{ $errors->has('depth') ? $errors->first('depth') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Width</label>
                                                    <input class="form-control" name="width" placeholder="width" value="">
                                                    <span style="color: red"> {{ $errors->has('width') ? $errors->first('width') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Weight</label>
                                                    <input class="form-control" name="weight" placeholder="weight" value="">
                                                    <span style="color: red"> {{ $errors->has('weight') ? $errors->first('weight') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sales Price</label>
                                                    <input type="text" name="sale_price" value="{{ old('sale_price') }}" class="form-control" placeholder="Sales Price">
                                                    <span style="color: red"> {{ $errors->has('sale_price') ? $errors->first('sale_price') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="">Previous Price</label>
                                                    <input type="text" name="pre_price" class="form-control" placeholder="Previous price">
                                                </div>
{{--                                                 <div class="form-group">
                                                    <label>Product weight</label>
                                                    <input type="text" name="product_weight" value="{{ old('product_weight') }}" class="form-control" placeholder="Product Weight">
                                                    <span style="color: red"> {{ $errors->has('product_weight') ? $errors->first('product_weight') : ' ' }}</span>
                                                </div> --}}

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
                                                    <label style="margin-left: 20px;">Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Condition</label><br/>
                                                    <select class="form-control" name="condition_id">
                                                        <option selected disabled>Select A Contiton</option>
                                                        <option value="na">No Contiton</option>
                                                        @foreach($conditions as $key=> $condition)
                                                        <option value="{{ $condition->id }}" @if(old('condition_id') == $condition->id) selected="selected"@endif>{{ $condition->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('conditions') ? $errors->first('conditions') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <select name="brand_id[]" class="form-control select2bs4" multiple="multiple">
                                                        <option value="na">No Brand</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id) selected="selected"@endif>{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Manufacture Select</label>
                                                    <select class="form-control select2bs4" name="manufacture_id[]" multiple="multiple" id="manufacture_id">
                                                        <option value="na">No Manufacture</option>
                                                        @foreach($webManufactureres as $webManufacture)
                                                            <option value="{{ $webManufacture->id }}" @if(old('manufacture_id') == $webManufacture->id) selected="selected"@endif>{{ $webManufacture->name }}</option>
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
                                                    <input type="text" name="cost" id="cost" class="form-control" placeholder="Product Cost">
                                                    <span style="color: red"> {{ $errors->has('cost') ? $errors->first('cost') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Cost Of Goods Sold</label>
                                                    <input type="text" readonly name="total_cost" id="totalCost" class="form-control" placeholder="Cost Of Goods Sold">
                                                    <span style="color: red"> {{ $errors->has('total_cost') ? $errors->first('total_cost') : ' ' }}</span>
                                                </div>


                                                <div class="form-group">
                                                    <label>Product Qty</label>
                                                    <input type="text" name="qty" class="form-control" placeholder="Add Product Qty">
                                                    <span style="color: red"> {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}</span>
                                                </div>

                                                <div class="form-group" id="addNew">
                                                    <label>Key Feature</label><br/>
                                                    <button id="addKeyRow" type="button" class="btn btn-info">Add New</button>
                                                    <input type="text" name="key_feature[]" class="form-control" placeholder="Add Key Feature" style="margin-top: 10px;">
                                                    <span style="color: red"> {{ $errors->has('key_feature') ? $errors->first('key_feature') : ' ' }}</span>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label style="margin-left: 20px;">Product Quality</label><br/>
                                                <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                    <input class="form-check-input" type="checkbox" name="new" id="inlineCheckbox1" value="New" {{ old('new') == 'New' ? 'checked' : '' }} style="margin-left: 3px;">
                                                    <label class="form-check-label" for="inlineCheckbox1">New</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                    <input class="form-check-input" type="checkbox" name="hot" id="inlineCheckbox2" value="Hot" {{ old('hot') == 'Hot' ? 'checked' : '' }} style="margin-left: 3px;">
                                                    <label class="form-check-label" for="inlineCheckbox2">Hot</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                    <input class="form-check-input" type="checkbox" name="sale" id="inlineCheckbox3" value="Sale" {{ old('sale') == 'Sale' ? 'checked' : '' }} style="margin-left: 3px;">
                                                    <label class="form-check-label" for="inlineCheckbox3">Sale</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Short Description</label>
                                            <textarea class="form-control" name="short_description" rows="5" placeholder="Short Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Long Description</label>
                                            <textarea class="form-control summernote" name="long_description" placeholder="Long Description"></textarea>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label style="margin-left: 20px;">Key Features</label>--}}
{{--                                            <textarea class="form-control summernote" name="key_feature" placeholder="Key Features"></textarea>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Specification</label>
                                            <textarea class="form-control summernote" name="specification" placeholder="Specification"></textarea>
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
        $(document).ready(function (){
            $('#addKeyRow').click(function () {
                addRow();
            });
            function addRow(){
                let add = '<div class="form-group" id="hideKey">\n' +
                    '<label>Key Feature</label>\n' +
                    '<input type="text" name="key_feature[]" class="form-control" placeholder="Add Key Feature">\n'+
                    '<button type="button" class="btn btn-danger removeKeyRow">Remove</button>';
                    '</div>\n'
                $('#addNew').append(add);
            }

            $(document).on('click', '.removeKeyRow', function () {
                $(this).parent('#hideKey').remove();
            });
        })

    </script>
    <script>
        var upload = new FileUploadWithPreview('myUniqueUploadId', {
            maxFileCount: 4,
            text: {
                chooseFile: 'Maximum 4 Images Allowed',
                browse: 'Add More Images',
                selectedCount: 'Files Added',
            },
        });

    </script>
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

        $("#addSupplierRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<select name="supplier_id[]" class="form-control">' +
                '<option disabled selected>Select a Supplier</option>' +
                @foreach($suppliers as $supplier)
                '<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>' +
                @endforeach +
                '</select>';
            html += '<input type="text" name="supplier_price[]" required class="form-control m-input" placeholder="Add Supplier Price" autocomplete="off">';

            html += '<div class="input-group-append">';
            html += '<button id="removeSupplierRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newSupplierRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeSupplierRow', function () {
            $(this).closest('#inputFormRow').remove();
        });

        {{--$(document).ready(function () {--}}
        {{--    $("#cat_id").change(function () {--}}
        {{--        var category = $("#cat_id").val();--}}
        {{--        var opt = "";--}}
        {{--        $.ajax({--}}
        {{--            url:"{{ url('category/wish-subcategory') }}/" + category,--}}
        {{--            data:{cat_id:category},--}}
        {{--            success:function (data) {--}}
        {{--                opt += "<option>Select Sub Category</option>";--}}
        {{--                for (var i=0; i<data.length; i++){--}}
        {{--                    opt += "<option value='"+ data[i].id +"'>"+ data[i].name +"</option>";--}}
        {{--                }--}}
        {{--                $("#sub_cat_id").html(opt);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection
