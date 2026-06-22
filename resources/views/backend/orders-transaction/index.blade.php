@extends('backend.layouts.main')
@section('title', 'Orders')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | Orders List</h6>
            <a href="{{ route('admin.orders-transaction.create') }}" class="d-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($status)
                <div class="alert alert-info d-flex align-items-center justify-content-between py-2 px-3 mb-3">
                    <span><i class="fas fa-filter mr-1"></i> Showing <strong>{{ ucfirst($status) }}</strong> orders only</span>
                    <a href="{{ route('admin.orders-transaction.index') }}" class="btn btn-sm btn-outline-info">Show All Orders</a>
                </div>
            @endif
            <x-search-bar placeholder="Search by User ID..." />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Id</th>
                            <th>Order Reference Id</th>
                            <th>Total Amount</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->order_reference_id }}</td>
                            <td>Rs. {{ number_format($item->total_amount, 0) }}</td>
                            <td>{{ $item->order_status }}</td>

                            <td>
                                <a href="{{ route('admin.orders-transaction.edit', $item->id) }}" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="{{ route('admin.orders-transaction.destroy', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record?');" title="Delete Record"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection