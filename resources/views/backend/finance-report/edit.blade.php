@extends('backend.layouts.main')
@section('title', 'Edit FinanceReport')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{ route('admin.finance-report.index') }}">FinanceReport List</a> | Edit FinanceReport #{{ $item->id }}</h6>
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
            <form action="{{ route('admin.finance-report.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                            <label for="branch_id">Branch Id</label>
                            <input type="text" name="branch_id" id="branch_id" class="form-control" value="{{ $item->branch_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="total_revenue">Total Revenue</label>
                            <input type="text" name="total_revenue" id="total_revenue" class="form-control" value="{{ $item->total_revenue }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cash_total">Cash Total</label>
                            <input type="text" name="cash_total" id="cash_total" class="form-control" value="{{ $item->cash_total }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="debit_total">Debit Total</label>
                            <input type="text" name="debit_total" id="debit_total" class="form-control" value="{{ $item->debit_total }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="report_date">Report Date</label>
                            <input type="date" name="report_date" id="report_date" class="form-control" value="{{ $item->report_date }}">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('admin.finance-report.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection