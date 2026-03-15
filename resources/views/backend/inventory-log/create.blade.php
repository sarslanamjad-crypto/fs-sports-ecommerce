@extends('backend.layouts.main')
@section('title', 'Add InventoryLog')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.inventory-log.index') }}">InventoryLog List</a> | Add InventoryLog</h6>
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
            <form action="{{ route('admin.inventory-log.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="stock_id">Stock Id</label>
                            <input type="text" name="stock_id" id="stock_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="previous_qty">Previous Qty</label>
                            <input type="text" name="previous_qty" id="previous_qty" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="new_qty">New Qty</label>
                            <input type="text" name="new_qty" id="new_qty" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="change_reason">Change Reason</label>
                            <input type="text" name="change_reason" id="change_reason" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.inventory-log.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection