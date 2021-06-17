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
                                    <span style="font-size: 1.25rem; color: black">Subcategory List</span>
                                    <a href="{{ route('subcategories.create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Subcategory</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category Name</th>
                                                <th>Subcategory Name</th>
                                                <th>Status</th>
                                                <th>Priority</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subcategories as $key => $subcategory)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            @if(isset($subcategory->category->name))
                                                            {{ $subcategory->category->name }}
                                                            @else
                                                            <span>No Category Found</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $subcategory->name }}</td>
                                                        <td>
                                                            @if($subcategory->status === 'active')
                                                                <span class="badge badge-success">{{ $subcategory->status }}</span>
                                                            @else
                                                                <span class="badge badge-danger">{{ $subcategory->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $subcategory->priority == 10000 ? 'N/A' : $subcategory->priority }}</td>
                                                        <td width="20%">
                                                            <a href="{{ url('/subcategories/'.$subcategory->id.'/edit') }}" class="btn btn-sm btn-success">
                                                                <i class="feather icon-edit" style="font-size: 20px;"></i>
                                                            </a>
                                                            @if($subcategory->status === 'active')
                                                                <a href="{{ url('/subcategory/active/'.$subcategory->id) }}" title="Inactive" class="btn btn-sm btn-info">
                                                                    <i class="feather icon-thumbs-up" style="font-size: 20px;"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ url('/subcategory/inactive/'.$subcategory->id) }}" title="Active" class="btn btn-sm btn-secondary">
                                                                    <i class="feather icon-thumbs-down" style="font-size: 20px;"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('subcategories.destroy', $subcategory->id) }}" title="Delete Subcategory" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $subcategory->id }}').submit();" class="btn btn-sm btn-danger">
                                                                <i class="feather icon-trash" style="font-size: 20px;"></i>
                                                            </a>
                                                            <form id="destroy-form-{{ $subcategory->id }}" action="{{ route('subcategories.destroy', $subcategory->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </td>
                                                    </tr>
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
