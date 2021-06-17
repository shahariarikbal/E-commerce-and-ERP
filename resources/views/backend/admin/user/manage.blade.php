@extends('backend.admin.master')

@section('content')
    <style>
        #productSearch {
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
    </style>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">User List</span>
                                    <a href="{{ url('admin/user/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"><i class="feather icon-plus"></i> Add User</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(App\Model\Admin::all() as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td style="text-transform: capitalize;">{{ $user->role }}</td>
                                                    <td>                                                        
                                                        <a href="{{ url('admin/user/edit/' . $user->id )}}" title="Edit User" class="btn btn-sm btn-info">
                                                            <i class="feather icon-edit"></i>
                                                        </a>  
                                                        @if(Session::get('id') != $user->id )                           
                                                        <button title="Delete User" onclick="del_admin{{$user->id}}();" class="btn btn-sm btn-danger">
                                                            <i class="feather icon-trash"></i>
                                                        </button>
                                                        <form id="destroy-form-{{$user->id}}" action="{{ url('admin/user/delete', $user->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="delete" value="admin">
                                                        </form>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <script>
                                                function del_admin{{$user->id}}(){

                                                    // alert('heeloo');
                                                     if(confirm('are you sure to delete?')){
                                                        document.getElementById('destroy-form-{{$user->id}}').submit();
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

    <script>

    </script>
@endsection
