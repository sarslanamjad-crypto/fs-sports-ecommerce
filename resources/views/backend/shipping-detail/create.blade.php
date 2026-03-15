@extends('backend.layouts.main')
@section('title', 'Add ShippingDetail')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.shipping-detail.index') }}">ShippingDetail List</a> | Add ShippingDetail</h6>
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
            <form action="{{ route('admin.shipping-detail.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="shipping_address">Shipping Address</label>
                            <input type="text" name="shipping_address" id="shipping_address" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_notes">Order Notes</label>
                            <input type="text" name="order_notes" id="order_notes" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.shipping-detail.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection