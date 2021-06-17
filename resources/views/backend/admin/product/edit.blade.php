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
                                    <span style="font-size: 1.25rem; color: black">Update Product</span>
                                    <a href="{{ url('products/index') }}" class="btn btn-primary float-right">Manage Product</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('products/update/'.$product->id) }}" method="POST" enctype="multipart/form-data" name="editProduct">
                                        @csrf
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Product Type</label>
                                            <select class="form-control" name="product_type" id="product_type">
                                                <option disabled selected>Select A Product Type</option>
                                                <option value="na">No Product Type</option>
                                                <option {{ $product->product_type === 'Feature' ? 'selected' : '' }} value="Feature">Feature Product</option>
                                                <option {{ $product->product_type === 'Top Rated' ? 'selected' : '' }} value="Top Rated">Top Rated</option>
                                                <option {{ $product->product_type === 'Best Seller' ? 'selected' : '' }} value="Best Seller">Best Seller</option>
                                                <option {{ $product->product_type === 'Attention' ? 'selected' : '' }} value="Attention">Attention</option>
                                                <option {{ $product->product_type === 'Latest' ? 'selected' : '' }} value="Latest">Latest</option>
                                                <option {{ $product->product_type === 'Upcoming' ? 'selected' : '' }} value="Upcoming">Upcoming Product</option>
                                                <option {{ $product->product_type === 'New Arrival' ? 'selected' : '' }} value="New Arrival">New Arrival</option>
                                                <option {{ $product->product_type === 'Our ProductTrait' ? 'selected' : '' }} value="Our Product">Our Product</option>
                                                <option {{ $product->product_type === 'Discount' ? 'selected' : '' }} value="Discount">Discount Product</option>
                                                <option {{ $product->product_type === 'Free Shipping' ? 'selected' : '' }} value="Free Shipping">Free Shipping Product</option>
                                                <option {{ $product->product_type === 'Offers' ? 'selected' : '' }} value="Offers">Offers Product</option>
                                                <option {{ $product->product_type === 'Super Deal' ? 'selected' : '' }} value="Super Deal">Super Deal Product</option>
                                                <option {{ $product->product_type === 'Software' ? 'selected' : '' }} value="Software">Software</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Product Name <small style="color: red">*</small></label>
                                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Product name" required>
                                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category name</label>
                                                    <select name="cat_id[]" multiple="multiple" class="form-control select2bs4" id="cat_id">
                                                        
                                                        <option value="na">No Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ count($category->productCategory) > 0 && $category->productCategory->where('category_id', $category->id)->where('product_id', $product->id )->first() !== null ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Subcategory name</label>
                                                    <select name="sub_cat_id[]" multiple="multiple" class="form-control select2bs4" id="sub_cat_id">
                                                        
                                                        <option value="na">No Subcategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{ count($subcategory->productSubcategory) > 0 && $subcategory->productSubcategory->where('subcategory_id', $subcategory->id)->where('product_id', $product->id )->first() !== null ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('sub_cat_id') ? $errors->first('sub_cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>SKU/Part Number <span style="color: red">*</span></label>
                                                    <input type="text" name="sku" value="{{ $product->sku }}" class="form-control" placeholder="SKU/Part Number">
                                                    <span style="color: red"> {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <select name="unit" class="form-control">
                                                        <option disabled selected>Select a Unit</option>
                                                        <option value="na">No Unit</option>
                                                        @foreach($units as $unit)
                                                            <option value="{{ $unit->name }}" {{ $product->unit === $unit->name ? 'selected' : '' }}>{{ $unit->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('unit') ? $errors->first('unit') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Height</label>
                                                    <input class="form-control" name="height" placeholder="height" value="{{ $product->height }}">
                                                    <span style="color: red"> {{ $errors->has('height') ? $errors->first('height') : ' ' }}</span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Depth</label>
                                                    <input class="form-control" name="depth" placeholder="depth" value="{{ $product->depth }}">
                                                    <span style="color: red"> {{ $errors->has('depth') ? $errors->first('depth') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Width</label>
                                                    <input class="form-control" name="width" placeholder="width" value="{{ $product->width }}">
                                                    <span style="color: red"> {{ $errors->has('width') ? $errors->first('width') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Weight</label>
                                                    <input class="form-control" name="weight" placeholder="weight" value="{{ $product->weight }}">
                                                    <span style="color: red"> {{ $errors->has('weight') ? $errors->first('weight') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sales Price</label>
                                                    <input type="text" name="sale_price" value="{{ $product->sale_price }}" class="form-control" placeholder="Sales Price">
                                                    <span style="color: red"> {{ $errors->has('sale_price') ? $errors->first('sale_price') : ' ' }}</span>
                                                </div>

{{--                                                 <div class="form-group">
                                                    <label>Product weight</label>
                                                    <input type="text" name="product_weight" value="{{ $product->product_weight }}" class="form-control" placeholder="Product Weight">
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
                                                    @if(!empty($product->bulkproducts))
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                @foreach($product->bulkproducts as $photo)
                                                                <div class="col-md-2">
                                                                    <img src="{{ asset('/products/'.$photo->photo) }}" style="height: 80px; width: 80px; margin-left: 47px;">
                                                                    <a href="{{ url('edit/multiple/image/delete/'.$photo->id) }}" onclick="return confirm('Are You Sure! Delete This File?');" id="imageFileDelete" class="btn btn-sm btn-danger" style="margin-left: 48px; margin-top: 8px;" title="Delete">
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                    <img src="{{ asset('/product/'.$product->image) }}" height="50" width="50">
                                                </div>
                                                @if(!empty($product->image))
                                                <a href="{{ url('edit/single/image/delete/'.$product->id) }}" style="margin-top: -20px;" onclick="return confirm('Are You Sure! Delete This File?');" id="imageFileDelete" class="btn btn-sm btn-danger" title="Delete">
                                                    Delete
                                                </a>
                                                @endif
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Condition</label>
                                                        <select class="form-control" name="condition_id">
                                                            <option selected disabled>Select A Contiton</option>
                                                            <option value="na">No Condition</option>
                                                            @foreach($conditions as $key=> $condition)
                                                            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    <span style="color: red"> {{ $errors->has('conditions') ? $errors->first('conditions') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tags</label><br/>
                                                    @foreach($product->countryProduct as $key=> $info)
                                                        <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                            <input class="form-check-input" type="checkbox" name="country_id[]" id="country{{ $key }}" value="{{ $info->name }}" checked style="margin-left: 3px;">
                                                            <label class="form-check-label" for="country{{ $key }}">{{ $info->name }}</label>
                                                        </div>
                                                    @endforeach

                                                    @foreach($countries as $key=> $country)
                                                        <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                            <input class="form-check-input" type="checkbox" name="country_id[]" id="country{{ $key }}" value="{{ $country->name }}" style="margin-left: 3px;">
                                                            <label class="form-check-label" for="country{{ $key }}">{{ $country->name }}</label>
                                                        </div>
                                                    @endforeach

                                                    <span style="color: red"> {{ $errors->has('country_id') ? $errors->first('country_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add Accessories</label><br/>
                                                    <select class="form-control select2bs4" multiple="multiple" name="accessories_id[]">
                                                        @foreach($products as $info)
                                                            <option value="{{ $info->id }}" {{ count($product->accessoriesProduct) > 0 && $product->accessoriesProduct->firstWhere('accessories_id', $info->id) !== null ? 'selected' : '' }}>{{ $info->sku }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('accessories_id') ? $errors->first('accessories_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <select name="brand_id[]" multiple="multiple" class="form-control select2bs4">
                                                        <option value="na">No Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ count($product->productBrands) > 0 && $product->productBrands->where('brand_id', $brand->id)->where('product_id', $product->id )->first() !== null ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Manufacture Select</label>
                                                    <select class="form-control select2bs4" name="manufacture_id[]" multiple="multiple" id="manufacture_id">
                                                        <option value="null">Select A Manufacture</option>
                                                        <option value="na">No Manufacture</option>
                                                        @foreach($webManufactureres as $webManufacture)
                                                            <option value="{{ $webManufacture->id }}" {{ count($webManufacture->productManufacture) > 0 && $webManufacture->productManufacture->where('manufacture_id', $webManufacture->id)->where('product_id', $product->id )->first() !== null ? 'selected' : '' }}>{{ $webManufacture->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Shipping Cost</label>
                                                    <input type="text" name="shipping_cost" id="edit_shipping_cost" value="{{ $product->shipping_cost }}" class="form-control" placeholder="Shipping Cost">
                                                    <span style="color: red"> {{ $errors->has('shipping_cost') ? $errors->first('shipping_cost') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>VAT</label>
                                                    <input type="text" name="vat" id="edit_vat" value="{{ $product->vat }}" class="form-control" placeholder="VAT">
                                                    <span style="color: red"> {{ $errors->has('vat') ? $errors->first('vat') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>TAX</label>
                                                    <input type="text" name="tax" id="edit_tax" value="{{ $product->tax }}" class="form-control" placeholder="TAX">
                                                    <span style="color: red"> {{ $errors->has('tax') ? $errors->first('tax') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Cost</label>
                                                    <input type="text" name="cost" id="edit_cost" class="form-control" value="{{ $product->cost }}" placeholder="Product Cost">
                                                    <span style="color: red"> {{ $errors->has('cost') ? $errors->first('cost') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Cost Of Goods Sold</label>
                                                    <input type="text" readonly name="total_cost" value="{{ $product->total_cost }}" id="edit_totalCost" class="form-control" placeholder="Cost Of Goods Sold">
                                                    <span style="color: red"> {{ $errors->has('total_cost') ? $errors->first('total_cost') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label style="margin-left: 20px;">Product Quality</label><br/>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="new" id="inlineCheckbox1" value="New" {{ $product->new == 'New' ? 'checked' : '' }} style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox1">New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="hot" id="inlineCheckbox2" value="Hot" {{ $product->hot == 'Hot' ? 'checked' : '' }} style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox2">Hot</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-left: 20px;">
                                                        <input class="form-check-input" type="checkbox" name="sale" id="inlineCheckbox3" value="Sale" {{ $product->sale == 'Sale' ? 'checked' : '' }} style="margin-left: 3px;">
                                                        <label class="form-check-label" for="inlineCheckbox3">Sale</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Product Qty</label>
                                                    <input type="text" name="qty" class="form-control" value="{{ $product->qty }}" placeholder="Add Product Qty">
                                                    <span style="color: red"> {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}</span>
                                                </div>

                                                <button id="addKeyRow" type="button" class="btn btn-info">Add New Feature</button>
                                                <div class="form-group" id="addNew">
                                                    @foreach($product->feature as $key => $feature)
                                                        <div class="addNewDel{{ $key }}">
                                                            <input type="text" name="key_feature[]" class="form-control removeKeyFeature" value="{{ $feature->name }}" placeholder="Add Key Feature" style="margin-top: 10px;">
                                                            <button type="button" class="btn btn-danger removeRow" onclick="removeRow('addNewDel{{ $key }}', '{{ $feature->id }}')" data-id="{{ $feature->id }}">Remove</button>
                                                        </div>
                                                    @endforeach
                                                    <span style="color: red"> {{ $errors->has('key_feature') ? $errors->first('key_feature') : ' ' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Short Description</label>
                                            <textarea class="form-control" name="short_description" rows="5" placeholder="Short Description">{{ $product->short_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Long Description</label>
                                            <textarea class="form-control summernote" name="long_description" placeholder="Long Description">{{ $product->long_description }}</textarea>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label style="margin-left: 20px;">Key Features</label>-->
                                        <!--    <textarea class="form-control summernote" name="key_feature" placeholder="Key Features">{{ $product->key_feature }}</textarea>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Specification</label>
                                            <textarea class="form-control summernote" name="specification" placeholder="Specification">{{ $product->specification }}</textarea>
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
{{--    <script src="https://unpkg.com/file-upload-with-preview@4.0.8/dist/file-upload-with-preview.min.js"></script>--}}

<script>
        $(document).ready(function (){
            $('#addKeyRow').click(function () {
                addRow();
            });
            function addRow(){
                var key = $('.dataRow').length;
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


            $(function(){
            $('#edit_shipping_cost, #edit_vat, #edit_tax, #edit_cost').keyup(function(){
                var value1 = parseFloat($('#edit_shipping_cost').val()) || 0;
                console.log(value1);
                var value2 = parseFloat($('#edit_vat').val()) || 0;
                var value3 = parseFloat($('#edit_tax').val()) || 0;
                var value4 = parseFloat($('#edit_cost').val()) || 0;
                $('#edit_totalCost').val(value1 + value2 + value3 + value4);
            });
        });

        })

        function removeRow(row, id){
            //var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    url: "/feature/field/delete/"+id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data){
                        document.getElementsByClassName(row)[0].remove();
                    }
                });
        }

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
        document.forms['editProduct'].elements['condition_id'].value="{{ $product->condition_id }}";
        document.forms['editProduct'].elements['conditions'].value="{{ $product->conditions }}";
        document.forms['editProduct'].elements['brand_id'].value="{{ $product->brand_id }}";
        document.forms['editProduct'].elements['unit'].value="{{ $product->unit }}";
        document.forms['editProduct'].elements['product_type'].value="{{ $product->product_type }}";
    </script>
    <script>
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
