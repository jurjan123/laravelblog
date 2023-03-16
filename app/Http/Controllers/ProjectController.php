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
    public function store(Request $request)
    {

        $validatedDate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048",
            "created_at" => "required"
        ]);

        if($request->image){
            $image_name = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $image_name);
            $image_name = time().'.'.$request->image->getClientOriginalExtension(); #Pakt de naam van de image
            
            $validatedDate["image"] = $image_name;
        }

        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
        $validatedDate["title"] = htmlspecialchars_decode($validatedDate["title"]);
        $validatedDate["description"] = htmlspecialchars_decode($validatedDate["description"]);
        $validatedDate += array("user_id" => auth()->id());
        
        Projects::create($validatedDate);
        
        $this->resetInputField();
        
        return redirect()->route("admin.projects.index")->with("message", "Project is gemaakt!");
    }

    // edit existing post
    public function edit(Projects $value)
    {

        return view("admin.projects.edit", [
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

        return redirect()->route("admin.projects.index")->with("editmessage", "Project is succesvol bewerkt");
    }

    public function delete(Request $request, Projects $value)
    {
        $value->delete();
        return redirect()->route('admin.projects.index')->with("deletemessage", "Project is verwijderd");
    }
}