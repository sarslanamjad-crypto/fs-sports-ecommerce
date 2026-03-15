@extends('backend.layouts.main')
@section('title', 'Add Wishlist')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.wishlist.index') }}">Wishlist List</a> | Add Wishlist</h6>
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
            <form action="{{ route('admin.wishlist.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_id">Product Id</label>
                            <input type="text" name="product_id" id="product_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="added_at">Added At</label>
                            <input type="text" name="added_at" id="added_at" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.wishlist.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection