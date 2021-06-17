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
                                    <span style="font-size: 1.25rem; color: black">Update Brand</span>
                                    <a href="{{ route('brands.index') }}" class="btn btn-primary float-right">Manage Brand</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('brands.update', $brand->id) }}" method="POST" name="editBrand">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label>Brand name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $brand->name }}" placeholder="Category name">
                                        </div>
                                        <label>Select a Status</label>
                                        <select name="status" class="form-control">
                                            <option disabled selected>Select a Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <button type="submit" class="btn btn-success float-right" style="margin-top: 20px;">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editBrand'].elements['status'].value="{{ $brand->status }}";
    </script>
@endsection
