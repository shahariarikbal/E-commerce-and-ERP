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
                                    <span style="font-size: 1.25rem; color: black">Add new Subcategory</span>
                                    <a href="{{ route('subcategories.index') }}" class="btn btn-primary float-right">Manage Category</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('subcategories.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category name</label>
                                            <select class="form-control" name="cat_id">
                                                <option disabled selected>Select a Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red"> {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Subcategory name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Subcategory Name">
                                            <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Select a Status</label>
                                            <select class="form-control" name="status">
                                                <option disabled selected>Select a Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                            <span style="color: red"> {{ $errors->has('status') ? $errors->first('status') : ' ' }}</span>
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
@endsection
