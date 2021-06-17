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
                                        <span style="font-size: 1.25rem; color: black">Testimonial Team</span>
                                        <a href="{{ url('/web/testimonial/form') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Testimonial</a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $key=> $info)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ substr($info->note, 0,50) }}</td>
                                                        <td>{{ $info->designation }}</td>
                                                        <td>
                                                            <img src="{{ asset('/testimonial/'.$info->avatar) }}" height="50" width="50">
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/web/testimonial/delete/'.$info->id) }}" class="btn btn-sm btn-danger" title="Team Delete">Delete</a>
                                                            <a href="{{ url('/web/testimonial/edit/'.$info->id) }}" class="btn btn-sm btn-primary" title="Team Edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($page == 'create')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <span style="font-size: 1.25rem; color: black">Testimonial Team</span>
                                            <a href="{{ url('/web/testimonial/index') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Manage Testimonial</a>
                                        </div>
                                        <form action="{{ url('/web/testimonial/store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <lable for="name">Name</lable>
                                                <textarea class="form-control" name="note" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <lable for="designation">Designation</lable>
                                                <input type="text" name="designation" class="form-control" placeholder="designation">
                                            </div>
                                            <div class="form-group">
                                                <lable for="avatar">Avatar</lable>
                                                <input type="file" name="avatar" class="form-control">
                                            </div>
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            @if($page == 'edit')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <span style="font-size: 1.25rem; color: black">Testimonial</span>
                                            <a href="{{ url('/web/testimonial/index') }}" class="btn btn-success float-right" style="margin-right: 15px; margin-top: -40px;"><i class="feather icon-plus"></i> Manage Testimonial</a>
                                        </div>
                                        <form action="{{ url('/web/testimonial/update/'.$data->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <lable for="name">Name</lable>
                                                <textarea class="form-control" name="note" rows="5">{{ $data->note }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <lable for="designation">Designation</lable>
                                                <input type="text" name="designation" class="form-control" value="{{ $data->designation }}" placeholder="designation">
                                            </div>
                                            <div class="form-group">
                                                <lable for="avatar">Avatar</lable>
                                                <input type="file" name="avatar" class="form-control">
                                                <img src="{{ asset('/testimonial/'.$data->avatar) }}" height="50" width="50">
                                            </div>
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
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
