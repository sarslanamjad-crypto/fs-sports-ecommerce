@extends('backend.layouts.main')
@section('title', 'Edit Project')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.project.index') }}">Project List</a> | Edit Project #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.project.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $item->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="form-control" rows="4">{{ $item->details }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="link">Link</label>
                            <input type="text" name="link" id="link" class="form-control" value="{{ $item->link }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control" value="{{ $item->category }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="technology">Technology</label>
                            <input type="text" name="technology" id="technology" class="form-control" value="{{ $item->technology }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            <small class="text-muted">Leave blank to keep current image</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="client">Client</label>
                            <input type="text" name="client" id="client" class="form-control" value="{{ $item->client }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $item->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $item->status == '0' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.project.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection