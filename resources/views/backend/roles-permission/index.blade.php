@extends('backend.layouts.main')
@section('title', 'RolesPermission Management')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | RolesPermission List</h6>
            <a href="{{ route('admin.roles-permission.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                                    <th>Role Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Can Manage Admins</th>
                                    <th>Can Manage Staff</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                                    <td>{{ $item->role_name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->can_manage_admins }}</td>
                                    <td>{{ $item->can_manage_staff }}</td>

                            <td>
                                <a href="{{ route('admin.roles-permission.edit', $item->id) }}" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="{{ route('admin.roles-permission.destroy', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record?');" title="Delete Record"><i class="fas fa-trash"></i></button>
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
@endsection