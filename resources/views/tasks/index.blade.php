@extends('layouts.app')

@section('main-content')
<main class="main-content">

    <a href="{{route('tasks.create')}}" class="btn btn-success btn-sm">create new task</a><br>
    @if(session('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mt-2">
        <div class="card-body">
            <h2 style="text-align: center">All Tasks</h2>
            <hr>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Filter by Status -->
                <div>
                    <form action="{{ route('tasks.index') }}" method="GET" class="d-inline">
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>All Statuses</option>
                            <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In Progress" {{ request('status') === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ request('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </form>
                </div>
            
                <!-- Sort by Due Date -->
                <div>
                    <form action="{{ route('tasks.index') }}" method="GET" class="d-inline">
                        <!-- Preserve the current status filter in sorting -->
                        <input type="hidden" name="status" value="{{ request('status', 'all') }}">
                        <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Due Date: Ascending</option>
                            <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Due Date: Descending</option>
                        </select>
                    </form>
                </div>
            </div>
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger delete-btn" data-task-id="{{ $task->id }}">Delete</button>
                                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center">No tasks available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $tasks->links('vendor.pagination.bootstrap-4') }}
        </div>
        
    </div>
</main>
@endsection

@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
  
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const taskId = this.getAttribute('data-task-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${taskId}`).submit();
                    }
                });
            });
        });
    });
</script>
@endsection
