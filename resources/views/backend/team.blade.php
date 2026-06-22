@extends('backend.layouts.main')
@section('title', 'Team Members List')
@section('main-container')
            <div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | Team Members List</h6>
                        <a href="{{url('/admin/team-add')}}" class="d-inline-block btn btn-sm btn-info shadow-sm float-right"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Add New Member</a>
                    </div>
                    <div class="card-body">
                        <x-search-bar placeholder="Search by full name..." />
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Designation</th>
                                    <th>Profile</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th width="160px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team as $team)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $team->id }}</td>
                                    <td>
                                        <a class="text-dark" href="/admin/team-member-details/{{ $team->id }}">
                                            {{ $team->fullname }}
                                        </a>
                                    </td>
                                    <td>{{ $team->designation }}</td>
                                    <td>{{ $team->shortintro }}</td>
                                     <td>
                                         <img @if(Str::startsWith($team->image, ['http://', 'https://'])) src="{{ $team->image }}" @else src="{{ asset('backend/images/team/' . $team->image) }}" @endif class="rounded-circle" width="50px" height="50px" alt="Image Not Found">
                                     </td>
                                    <td>
                                        <div x-data="{ 
                                            status: {{ $team->status }}, 
                                            loading: false,
                                            async toggle() {
                                                if (this.loading) return;
                                                this.loading = true;
                                                try {
                                                    let res = await fetch('{{ route('admin.status.toggle', ['model' => 'team', 'id' => $team->id]) }}', {
                                                        method: 'PATCH',
                                                        headers: {
                                                            'Content-Type': 'application/json',
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        }
                                                    });
                                                    let data = await res.json();
                                                    if (data.success) {
                                                        this.status = data.status;
                                                    } else {
                                                        alert(data.error || 'Failed to update status');
                                                    }
                                                } catch (e) {
                                                    console.error(e);
                                                    alert('An error occurred');
                                                } finally {
                                                    this.loading = false;
                                                }
                                            }
                                        }">
                                            <button type="button" @click="toggle" :disabled="loading" 
                                                class="btn btn-sm px-3 py-1 font-weight-bold rounded-pill text-white" 
                                                :class="status == 1 ? 'btn-success' : 'btn-secondary'" 
                                                :style="status == 1 ? 'box-shadow: 0 4px 10px rgba(40,167,69,0.3);' : 'box-shadow: none;'"
                                                style="transition: all 0.2s; min-width: 85px;">
                                                <span x-show="!loading" x-text="status == 1 ? 'Active' : 'Disabled'"></span>
                                                <span x-show="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/admin/team-edit/{{ $team->id }}" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <a href="/admin/team-delete/{{ $team->id }}" class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record')"; title="Delete Record">
                                            <i class="fas fa-trash"></i>
                                        </a> --}}
                                        <form method="post" class="d-inline" action="/admin/team-delete/{{ $team->id }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record')"; title="Delete Record"><i class="fas fa-trash"></i></button>
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
    </div>
@endsection
