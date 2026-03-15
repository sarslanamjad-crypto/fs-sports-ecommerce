@extends('backend.layouts.main')
@section('title', 'Edit RolesPermission')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.roles-permission.index') }}">RolesPermission List</a> | Edit RolesPermission #{{ $item->id }}</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.roles-permission.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="role_name">Role Name</label>
                            <input type="text" name="role_name" id="role_name" class="form-control" value="{{ $item->role_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $item->slug }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $item->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="can_manage_admins">Can Manage Admins</label>
                            <input type="text" name="can_manage_admins" id="can_manage_admins" class="form-control" value="{{ $item->can_manage_admins }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="can_manage_staff">Can Manage Staff</label>
                            <input type="text" name="can_manage_staff" id="can_manage_staff" class="form-control" value="{{ $item->can_manage_staff }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.roles-permission.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection