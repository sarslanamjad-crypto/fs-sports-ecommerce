@extends('backend.layouts.main')
@section('title', 'Edit Team')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.team.index') }}">Team List</a> | Edit Team #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.team.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="fullname">Fullname</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $item->fullname }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" value="{{ $item->designation }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="shortintro">Shortintro</label>
                            <textarea name="shortintro" id="shortintro" class="form-control" rows="4">{{ $item->shortintro }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="longintro">Longintro</label>
                            <textarea name="longintro" id="longintro" class="form-control" rows="4">{{ $item->longintro }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ $item->linkedin }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="insta">Insta</label>
                            <input type="text" name="insta" id="insta" class="form-control" value="{{ $item->insta }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $item->twitter }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $item->facebook }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            <small class="text-muted">Leave blank to keep current image</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $item->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $item->status == '0' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection