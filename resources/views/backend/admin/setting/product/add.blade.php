@extends('backend.admin.master')

@section('style')
    <link href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css" rel="stylesheet"/>
@endsection

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
                                    <a href="{{ url('web/products') }}" class="btn btn-primary float-right">Manage Product</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('web/products/store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Product Name</label>
                                            <input type="text" name="name" class="form-control" required placeholder="Product name">
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Product SKU</label>
                                            <input type="text" name="sku" class="form-control" required placeholder="Product sku">
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Product Price</label>
                                            <input type="number" name="price" class="form-control" required placeholder="Product price">
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Previous Price</label>
                                            <input type="number" name="pre_price" class="form-control" placeholder="Previous price">
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Condition</label>
                                            <input type="text" name="conditions" class="form-control" placeholder="Add Condition">
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Short Description</label>
                                            <textarea class="form-control" name="short_description" rows="5" placeholder="Short Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Long Description</label>
                                            <textarea class="form-control summernote" name="long_description" placeholder="Long Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Key Features</label>
                                            <textarea class="form-control summernote" name="key_feature" placeholder="Key Features"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Specification</label>
                                            <textarea class="form-control summernote" name="specification" placeholder="Specification"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Product Type</label>
                                            <select class="form-control" name="product_type" id="product_type">
                                                <option disabled selected>Select A Product Type</option>
                                                <option value="Feature">Feature Product</option>
                                                <option value="Top Rated">Top Rated</option>
                                                <option value="Best Seller">Best Seller</option>
                                                <option value="Attention">Attention</option>
                                                <option value="Latest">Latest</option>
                                                <option value="Upcoming">Upcoming Product</option>
                                                <option value="New Arrival">New Arrival</option>
                                                <option value="Our Product">Our Product</option>
                                                <option value="Discount">Discount Product</option>
                                                <option value="Free Shipping">Free Shipping Product</option>
                                                <option value="Offers">Offers Product</option>
                                                <option value="Super Deal">Super Deal Product</option>
                                                <option value="Software">Software</option>
                                            </select>
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
                                            <label style="margin-left: 20px;">Category Select</label>
                                            <select class="form-control" name="cat_id" id="cat_id">
                                                <option disabled selected>Select A Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Country Select</label>
                                            <select class="form-control" name="country_id" id="country_id">
                                                <option disabled selected>Select A Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Subcategory Select</label>
                                            <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                                <option disabled selected>Select A Subcategory</option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Brand Select</label>
                                            <select class="form-control" name="brand_id" id="brand_id">
                                                <option disabled selected>Select A Brand</option>
                                                @foreach($webBrands as $webBrand)
                                                    <option value="{{ $webBrand->id }}">{{ $webBrand->name }}</option>
                                                @endforeach
                                            </select>
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
                                            <input type="file" name="image" class="form-control" required>
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

{{--    <script src="https://unpkg.com/file-upload-with-preview@4.0.8/dist/file-upload-with-preview.min.js"></script>--}}
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
@endsection
