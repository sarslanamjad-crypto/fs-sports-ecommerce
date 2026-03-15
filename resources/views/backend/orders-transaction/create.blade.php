@extends('backend.layouts.main')
@section('title', 'Add OrdersTransaction')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.orders-transaction.index') }}">OrdersTransaction List</a> | Add OrdersTransaction</h6>
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
            <form action="{{ route('admin.orders-transaction.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_reference_id">Order Reference Id</label>
                            <input type="text" name="order_reference_id" id="order_reference_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="total_amount">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_status">Order Status</label>
                            <input type="text" name="order_status" id="order_status" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.orders-transaction.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection