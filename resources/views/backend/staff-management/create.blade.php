@extends('backend.layouts.main')
@section('title', 'Add StaffManagement')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.staff-management.index') }}">StaffManagement List</a> | Add StaffManagement</h6>
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
            <form action="{{ route('admin.staff-management.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="staff_name">Staff Name</label>
                            <input type="text" name="staff_name" id="staff_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="joining_date">Joining Date</label>
                            <input type="date" name="joining_date" id="joining_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_active">Is Active</label>
                            <input type="text" name="is_active" id="is_active" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.staff-management.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection