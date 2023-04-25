<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
   
    public function index()
    {
        $tasks = Task::latest()->paginate(15);
        foreach($tasks as $task){
            if($task->active == 0){
                $task->active = "Gesloten";
            } else{
                $task->active = "Open";
            }
        }
        return view("admin.tasks.index",[
            "tasks" => $tasks
        ]);
    }

    
    public function create()
    {
        return view("admin.tasks.create");
    }

    
    public function store(TaskRequest $request)
    {
        
        $task = new Task;
        $task->name = $request->name;
        $task->description = strip_tags($request->description);
        $task->created_at = $request->created_at;
        $task->active = $request->is_open;
        $task->save();
        
        $succesmessage = "Succes! Taak: ". $request->name. " is gemaakt";

        return redirect()->route("admin.tasks.index")->with("message", $succesmessage);
    }

    public function search(Request $request)
    {
        $tasks = Task::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        foreach($tasks as $task){
            if($task->active == 0){
                $task->active = "Gesloten";
            } else{
                $task->active = "Open";
            }
        }
        return view("admin.tasks.index", compact("tasks"));
    }

    public function edit(Task $task)
    {
       
        $task->active == 0 ? $task->active = "Gesloten" : $task->active = "Open";
        
        return view("admin.tasks.edit",[
            "id" => $task->id,
            "name" => $task->name,
            "description" => $task->description,
            "created_at" => $task->created_at,
            "active" => $task->active
        ]);
    }

   
    public function update(TaskRequest $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = strip_tags($request->description);
        $task->created_at = $request->created_at;
        $task->active = $request->is_open;
        $task->update();
        $succesmessage = "Succes! Taak: ". $request->name. " is bewerkt";

        return redirect()->route("admin.tasks.index")->with("message", $succesmessage);
    }

    
    public function delete(Task $task)
    {
        $succesmessage = "Succes! Taak: ". $task->name. " is verwijderd";
        $task->delete();
        return redirect()->route("admin.tasks.index")->with("message", $succesmessage);
    }
}
