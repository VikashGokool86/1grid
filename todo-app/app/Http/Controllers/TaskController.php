<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class TaskController extends Controller
{

    /**
     * Display the add task page.
     */
    public function add_task()
    {
        return Inertia::render('Task/AddTask');
    }

    /**
     * Store a newly created resource in storage.
     * @parm Request Request|object
     *
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $task = new Task();
        $task->user_id = $request->user()->id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        // return response()->json('<div class="response">Task Added Successfully!! <div class="response_close">Close [X]</div</div>');
        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'completed' => 'required|integer'

        ]);
        // Find the task by ID
        $task = Task::find($validatedData['id']);

        // Check if task exists
        if (!$task) {
            return redirect()->back()->withErrors(['error' => 'Task not found.']);
        }

        // Update the task with validated data
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->completed = $validatedData['completed'];

        // Save the changes
        $task->save();
        // Redirect back or to another page with success message
        return redirect()->route('dashboard')->with('success', 'Task updated successfully.');
    }

    /**
     * Removes a task from the tasks table.
     */
    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer'
        ]);
        Task::destroy($validatedData['id']);
        return redirect()->route('dashboard');

    }
}
