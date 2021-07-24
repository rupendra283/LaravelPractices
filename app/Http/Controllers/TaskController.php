<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $tasks = Task::where('user_id', $user->id)->get();
        } else {
            $tasks = Task::get();
        }

        return view('todo.index', compact('tasks'));
    }
    public function create()
    {

        return view('todo.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'todo' => 'required',
            'description' => 'nullable',
        ]);
        $user = Auth::user();
        $tasks = new Task();
        $tasks->todo = $request->todo;
        $tasks->description = $request->description;
        $tasks->user_id = $user->id;
        $tasks->save();
        return redirect()->route('todo.index')->with('message', 'Todo Created Succesfully');
    }


    public function edit($id)
    {
        $task = Task::find($id);
        return view('todo.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'todo' => 'required',
            'description' => 'nullable',
        ]);
        $task->todo = $request->todo;
        $task->description = $request->description;
        $task->save();
        return redirect()->route('todo.index')->with('message', 'Todo Updated succesfully');
    }
    public function delete($id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect()->route('todo.index')->with('message', 'Todo Deleted Succesfully');
    }


    public function status($id)

    {
        // dd($id);
        $task = Task::find($id);
        $task->iscompleted = !$task->iscompleted;
        $task->save();

        return back()->with('message', 'Todo Completed Succesfully');
    }
}
