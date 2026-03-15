@extends('backend.layouts.main')
@section('title', 'Add ProductsInventory')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.products-inventory.index') }}">ProductsInventory List</a> | Add ProductsInventory</h6>
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
            <form action="{{ route('admin.products-inventory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="category_id">Category Id</label>
                            <input type="text" name="category_id" id="category_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="current_stock">Current Stock</label>
                            <input type="text" name="current_stock" id="current_stock" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_activated">Is Activated</label>
                            <input type="text" name="is_activated" id="is_activated" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_in_house_brand">Is In House Brand</label>
                            <input type="text" name="is_in_house_brand" id="is_in_house_brand" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.products-inventory.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection