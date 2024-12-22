<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Fetch all tasks for the authenticated user
    public function index(Request $request)
    {
        $query = Auth::user()->tasks();

        // Optional: Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Optional: Sort by due_date
        $sort = $request->get('sort', 'asc');
        $query->orderBy('due_date', $sort);

        // Paginate the results
        return response()->json($query->paginate(10));
    }

    // Store a new task
    public function store(Request $request)
    {
        
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ]);
        dd($validated);

        // Create a new task for the authenticated user
        $task = Auth::user()->tasks()->create($validated);

        return response()->json(['message' => 'Task created successfully.', 'task' => $task], 201);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('view', $task);

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('update', $task);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ]);

        $task->update($validated);

        return response()->json(['message' => 'Task updated successfully.', 'task' => $task]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('delete', $task);

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.']);
    }

}

