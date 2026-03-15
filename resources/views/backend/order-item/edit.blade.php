@extends('backend.layouts.main')
@section('title', 'Edit OrderItem')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.order-item.index') }}">OrderItem List</a> | Edit OrderItem #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.order-item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control" value="{{ $item->order_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_id">Product Id</label>
                            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $item->product_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="unit_price">Unit Price</label>
                            <input type="text" name="unit_price" id="unit_price" class="form-control" value="{{ $item->unit_price }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $item->quantity }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="subtotal">Subtotal</label>
                            <input type="text" name="subtotal" id="subtotal" class="form-control" value="{{ $item->subtotal }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.order-item.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection