<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProjectMemberRequest;
use App\Models\ProjectUser;

class ProjectController extends Controller
{

    public $userId,$RoleId;
  

    //show index with posts
    public function index()
    {
        
        $projects = Project::with("users")->latest()->paginate(15);
       
        //$projects = Project::latest()->paginate(15);
       
        return view("admin.projects.index", [
            "projects" => $projects
        ]);
    }

    // show create post page
    public function create()
    {
       
        return view("admin.projects.create",[
            
        ]);
    }

    //store the post
    public function store(ProjectRequest $request): RedirectResponse
    {
       $project = new Project;
       $project->title = $request->title;
       $project->description = strip_tags($request->description);
       $project->intro = $request->intro;
       $project->created_at = $request->created_at;
      
       if($request->hasFile("image")){
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $image_name);
        $project->image = $image_name;
        }
        
        $succesmessage = "Succes! Project: ". $request->title. " is gemaakt";
        
        $project->save();
        
        return redirect()->route("admin.projects.index")->with("message", $succesmessage);
    }

    // edit existing post
    public function edit(Request $request, Project $project)
    {
        return view("admin.projects.edit", ["project" => $project]);
    }
    

    public function update(ProjectRequest $request, Project $value)
    {
    
       $value->title = $request->title;
       $value->description = strip_tags($request->description);
       $value->intro = $request->intro;
       $value->created_at = $request->created_at;
       
       
       if($request->hasFile("image")){
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'.Auth::user()->id), $image_name);
        $value->image = $image_name;
        }
        $succesmessage = "Succes! Project: ". $value->title. " is bewerkt";
        
        $value->update();
        
        return redirect()->route("admin.projects.index")->with("message", $succesmessage);
    }

    public function delete(Request $request, Project $project)
    {
        $succesmessage = "Succes! Project: ". $project->title. " is verwijderd";
        $project->delete();
        return redirect()->route('admin.projects.index')->with("message", $succesmessage);
    }

    public function show(string $id):View
    {
        return view("projects.show", [
            "project" => Project::findOrFail($id)
        ]);
    }

    public function search(Request $request)
    {
        $projects = Project::where("title", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.projects.index", compact("projects"));
    }

    public function membersIndex(Request $request, Project $project)
    {
    
        $users = User::all();
        $roles = Role::all();
        
        return view("admin.projects.members.index", [
            "project" => $project,
            "id" => $project->id,
            "users" => User::all(),
            "roles" => Role::all(),
           
        ]);
    }

    public function storeMemberToGroup(ProjectMemberRequest $request, Project $project)
    {
       
        $project->users()->attach($request->user_id, ["role_id" => $request->role_id]);
       
        return back()->with("message", "lid is toegevoegd");
    }

    public function deleteMemberFromGroup(Project $project, User $user)
    {
        $project->users()->detach($user->id);
        return redirect()->route("admin.projects.members.index", $project)->with("message", "lid is van groep verwijderd");
    }

    public function editMemberFromGroup(Request $request, Project $project, User $user){

        $users = User::all();
        $roles = Role::all();
        return view("admin.projects.members.edit", [
            "project" => $project,
            "roles" => $roles,
            "user" => $user,
            
        ]);
    }

    public function updateMemberFromGroup(Request $request, Project $project, User $user)
    {
        
        $project->users()->updateExistingPivot($user->id, ["role_id" => $request->role_id]);
        return redirect()->route("admin.projects.members.index", $project)->with("message", "lid is bewerkt");
    }

    /*public function ProjectMemberSearch(Request $request)
    {
        $posts = Post::where("title", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.posts.index", compact("posts"));
    }*/

    public function memberProjectSearch(Request $request)
    {
        $users = Project::has("users")->get();
        $projects = Project::with("users")->get();
        
        /*$posts = Post::where('category_id', $request->id)->latest()->paginate(6);
        $categoryName = Category::find($request->id)->first()->value("name");
    
        session()->regenerate(); 
        */
        
        
        return view('admin.projects.index', compact('projects', "users" ));
    }
   
}