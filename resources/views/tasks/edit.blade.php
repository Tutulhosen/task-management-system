@extends('layouts.app')

@section('main-content')
<main class="main-content">
    <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm">Back to Tasks</a>

    <div class="card mt-2">
        <div class="card-body">
            <h2 style="text-align: center">Edit Task</h2>
            <hr>

            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $task->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
                </div>

                <button type="submit" class="btn btn-success btn-sm mt-2">Update Task</button>
            </form>
        </div>
    </div>
</main>
@endsection
