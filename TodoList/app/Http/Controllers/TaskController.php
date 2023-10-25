<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(15);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:4|max:255',
            'description' => 'required|min:6|max:255',
            'longDescription' => 'required|min:10|max:255',
        ]);
        Task::create([
            'title' => $data['title'], 'description' => $data['description'],
            'longDescription' => $data['longDescription'], 'status' => 'non-completed', 'created_at' => now()
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|min:4|max:255',
            'description' => 'required|min:6|max:255',
            'longDescription' => 'required|min:10|max:255',
        ]);
        $task->update([
            'title' => $data['title'], 'description' => $data['description'],
            'longDescription' => $data['longDescription'], 'updated_at' => now()
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted');
    }

    public function completeTask(Task $task)
    {
        $task->update(['status' => 'completed']);
        return redirect()->route('tasks.index')->with('success', 'Task compeleted');
    }
}
