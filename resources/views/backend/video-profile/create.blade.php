@extends('backend.layouts.main')
@section('title', 'Add VideoProfile')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.video-profile.index') }}">VideoProfile List</a> | Add VideoProfile</h6>
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
            <form action="{{ route('admin.video-profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_id">Product Id</label>
                            <input type="text" name="product_id" id="product_id" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="video_url">Video Url</label>
                            <input type="text" name="video_url" id="video_url" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_approved">Is Approved</label>
                            <input type="text" name="is_approved" id="is_approved" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="view_count">View Count</label>
                            <input type="text" name="view_count" id="view_count" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.video-profile.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection