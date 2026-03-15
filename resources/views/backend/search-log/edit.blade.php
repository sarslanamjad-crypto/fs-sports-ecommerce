@extends('backend.layouts.main')
@section('title', 'Edit SearchLog')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.search-log.index') }}">SearchLog List</a> | Edit SearchLog #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.search-log.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="keyword">Keyword</label>
                            <input type="text" name="keyword" id="keyword" class="form-control" value="{{ $item->keyword }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="hit_count">Hit Count</label>
                            <input type="text" name="hit_count" id="hit_count" class="form-control" value="{{ $item->hit_count }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_searched_at">Last Searched At</label>
                            <input type="text" name="last_searched_at" id="last_searched_at" class="form-control" value="{{ $item->last_searched_at }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.search-log.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection