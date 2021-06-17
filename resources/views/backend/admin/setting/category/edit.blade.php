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
                                    <span style="font-size: 1.25rem; color: black">Update Category</span>
                                    <a href="{{ url('web/index') }}" class="btn btn-primary float-right">Manage Category</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('web/update/category/'.$editCategory->id) }}" method="POST" enctype="multipart/form-data" name="editCategory">
                                        @csrf
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Category Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ asset('category/'.$editCategory->image) }}" height="50" width="50">
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
        document.forms['editCategory'].elements['cat_id'].value="{{ $editCategory->cat_id }}";
    </script>
@endsection
