@extends('backend.layouts.main')
@section('title', 'Edit LoginSecurityLog')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.login-security-log.index') }}">LoginSecurityLog List</a> | Edit LoginSecurityLog #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.login-security-log.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $item->user_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ip_address">Ip Address</label>
                            <input type="text" name="ip_address" id="ip_address" class="form-control" value="{{ $item->ip_address }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="attempt_count">Attempt Count</label>
                            <input type="text" name="attempt_count" id="attempt_count" class="form-control" value="{{ $item->attempt_count }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_successful">Is Successful</label>
                            <input type="text" name="is_successful" id="is_successful" class="form-control" value="{{ $item->is_successful }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_agent">User Agent</label>
                            <input type="text" name="user_agent" id="user_agent" class="form-control" value="{{ $item->user_agent }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="locked_until">Locked Until</label>
                            <input type="text" name="locked_until" id="locked_until" class="form-control" value="{{ $item->locked_until }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="logged_at">Logged At</label>
                            <input type="text" name="logged_at" id="logged_at" class="form-control" value="{{ $item->logged_at }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.login-security-log.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection