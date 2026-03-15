@extends('backend.layouts.main')
@section('title', 'Edit OrdersTransaction')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.orders-transaction.index') }}">OrdersTransaction List</a> | Edit OrdersTransaction #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.orders-transaction.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $item->user_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_reference_id">Order Reference Id</label>
                            <input type="text" name="order_reference_id" id="order_reference_id" class="form-control" value="{{ $item->order_reference_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="total_amount">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control" value="{{ $item->total_amount }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_status">Order Status</label>
                            <input type="text" name="order_status" id="order_status" class="form-control" value="{{ $item->order_status }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.orders-transaction.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection