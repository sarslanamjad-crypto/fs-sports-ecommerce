@extends('backend.layouts.main')
@section('title', 'Add AdminAuditLog')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.admin-audit-log.index') }}">AdminAuditLog List</a> | Add AdminAuditLog</h6>
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
            <form action="{{ route('admin.admin-audit-log.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="admin_id">Admin Id</label>
                            <input type="text" name="admin_id" id="admin_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="action_type">Action Type</label>
                            <input type="text" name="action_type" id="action_type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="target_table">Target Table</label>
                            <input type="text" name="target_table" id="target_table" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="target_id">Target Id</label>
                            <input type="text" name="target_id" id="target_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="old_values">Old Values</label>
                            <input type="text" name="old_values" id="old_values" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="new_values">New Values</label>
                            <input type="text" name="new_values" id="new_values" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ip_address">Ip Address</label>
                            <input type="text" name="ip_address" id="ip_address" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.admin-audit-log.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection