@extends('backend.layouts.main')
@section('title', 'Add GroupPurchase')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.group-purchase.index') }}">GroupPurchase List</a> | Add GroupPurchase</h6>
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
            <form action="{{ route('admin.group-purchase.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="product_id">Product Id</label>
                            <input type="text" name="product_id" id="product_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="group_lead_id">Group Lead Id</label>
                            <input type="text" name="group_lead_id" id="group_lead_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="current_members">Current Members</label>
                            <input type="text" name="current_members" id="current_members" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="discount_rate">Discount Rate</label>
                            <input type="text" name="discount_rate" id="discount_rate" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.group-purchase.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection