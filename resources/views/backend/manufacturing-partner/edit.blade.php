@extends('backend.layouts.main')
@section('title', 'Edit ManufacturingPartner')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.manufacturing-partner.index') }}">ManufacturingPartner List</a> | Edit ManufacturingPartner #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.manufacturing-partner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="organization_name">Organization Name</label>
                            <input type="text" name="organization_name" id="organization_name" class="form-control" value="{{ $item->organization_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="contract_start_date">Contract Start Date</label>
                            <input type="date" name="contract_start_date" id="contract_start_date" class="form-control" value="{{ $item->contract_start_date }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="quality_score">Quality Score</label>
                            <input type="text" name="quality_score" id="quality_score" class="form-control" value="{{ $item->quality_score }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.manufacturing-partner.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection