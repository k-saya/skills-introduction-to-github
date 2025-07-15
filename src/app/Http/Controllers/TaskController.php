<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $task = Task::create([
            'title' => $request->input('title'),
            'completed' => false
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Task created successfully!',
            'task' => $task
        ]);
    }
}