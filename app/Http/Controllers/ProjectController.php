<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    
    public $posts, $title, $description, $post_id;
    public $updateMode = false;

    //show index with posts
    public function index()
    {
        $projects = Projects::latest()->paginate(6);

        
        return view("projects.index", [
            "projects" => $projects
        ]);
    }

    // show create post page
    public function create()
    {
        return view("projects.create");

    }

    private function resetInputField(){
        $this->title = "";
        $this->description = "";
    }

    //store the post
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
        $validatedDate["title"] = htmlspecialchars_decode($validatedDate["title"]);
        $validatedDate["description"] = htmlspecialchars_decode($validatedDate["description"]);
        $validatedDate += array("user_id" => auth()->id());
        
        Projects::create($validatedDate);
        
        $this->resetInputField();
        
        session()->flash("succes project created succesfully");
        
        return redirect("projects");
    }

    // edit existing post
    public function edit(Projects $value)
    {

        return view("projects.edit", [
            "id" => $value->id,
            "title" => $value->title,
            "description" => $value->description
        ]);
    }
    

    public function update(Request $request, Projects $value)
    {
    
        $validatedDate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            
        ]);

        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
        $validatedDate["title"] = htmlspecialchars_decode($validatedDate["title"]);
        $validatedDate["description"] = htmlspecialchars_decode($validatedDate["description"]);


        $value->update($validatedDate);

        return redirect()->route("projects.index");
    }

    public function delete(Request $request, Projects $value)
    {
        $value->delete();
        return redirect()->route('projects.index');
    }
}