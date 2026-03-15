@extends('backend.layouts.main')
@section('title', 'Add NewsletterSubscriber')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.newsletter-subscriber.index') }}">NewsletterSubscriber List</a> | Add NewsletterSubscriber</h6>
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
            <form action="{{ route('admin.newsletter-subscriber.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_subscribed">Is Subscribed</label>
                            <input type="text" name="is_subscribed" id="is_subscribed" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="subscribed_at">Subscribed At</label>
                            <input type="text" name="subscribed_at" id="subscribed_at" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="{{ route('admin.newsletter-subscriber.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection