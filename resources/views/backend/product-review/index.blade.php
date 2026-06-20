@extends('backend.layouts.main')
@section('title', 'Product Reviews')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | Product Reviews List</h6>
            <a href="{{ route('admin.product-review.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <x-search-bar placeholder="Search by Product ID..." />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                                    <th>Product Id</th>
                                    <th>User Id</th>
                                    <th>Customer Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Is Visible</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>
                                        @if($item->is_visible)
                                            <span class="badge badge-success">Visible</span>
                                        @else
                                            <span class="badge badge-secondary">Hidden</span>
                                        @endif
                                    </td>

                            <td>
                                <form method="post" class="d-inline" action="{{ route('admin.product-review.toggle', $item->id) }}">
                                    @csrf
                                    <button class="btn btn-{{ $item->is_visible ? 'warning' : 'primary' }} btn-circle btn-sm" title="{{ $item->is_visible ? 'Hide Review' : 'Show Review' }}"><i class="fas fa-eye{{ $item->is_visible ? '-slash' : '' }}"></i></button>
                                </form>
                                <a href="{{ route('admin.product-review.edit', $item->id) }}" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="{{ route('admin.product-review.destroy', $item->id) }}">
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