<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\API\BaseController as BaseController;

class TaskController extends BaseController
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
        
        if (empty($request->title)) {
            return $this->sendError('Title field required.', null);
        }

        if (empty($request->due_date)) {
            return $this->sendError('Due date field required.', null);
        }
       

        // Create a new task for the authenticated user
        $task = Auth::user()->tasks()->create($request->all());

        return $this->sendResponse($task, 'Task created successfully.');
       
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('view', $task);

        return $this->sendResponse($task, 'Data found successfully.');
    }

    

    public function update(Request $request, $id)
    {
        if (empty($request->title)) {
            return $this->sendError('Title field required.', null);
        }

        if (empty($request->due_date)) {
            return $this->sendError('Due date field required.', null);
        }
        try {
          
            $task = Task::findOrFail($id);

          
            $this->authorize('update', $task);
            $data=[
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'due_date' => $request->due_date,
            ];
            
            $task->update($data);

         
            return $this->sendResponse($task, 'Task updated successfully.');
        } catch (ModelNotFoundException $e) {
            
            return $this->sendError('Task not found.', null);
        } catch (\Exception $e) {
            return $this->sendError('An error occurred while updating the task.', null);
            
        }
    }


    public function destroy($id)
    {
       
        try {
          
            $task = Task::findOrFail($id);
            $this->authorize('delete', $task);
    
            $task->delete();
            return $this->sendResponse($task, 'Task deleted successfully.');
        } catch (ModelNotFoundException $e) {
            
            return $this->sendError('Task not found.', null);
        } catch (\Exception $e) {
            return $this->sendError('An error occurred while updating the task.', null);
            
        }
    }

}

