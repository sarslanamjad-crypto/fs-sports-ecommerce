@extends('backend.layouts.main')
@section('title', 'Edit Contact')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.contact.index') }}">Contact List</a> | Edit Contact #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.contact.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" value="{{ $item->contact }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" value="{{ $item->subject }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message</label>
                            <input type="text" name="message" id="message" class="form-control" value="{{ $item->message }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ip">Ip</label>
                            <input type="text" name="ip" id="ip" class="form-control" value="{{ $item->ip }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection