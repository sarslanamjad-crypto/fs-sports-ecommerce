@extends('backend.layouts.main')
@section('title', 'Add SiteSetting')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.site-setting.index') }}">SiteSetting List</a> | Add SiteSetting</h6>
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
            <form action="{{ route('admin.site-setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="shop_name">Shop Name</label>
                            <input type="text" name="shop_name" id="shop_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="logo">Logo</label>
                            <input type="text" name="logo" id="logo" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="about_us_title">About Us Title</label>
                            <input type="text" name="about_us_title" id="about_us_title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="about_us_content">About Us Content</label>
                            <input type="text" name="about_us_content" id="about_us_content" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="store_location_data">Store Location Data</label>
                            <input type="text" name="store_location_data" id="store_location_data" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="rent_info">Rent Info</label>
                            <input type="text" name="rent_info" id="rent_info" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.site-setting.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection