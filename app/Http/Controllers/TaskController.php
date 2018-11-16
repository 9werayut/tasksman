<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request) 
    {
        $validatedDate = $request->validate(['title' => 'required']);

        $title = Task::create([
            'title' => $validatedDate['title'],
            'project_id' => $request->project_id,
        ]);

        return $title->toJson();
    }

    public function markAsCompleted(Task $task)
    {
        $task->is_completed = true;
        $task->update();

        return response()->json('Task updated!');
    }
}
