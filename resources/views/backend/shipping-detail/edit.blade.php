@extends('backend.layouts.main')
@section('title', 'Edit ShippingDetail')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.shipping-detail.index') }}">ShippingDetail List</a> | Edit ShippingDetail #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.shipping-detail.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control" value="{{ $item->order_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="shipping_address">Shipping Address</label>
                            <input type="text" name="shipping_address" id="shipping_address" class="form-control" value="{{ $item->shipping_address }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ $item->city }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $item->phone_number }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_notes">Order Notes</label>
                            <input type="text" name="order_notes" id="order_notes" class="form-control" value="{{ $item->order_notes }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.shipping-detail.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection