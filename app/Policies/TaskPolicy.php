<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function view(User $user, Task $task)
    {
        // User can view tasks they own
        return $user->id === $task->user_id;
    }

    public function update(User $user, Task $task)
    {
        // User can update tasks they own
        return $user->id === $task->user_id;
    }

    public function delete(User $user, Task $task)
    {
        // User can delete tasks they own
        return $user->id === $task->user_id;
    }
}



