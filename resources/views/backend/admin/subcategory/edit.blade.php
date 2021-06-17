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
                                    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" name="editSubcategory">
                                        @csrf
                                        @method('PATCH')
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
                                            <input type="text" name="name" value="{{ $subcategory->name }}" class="form-control" placeholder="Subcategory Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Select a Status</label>
                                            <select class="form-control" name="status">
                                                <option disabled selected>Select a Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>                           
                                        <div class="form-group">
                                            <label>Set Priority</label>
                                            <input type="number" name="priority" value="{{ $subcategory->priority==10000 ? '' : $subcategory->priority }}" class="form-control" placeholder="Subcategory Priority" min="0" max="9999">
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
    <script>
        document.forms['editSubcategory'].elements['cat_id'].value="{{ $subcategory->cat_id }}";
        document.forms['editSubcategory'].elements['status'].value="{{ $subcategory->status }}";
    </script>
@endsection
