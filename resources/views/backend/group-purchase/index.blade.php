@extends('backend.layouts.main')
@section('title', 'GroupPurchase Management')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | GroupPurchase List</h6>
            <a href="{{ route('admin.group-purchase.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                                    <th>Product Id</th>
                                    <th>Group Lead Id</th>
                                    <th>Current Members</th>
                                    <th>Discount Rate</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->group_lead_id }}</td>
                                    <td>{{ $item->current_members }}</td>
                                    <td>{{ $item->discount_rate }}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-success p-2">Active</span>
                                        @else
                                            <span class="badge badge-danger p-2">Disabled</span>
                                        @endif
                                    </td>

                            <td>
                                <a href="{{ route('admin.group-purchase.edit', $item->id) }}" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="{{ route('admin.group-purchase.destroy', $item->id) }}">
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