@extends('layouts.app')

@section('main-content')
<main class="main-content">
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm">Show All Tasks</a>
    <div class="card mt-2">
        <div class="card-body">
            <h2 style="text-align: center">Create New Task</h2>
            <hr>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Task Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" >
                </div>
                <div class="form-group mt-3">
                    <label for="description">Task Description:</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="status">Task Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="due_date">Due Date:</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}" >
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Create Task</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
