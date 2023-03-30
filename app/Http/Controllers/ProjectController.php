<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{

    public $title,$description;
  

    //show index with posts
    public function index()
    {
        $projects = Projects::latest()->paginate(15);
        
        return view("admin.projects.index", [
            "projects" => $projects
        ]);
    }

    // show create post page
    public function create()
    {
        return view("admin.projects.create");
    }

    private function resetInputField(){
        $this->title = "";
        $this->description = "";
    }

    //store the post
    public function store(ProjectRequest $request): RedirectResponse
    {
       $project = new Projects;
       $project->title = $request->title;
       $project->description = strip_tags($request->description);
       $project->intro = $request->intro;
       $project->created_at = $request->created_at;
       $project->user_id = Auth::user()->id;

       if($request->hasFile("image")){
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $image_name);
        $project->image = $image_name;
        }
        
        $project->save();
        
        $this->resetInputField();
        
        return redirect()->route("admin.projects.index")->with("message", "Project is gemaakt!");
    }

    // edit existing post
    public function edit(Request $request, Projects $value)
    {
        //dd($value->image);

        return view("admin.projects.edit", [
            "id" => $value->id,
            "title" => $value->title,
            "description" => $value->description,
            "intro" => $value->intro,
            "image" => $value->image,
            "created_at" => $value->created_at
        ]);
    }
    

    public function update(ProjectRequest $request, Projects $value)
    {
       $value->title = $request->title;
       $value->description = strip_tags($request->description);
       $value->intro = $request->intro;
       $value->created_at = $request->created_at;
       $value->user_id = Auth::user()->id;
       
       if($request->hasFile("image")){
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'.Auth::user()->id), $image_name);
        $value->image = $image_name;
        }
        
        $value->save();
        
        return redirect()->route("admin.projects.index")->with("message", "Project is succesvol bewerkt");
    }

    public function delete(Request $request, Projects $value)
    {
        $value->delete();
        return redirect()->route('admin.projects.index')->with("message", "Project is verwijderd");
    }

    public function show(string $id):View
    {
        return view("projects.show", [
            "project" => Projects::findOrFail($id)
        ]);
    }
}