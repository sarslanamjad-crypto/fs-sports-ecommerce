@extends('backend.layouts.main')
@section('title', 'Edit ProductsInventory')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.products-inventory.index') }}">ProductsInventory List</a> | Edit ProductsInventory #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.products-inventory.update', $item->id) }}" method="POST" enctype="multipart/form-data" onsubmit="triggerLoader()">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="category_id">Category Id</label>
                            <input type="text" name="category_id" id="category_id" class="form-control" value="{{ $item->category_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $item->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $item->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Product Image</label>
                            @if($item->image)
                                <div class="mb-2">
                                    <img @if(Str::startsWith($item->image, ['http://', 'https://'])) src="{{ $item->image }}" @else src="{{ asset('storage/' . $item->image) }}" @endif alt="{{ $item->title }}" style="max-height: 150px; border-radius: 8px;">
                                    <p class="text-muted mt-1"><small>Current image: {{ $item->image }}</small></p>
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Upload a new image to replace. Leave empty to keep current. Max 2MB.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="discount_percentage">Discount Percentage (%)</label>
                            <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="{{ $item->discount_percentage }}" min="0" max="100" placeholder="e.g. 10">
                        </div>
                        <div class="form-group mb-3">
                            <label for="current_stock">Current Stock</label>
                            <input type="text" name="current_stock" id="current_stock" class="form-control" value="{{ $item->current_stock }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_activated">Is Activated</label>
                            <select name="is_activated" id="is_activated" class="form-control">
                                <option value="1" {{ $item->is_activated == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $item->is_activated == 0 ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_in_house_brand">Is In House Brand</label>
                            <select name="is_in_house_brand" id="is_in_house_brand" class="form-control">
                                <option value="1" {{ $item->is_in_house_brand == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $item->is_in_house_brand == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.products-inventory.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection