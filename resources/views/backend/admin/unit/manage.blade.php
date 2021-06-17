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
                                    <span style="font-size: 1.25rem; color: black">Unit List</span>
                                    <a href="{{ route('units.create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add Unit</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Unit Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($units as $key => $unit)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $unit->name }}</td>
                                                        <td>
                                                            @if($unit->status === 'active')
                                                                <span class="badge badge-success">{{ $unit->status }}</span>
                                                            @else
                                                                <span class="badge badge-danger">{{ $unit->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td width="20%">
                                                            <a href="{{ url('/units/'.$unit->id.'/edit') }}" class="btn btn-sm btn-success">
                                                                <i class="feather icon-edit" style="font-size: 20px;"></i>
                                                            </a>
                                                            @if($unit->status === 'active')
                                                                <a href="{{ url('/unit/active/'.$unit->id) }}" title="Inactive" class="btn btn-sm btn-info">
                                                                    <i class="feather icon-thumbs-up" style="font-size: 20px;"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ url('/unit/inactive/'.$unit->id) }}" title="Active" class="btn btn-sm btn-secondary">
                                                                    <i class="feather icon-thumbs-down" style="font-size: 20px;"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('units.destroy', $unit->id) }}" title="Delete Unit" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $unit->id }}').submit();" class="btn btn-sm btn-danger">
                                                                <i class="feather icon-trash" style="font-size: 20px;"></i>
                                                            </a>
                                                            <form id="destroy-form-{{ $unit->id }}" action="{{ route('units.destroy', $unit->id) }}" method="post">
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
