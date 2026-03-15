@extends('backend.layouts.main')
@section('title', 'Edit Branch')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.branch.index') }}">Branch List</a> | Edit Branch #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.branch.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="branch_name">Branch Name</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control" value="{{ $item->branch_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ $item->location }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ $item->city }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $item->phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_active">Is Active</label>
                            <input type="text" name="is_active" id="is_active" class="form-control" value="{{ $item->is_active }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.branch.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection