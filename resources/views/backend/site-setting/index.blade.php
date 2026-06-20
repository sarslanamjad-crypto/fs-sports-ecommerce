@extends('backend.layouts.main')
@section('title', 'Site Settings')
@section('main-container')
<div class="container-fluid"><br>
    @php
        $item = $items->first();
    @endphp

    @if(!$item)
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | Site Settings</h6>
                <a href="{{ route('admin.site-setting.create') }}" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
            </div>
            <div class="card-body text-center py-5">
                <i class="fas fa-cog fa-3x text-secondary mb-3"></i>
                <h5 class="text-secondary font-semibold mb-3">No Site Settings Configured</h5>
                <a href="{{ route('admin.site-setting.create') }}" class="btn btn-primary">Create Site Settings</a>
            </div>
        </div>
    @else
        <div class="card shadow mb-4">
            <!-- Simple Action Header Toolbar -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | Site Settings Management</h6>
                <div class="d-flex align-items-center" style="gap: 8px;">
                    <a href="{{ route('admin.site-setting.edit', $item->id) }}" class="btn btn-success btn-sm shadow-sm" style="border-radius:6px; font-weight: 600;">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form method="post" class="d-inline" action="{{ route('admin.site-setting.destroy', $item->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm shadow-sm" style="border-radius:6px; font-weight: 600;" onClick="return confirm('Are you sure you want to delete this configuration?');">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Left Sidebar (Shop Identity) -->
                    <div class="col-md-4 mb-4 mb-md-0 border-right">
                        <div class="mb-4 text-left">
                            <label class="font-weight-bold text-info small uppercase tracking-wider d-block">Shop Name</label>
                            <h3 class="font-weight-bold text-dark mt-1" style="font-size: 1.5rem;">{{ $item->shop_name }}</h3>
                        </div>
                        <div class="text-left">
                            <label class="font-weight-bold text-info small uppercase tracking-wider d-block">Logo Asset</label>
                            <p class="text-dark font-semibold">{{ $item->logo }}</p>
                        </div>
                    </div>

                    <!-- Right Details Panel -->
                    <div class="col-md-8 pl-md-4">
                        <!-- About Us Section -->
                        <div class="mb-4 text-left">
                            <label class="font-weight-bold text-info small uppercase tracking-wider d-block">About Us</label>
                            <h4 class="font-weight-bold text-dark mt-1" style="font-size: 1.15rem;">{{ $item->about_us_title }}</h4>
                            <p class="text-secondary leading-relaxed mt-2" style="font-size: 0.9rem; line-height: 1.6;">
                                {{ $item->about_us_content }}
                            </p>
                        </div>

                        <hr class="my-4">

                        <!-- Operational Metadata Section -->
                        <div class="text-left">
                            <label class="font-weight-bold text-info small uppercase tracking-wider d-block mb-3">Operational Metadata</label>
                            <div class="row">
                                <!-- Location Address -->
                                <div class="col-md-6 mb-3">
                                    <span class="text-xs text-muted font-weight-bold uppercase tracking-wider d-block" style="font-size: 0.75rem;">Location Address</span>
                                    <p class="text-dark font-semibold mt-1" style="font-size: 0.9rem;">
                                        {{ $item->store_location_data }}
                                    </p>
                                </div>

                                <!-- Rent Details -->
                                <div class="col-md-6 mb-3">
                                    <span class="text-xs text-muted font-weight-bold uppercase tracking-wider d-block" style="font-size: 0.75rem;">Financial Rent Details</span>
                                    <p class="text-dark font-semibold mt-1" style="font-size: 0.9rem;">
                                        Rent Info: <span class="text-danger font-weight-bold">{{ $item->rent_info }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection