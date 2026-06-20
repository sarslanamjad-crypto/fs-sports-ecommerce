@extends('backend.layouts.main')
@section('title', 'Finance Reports — FS Sports')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4" style="border-radius:16px;border:none">
        <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background:#fff;border-radius:16px 16px 0 0;border-bottom:1px solid #e2e8f0">
            <h6 class="m-0 font-weight-bold" style="color:#334155">
                <i class="fas fa-chart-line mr-2" style="color:#6366f1"></i>
                <a style="color:#6366f1;text-decoration:none" href="{{url('/admin')}}">Dashboard</a>
                <span class="text-muted mx-1">/</span> Finance Reports
            </h6>
            <a href="{{ route('admin.finance-report.create') }}" class="btn btn-sm shadow-sm" style="background:#6366f1;color:#fff;border-radius:8px;font-weight:600">
                <i class="fas fa-plus fa-sm mr-1"></i> Add New
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" style="border-radius:10px;border:none;background:rgba(16,185,129,.1);color:#059669">
                    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="financeTable" width="100%" cellspacing="0">
                    <thead style="background:#f8fafc">
                        <tr>
                            <th>ID</th>
                            <th>Branch Id</th>
                            <th>Total Revenue</th>
                            <th>Cash Total</th>
                            <th>Debit Total</th>
                            <th>Report Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->branch_id }}</td>
                            <td><strong style="color:#10b981">Rs {{ number_format($item->total_revenue, 2) }}</strong></td>
                            <td>Rs {{ number_format($item->cash_total, 2) }}</td>
                            <td>Rs {{ number_format($item->debit_total, 2) }}</td>
                            <td>{{ $item->report_date }}</td>
                            <td>
                                <a href="{{ route('admin.finance-report.edit', $item->id) }}" class="btn btn-sm" style="background:rgba(99,102,241,.1);color:#6366f1;border-radius:6px" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="{{ route('admin.finance-report.destroy', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm" style="background:rgba(239,68,68,.1);color:#ef4444;border-radius:6px" onClick="return confirm('Are you sure you want to Delete Record?');" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
    $('#financeTable').DataTable({
        dom: '<"row align-items-center mb-3"<"col-md-6"B><"col-md-6"f>>rtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel mr-1"></i> Excel',
                className: 'btn btn-sm shadow-sm',
                title: 'FS Sports — Finance Reports',
                exportOptions: { columns: [0,1,2,3,4,5] },
                init: function(api, node){ $(node).css({background:'#10b981',color:'#fff',border:'none',borderRadius:'8px',fontWeight:'600',fontSize:'.78rem'}); }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf mr-1"></i> PDF',
                className: 'btn btn-sm shadow-sm ml-2',
                title: 'FS Sports — Finance Reports',
                exportOptions: { columns: [0,1,2,3,4,5] },
                orientation: 'landscape',
                pageSize: 'A4',
                init: function(api, node){ $(node).css({background:'#ef4444',color:'#fff',border:'none',borderRadius:'8px',fontWeight:'600',fontSize:'.78rem'}); }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print mr-1"></i> Print',
                className: 'btn btn-sm shadow-sm ml-2',
                title: 'FS Sports — Finance Reports',
                exportOptions: { columns: [0,1,2,3,4,5] },
                init: function(api, node){ $(node).css({background:'#64748b',color:'#fff',border:'none',borderRadius:'8px',fontWeight:'600',fontSize:'.78rem'}); }
            }
        ],
        order: [[0, 'desc']],
        pageLength: 15,
        language: {
            search: '_INPUT_',
            searchPlaceholder: 'Search reports...',
            lengthMenu: 'Show _MENU_ entries',
            info: 'Showing _START_ to _END_ of _TOTAL_ reports'
        }
    });
});
</script>
@endpush
@endsection