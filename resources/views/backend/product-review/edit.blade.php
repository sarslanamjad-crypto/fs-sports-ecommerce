@extends('backend.layouts.main')
@section('title', 'Edit ProductReview')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.product-review.index') }}">ProductReview List</a> | Edit ProductReview #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.product-review.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="product_id">Product Id</label>
                            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $item->product_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $item->user_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ $item->customer_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="rating">Rating</label>
                            <input type="text" name="rating" id="rating" class="form-control" value="{{ $item->rating }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="comment">Comment</label>
                            <input type="text" name="comment" id="comment" class="form-control" value="{{ $item->comment }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_visible">Is Visible</label>
                            <input type="text" name="is_visible" id="is_visible" class="form-control" value="{{ $item->is_visible }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.product-review.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection