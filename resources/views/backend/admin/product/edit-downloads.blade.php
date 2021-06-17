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
                                    <span style="font-size: 1.25rem; color: black">Edit Download</span>
                                    <a href="{{ url('web/downloads/') }}" class="btn btn-success float-right" style="margin-right: 15px;">Edit Downloads</a>
                                </div>
                                <div class="card-body">
                                	<form action="{{ url('web/downloads/update', $d->id) }}" method="POST" enctype="multipart/form-data">
                                		@csrf
                                		
                                		<div class="form-group">
                                			<label for="">Name</label>
                                			<input type="text" name="name" class="form-control" value="{{ $d->name }}" required="">
                                			<span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                		</div>
                                		
                                		<div class="form-group">
                                			<label for="">Link</label>
                                			<input type="text" name="link" class="form-control" required="" value="{{ $d->link }}">
                                			<span style="color: red"> {{ $errors->has('link') ? $errors->first('link') : ' ' }}</span>
                                		</div>
                                		
                                		<div class="form-group">
                                			<label for="">Image</label>
                                			<input type="file" name="image" class="form-control-file" accept="image/x-png,image/gif,image/jpeg">
                                			<span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                		</div>
                                		
                                		<div class="form-group">
                                			<input type="submit" value="Submit" class="btn btn-primary" class="form-control-file">
                                		</div>

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
