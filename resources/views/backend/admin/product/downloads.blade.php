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
                                    <span style="font-size: 1.25rem; color: black">Download List</span>
                                    <a href="{{ url('web/downloads/add') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Download</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Link</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(App\Model\Download::all() as $key => $download)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $download->name }}</td>
                                                        <td>{{ Str::limit($download->link, 20) }}</td>
                                                        <td>
                                                        	@if (isset($download->image))
                                                        		<img src="{{ asset('/fontend/downloads/' . $download->image ) }}" alt="" width="50">
                                                        	@endif
                                                        </td>
                                                        <td width="20%">
                                                            <a href="{{ url('web/downloads/edit/'. $download->id ) }}" class="btn btn-sm btn-success">
                                                                <i class="feather icon-edit" style="font-size: 20px;"></i>
                                                            </a>
                                                            <a href="#delete" title="Delete" onclick="del_{{ $download->id }}()" class="btn btn-sm btn-danger">
                                                                <i class="feather icon-trash" style="font-size: 20px;"></i>
                                                            </a>
                                                            <form id="destroy-form-{{ $download->id }}" action="{{ url('web/downloads/delete/' . $download->id ) }}" method="post">
                                                                @csrf
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <script>
                                                        function del_{{ $download->id }}(){

                                                            if (confirm('Are you sure?')) {

                                                                event.preventDefault();document.getElementById('destroy-form-{{ $download->id }}').submit();
                                                            }
                                                        }
                                                    </script>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
