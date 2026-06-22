@extends('backend.layouts.main')
@section('title', 'Projects')
@section('main-container')
            <div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="{{url('/admin')}}">Main Menu</a> | Projects List</h6>
                        <a href="{{url('/admin/project-add')}}" class="d-inline-block btn btn-sm btn-info shadow-sm float-right"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Add New Project</a>
                    </div>
                    <div class="card-body">
                        <x-search-bar placeholder="Search by project title..." />
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Client</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th width="160px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->price }}</td>
                                    <td>{{ $project->details }}</td>
                                    <td>{{ $project->category }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td>{{ $project->link }}</td>
                                    <td>
                                        <img src="/backend/images/projects/{{$project->image}}" class="rounded-circle border border-info" width="50px" height="50px" alt="Image Not Found">
                                    </td>
                                    <td>
                                        <div x-data="{ 
                                            status: {{ $project->status }}, 
                                            loading: false,
                                            async toggle() {
                                                if (this.loading) return;
                                                this.loading = true;
                                                try {
                                                    let res = await fetch('{{ route('admin.status.toggle', ['model' => 'project', 'id' => $project->id]) }}', {
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
                                        <a href="#">
                                            <a href="/admin/project-edit/{{ $project->id }}" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </a>
                                        <form method="post" class="d-inline" action="/admin/project-delete/{{ $project->id }}">
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
