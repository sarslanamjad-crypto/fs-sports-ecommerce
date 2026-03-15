@extends('backend.layouts.main')
@section('title', 'Edit PaymentTransaction')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.payment-transaction.index') }}">PaymentTransaction List</a> | Edit PaymentTransaction #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.payment-transaction.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control" value="{{ $item->order_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="payment_method">Payment Method</label>
                            <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ $item->payment_method }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $item->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $item->status == '0' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="transaction_reference">Transaction Reference</label>
                            <input type="text" name="transaction_reference" id="transaction_reference" class="form-control" value="{{ $item->transaction_reference }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="transaction_date">Transaction Date</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="{{ $item->transaction_date }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.payment-transaction.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection