@extends('backend.layouts.main')
@section('title', 'Add Category')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.category.index') }}">Category List</a> | Add Category</h6>
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
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" onsubmit="triggerLoader()">
                @csrf
                <div class="form-group mb-3">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="is_active">Is Active</label>
                    <select name="is_active" id="is_active" class="w-full rounded-lg bg-slate-900 border border-slate-800 text-white p-2.5 focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                        <option value="1" {{ old('is_active', '1') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', '1') == 0 ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection