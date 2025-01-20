<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Repository\TaskRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TaskControllerTest extends BaseTestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    protected TaskRepository $taskRepository;

    public function setUp(): void
    {
        parent::setUp();

        // Mock the TaskRepository
        $this->taskRepository = $this->createMock(TaskRepository::class);
    }

    public function test_create_task()
    {
        // Mock request data
        $taskData = [
            'task_title' => 'Test Task',
            'task_description' => 'Task description',
            'submission_deadline' => now()->addDays(1)->toDateString(),
            'completed' => false,
        ];

        // Send POST request to create task endpoint
        $response = $this->postJson('/api/tasks/create', $taskData);

        // Assert that the response is successful and the task is created
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson([
                'success' => true,
                'status' => 'success',
                'message' => 'Task created successfully.',
                'task created' => [
                    'task_title' => 'Test Task',
                    'task_description' => 'Task description',
                    'submission_deadline' => '2025-01-21',
                    'completed' => false,
                ]
            ]);
    }

    public function test_update_task()
    {
        // Create a sample task to update
        $task = \App\Models\Task::factory()->create();

        // Mock request data
        $updatedData = [
            'task_title' => 'Updated Task',
            'task_description' => 'Updated task description',
            'submission_deadline' => now()->addDays(2)->toString(),
            'completed' => true,
        ];

        // Send PUT request to update task endpoint
        $response = $this->postJson("/api/tasks/update/{$task->id}", $updatedData);

        // Assert that the response is successful and the task is updated
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson([
                'success' => true,
                'status' => 'success',
                'message' => 'Task updated successfully.',
                'task updated' => [
                    'task_title' => $updatedData['task_title'],
                    'task_description' => $updatedData['task_description'],
                    'submission_deadline' => $updatedData['submission_deadline'],
                    'completed' => $updatedData['completed'],
                ],
            ]);
    }

    public function test_delete_task()
    {
        // Create a sample task to delete
        $task = Task::factory()->create();

        // Send DELETE request to delete task endpoint
        $response = $this->deleteJson("/api/tasks/delete/{$task->id}");

        // Assert that the response is successful and the task is deleted
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson([
                'message' => 'Task deleted successfully.'
            ]);
    }

    public function test_list_tasks()
    {
        // Create some sample tasks to list
      $listTasks  = Task::factory()->count(3)->create();

        $listTasksArray = $listTasks->toArray();
        // Send GET request to list tasks endpoint
        $response = $this->getJson('/api/tasks/list');

        // Assert that the response is successful and contains the tasks data
        $response->assertStatus(JsonResponse::HTTP_OK)
            ->assertJson([
                'success' => true,
                'status' => 'success',
                'message' => 'Tasks fetched successfully.',
                'tasks' => $listTasksArray
            ]);
    }
}
