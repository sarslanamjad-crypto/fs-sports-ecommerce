@extends('backend.layouts.main')
@section('title', 'Add PaymentTransaction')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.payment-transaction.index') }}">PaymentTransaction List</a> | Add PaymentTransaction</h6>
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
            <form action="{{ route('admin.payment-transaction.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="payment_method">Payment Method</label>
                            <input type="text" name="payment_method" id="payment_method" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="transaction_reference">Transaction Reference</label>
                            <input type="text" name="transaction_reference" id="transaction_reference" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="transaction_date">Transaction Date</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.payment-transaction.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection