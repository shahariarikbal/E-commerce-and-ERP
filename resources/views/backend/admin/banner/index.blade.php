@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            @if($page == 'index')
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Banner List</span>
                                    <a href="{{ url('/web/banner/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Banner</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Banner Type</th>
                                                <th>Banner Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key => $info)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $info->type }}</td>
                                                    <td>
                                                        <img src="{{ $info->image }}" style="height: 50px; width: 100px;">
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/web/banner/edit/'.$info->id) }}" class="btn btn-sm btn-info" title="Edit Banner">Edit</a>
                                                        <a href="{{ url('/web/banner/delete/'.$info->id) }}" class="btn btn-sm btn-danger" title="Delete Banner">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @elseif($page === 'create')
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size: 1.25rem; color: black">Add New Banner</span>
                                        <a href="{{ url('/web/banner/images') }}" class="btn btn-primary float-right">Manage Banner</a>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/web/banner/store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label style="margin-left: 20px;">Banner type</label>
                                                            <select class="form-control" name="type">
                                                                <option value="slider">Slider</option>

                                                                <option value="b2">B-2</option>
                                                                <option value="b3">B-3</option>
                                                                <option value="b4">B-4</option>

                                                                <option value="b5">B-5</option>
                                                                <option value="b6">B-6</option>
                                                                <option value="b7">B-7</option>
                                                                <option value="b8">B-8</option>
                                                                <option value="b9">B-9</option>
                                                                <option value="b10">B-10</option>
                                                                <option value="b11">B-11</option>
                                                                <option value="shop by brand">Shop By Brand</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Banner Images</label><br/>
                                                            <input type="file" name="image" accept="image/*">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image Link</label><br/>
                                                            <input type="text" name="image_link" class="form-control" accept="image/*">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <button type="submit" class="btn btn-success float-right">Save</button>
                                        </form>
                                    </div>
                                </div>
                                @elseif($page == 'edit')
                                    <div class="card">
                                        <div class="card-header">
                                            <span style="font-size: 1.25rem; color: black">Update Banner</span>
                                            <a href="{{ url('/web/banner/images') }}" class="btn btn-primary float-right">Manage Banner</a>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('/web/banner/update/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label style="margin-left: 20px;">Banner type</label>
                                                                <select class="form-control" name="type">
                                                                    <option selected disabled>Select A Banner Type</option>
                                                                    <option value="slider" {{ $banner->type === 'slider' ? 'selected' : '' }}>Slider</option>
                                                                    <option value="b2" {{ $banner->type === 'b2' ? 'selected' : '' }}>B-2</option>
                                                                    <option value="b3" {{ $banner->type === 'b3' ? 'selected' : '' }}>B-3</option>

                                                                    <option value="b4" {{ $banner->type === 'b4' ? 'selected' : '' }}>B-4</option>

                                                                    <option value="b5" {{ $banner->type === 'b5' ? 'selected' : '' }}>B-5</option>
                                                                    <option value="b6" {{ $banner->type === 'b6' ? 'selected' : '' }}>B-6</option>
                                                                    <option value="b7" {{ $banner->type === 'b7' ? 'selected' : '' }}>B-7</option>
                                                                    <option value="b8" {{ $banner->type === 'b8' ? 'selected' : '' }}>B-8</option>
                                                                    <option value="b9" {{ $banner->type === 'b9' ? 'selected' : '' }}>B-9</option>
                                                                    <option value="b10" {{ $banner->type === 'b10' ? 'selected' : '' }}>B-10</option>
                                                                    <option value="b11" {{ $banner->type === 'b11' ? 'selected' : '' }}>B-11</option>

                                                                    <option value="shop by brand" {{ $banner->type === 'shop by brand' ? 'selected' : '' }}>Shop By Brand</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>Images</label>
                                                                <input type="file" name="image" accept="image/*">
                                                                <img src="{{ $banner->image }}" height="50" width="50">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Image Link</label><br/>
                                                                <input type="text" name="image_link" class="form-control" value="{{ $banner->image }}" accept="image/*">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-success float-right">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
