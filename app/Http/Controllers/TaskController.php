<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use App\Repository\OrderRepository;
use App\Repository\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public TaskRepository $TaskRepository;

    public function __construct(TaskRepository $TaskRepository)
    {
        $this->TaskRepository = $TaskRepository;
    }

    public function createTask(CreateTaskRequest $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validated();
      $createdTask = $this->TaskRepository->createTask($validatedData);
        return ApiResponse::success('Task created successfully.', ['task created' => $createdTask]);
    }

    public function updateTask(CreateTaskRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validated();

        $findTask = Task::find($id);

        if(!$findTask)
        {
            return ApiResponse::failed('Task not found!.');
        }
        // Update the task using the repository method
       $updated_task = $this->TaskRepository->updateTask($findTask, $validatedData);

        // Return success response with the updated task
        return ApiResponse::success('Task updated successfully.', ['task updated' => $updated_task]);
    }

    public function deleteTask($id): \Illuminate\Http\JsonResponse
    {
        $findTask = Task::find($id);

        if(!$findTask)
        {
            return ApiResponse::failed('Task not found!.');
        }
        // Delete the task
        $this->TaskRepository->deleteTask($findTask);

        return ApiResponse::success('Task deleted successfully.');
    }

    public function listTasks(): \Illuminate\Http\JsonResponse
    {
        // Fetch all tasks from the repository
        $tasks = $this->TaskRepository->getAllTasks();

        if ($tasks->isEmpty()) {
            // Return a response indicating no tasks found
            return ApiResponse::success('No tasks found.');
        }

        // Return success response with tasks data
        return ApiResponse::success('Tasks fetched successfully.', ['tasks' => $tasks]);
    }
}
