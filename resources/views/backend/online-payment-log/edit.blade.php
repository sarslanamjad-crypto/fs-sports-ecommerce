@extends('backend.layouts.main')
@section('title', 'Edit OnlinePaymentLog')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.online-payment-log.index') }}">OnlinePaymentLog List</a> | Edit OnlinePaymentLog #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.online-payment-log.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control" value="{{ $item->order_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gateway_name">Gateway Name</label>
                            <input type="text" name="gateway_name" id="gateway_name" class="form-control" value="{{ $item->gateway_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="response_code">Response Code</label>
                            <input type="text" name="response_code" id="response_code" class="form-control" value="{{ $item->response_code }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="payment_status">Payment Status</label>
                            <input type="text" name="payment_status" id="payment_status" class="form-control" value="{{ $item->payment_status }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.online-payment-log.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection