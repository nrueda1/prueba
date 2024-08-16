<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCreated;
use App\Mail\TaskCompleted;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->orderBy('due_date', 'asc')
                     ->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
        ]);

        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);
        

        Mail::to(Auth::user()->email)->send(new TaskCreated($task));

        return redirect()->route('tasks.index');
    }

    public function update(Task $task)
    {
        $task->completed = true;
        $task->save();

        Mail::to(Auth::user()->email)->send(new TaskCompleted($task));

        return redirect()->route('tasks.index');
    }
    public function show($id)
    {
        // Buscar la tarea por ID
        $task = Task::findOrFail($id);

        // Pasar la tarea a la vista
        return view('tasks.show', compact('task'));
    }
}
