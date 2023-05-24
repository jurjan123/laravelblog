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
    
        return view("admin.projects.index", [
            "projects" => $projects,
            "users" => User::all()
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
    

    public function update(ProjectRequest $request, Project $project)
    {
  
       $project->title = $request->title;
       $project->description = strip_tags($request->description);
       $project->intro = $request->intro;
       $project->created_at = $request->created_at;
       
       
       if($request->hasFile("image")){
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $image_name);
        $project->image = $image_name;
        }
        $succesmessage = "Succes! Project: ". $project->title. " is bewerkt";
        
        $project->update();
        
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
        $project = Project::findOrFail($id);
        
        $this->authorize("view", $project);
        return view("projects.show", [
            "project" => $project
        ]);
    }

    public function search(Request $request)
    {
        
        $projects = Project::where("title", "LIKE", "%".$request->search_data."%")->paginate(5);
        $users = User::all();
        return view("admin.projects.index", compact("projects", "users"));
    }

    public function membersIndex(Request $request, Project $project)
    {
        $project = Project::with("users")->find($project->id);
        
        $roles = Role::all();
       
        return view("admin.projects.members.index", [
            "project" => $project,
            "projectUsers" => $project->users,
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
        $message = "Succes! Lid: ".$user->name. " is van groep verwijderd";
        $project->users()->detach($user->id);
        return redirect()->route("admin.projects.members.index", $project)->with("message", $message);
    }

    public function editMemberFromGroup(Request $request, Project $project, User $user){
        $users = User::all();
        $roles = Role::all();
        $project = Project::with("users")->find($project->id);

        return view("admin.projects.members.edit", [
            "project" => $project,
            "roles" => $roles,
            "user" => $user,
            //"projectUsers" => $projectUsers
            
            
        ]);
    }

    public function updateMemberFromGroup(Request $request, Project $project, User $user)
    {
        
        $project->users()->updateExistingPivot($user->id, ["role_id" => $request->role_id]);
        return redirect()->route("admin.projects.members.index", $project)->with("message", "lid is bewerkt");
    }

    public function ProjectMemberSearch(Request $request, Project $project)
    {
        $project = Project::with("users")->find($project->id);
        
        $searchData = $request->search_data;
       
        $projectUsers = User::with('projects')
        ->where('name', 'LIKE', '%' . $searchData . '%')->get("*");
        //dd($projectUsers);
        $relation = ProjectUser::whereRelation("project", "project_id", $project->id)->get();

        
        $roles = Role::all();
        $users = User::all();
        return view("admin.projects.members.index", compact("project", "roles", "projectUsers", "users"));
    }

    public function memberProjectSearch(Request $request)
    {
        
        $projects = Project::with("users")->latest()->paginate(15);
        $projectUsers = User::with('projects')
        ->where('id', 'LIKE', '%' . $request->id . '%')->get("*");
        $users = User::all();
        //dd($projectUsers);
        return view('admin.projects.index', compact('projects', "projectUsers", "users" ));
    }
   
}