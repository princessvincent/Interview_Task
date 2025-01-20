<?php

namespace App\Repository;

use App\Models\Task;

class TaskRepository
{

    public function createTask($data)
    {
        // Create a new task in the database using the provided data
        return Task::create([
              'task_title' => $data['task_title'],
              'task_description' => $data['task_description'],
              'submission_deadline' => $data['submission_deadline'],
              'completed' => $data['completed'] ?? false,  // Default to false if not provided
          ]);
    }

    public function updateTask(Task $task, $data): Task
    {
        // Update the task
        $task->update([
            'task_title' => $data['task_title'],
            'task_description' => $data['task_description'],
            'submission_deadline' => $data['submission_deadline'],
            'completed' => $data['completed'] ?? false, // Default to false if not provided
        ]);

        return $task;

    }

    public function deleteTask(Task $task): void
    {
        // Delete the task from the database
        $task->delete();
    }
    public function getAllTasks()
    {
        // Retrieve all tasks from the database, ordered by creation date
        return Task::orderBy('created_at', 'desc')->get();
    }
}
