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
                                    <span style="font-size: 1.25rem; color: black">Add new Category</span>
                                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">Manage Category</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('categories.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label style="margin-left: 20px;">Category Name</label>
                                            <div class="col-lg-12">
                                                <div id="inputFormRow">
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="name[]" class="form-control m-input" placeholder="Add Category name" autocomplete="off">
                                                        <select name="status[]" class="form-control">
                                                            <option disabled selected>Select a Status</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <span style="color: red"> {{ $errors->has('status') ? $errors->first('status') : ' ' }}</span>
                                                <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                <div id="newCatRow"></div>
                                                <button id="addCatRow" type="button" class="btn btn-info">Add New</button>
                                            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $("#addCatRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="name[]" required class="form-control m-input" placeholder="Add Category name" autocomplete="off">';
            html += '<select name="status[]" class="form-control">' +
                    '<option disabled selected>Select a Status</option>' +
                    '<option value="active">Active</option>' +
                    '<option value="inactive">Inactive</option>' +
                '</select>';
            html += '<div class="input-group-append">';
            html += '<button id="removeCatRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newCatRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeCatRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
@endsection
