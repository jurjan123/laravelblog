<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(15);
        return view("admin.tasks.index",[
            "tasks" => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->description = strip_tags($request->description);
        $task->created_at = $request->created_at;
        $task->save();

        return redirect()->route("admin.tasks.index")->with("message", "Taak is gemaakt!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $tasks = Task::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.tasks.index", compact("tasks"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view("admin.tasks.edit",[
            "id" => $task->id,
            "name" => $task->name,
            "description" => $task->description,
            "created_at" => $task->created_at
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = strip_tags($request->description);
        $task->created_at = $request->created_at;
        $task->save();

        return redirect()->route("admin.tasks.index")->with("message", "Taak is bewerkt!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route("admin.tasks.index")->with("message", "De taak is verwijderd");
    }
}
