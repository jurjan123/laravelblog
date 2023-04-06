<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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
       
        return view("admin.projects.create",[
            
        ]);
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
    public function edit(Request $request, Projects $project)
    {
        //dd($project);

        return view("admin.projects.edit", ["project" => $project]);
    }
    

    public function update(ProjectRequest $request, Projects $value)
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

    public function search(Request $request)
    {
        $projects = Projects::where("title", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.projects.index", compact("projects"));
    }

    public function roleIndex(Request $request, Projects $project)
    {
        $roles = Role::latest()->paginate(15);
        return view("admin.projects.roles.index",[
            "roles" => $roles
        ]);
    }

    public function membersIndex(Request $request, Projects $project)
    {
        //$users = User::latest()->paginate(15);
        $users =  User::All();

        foreach($users as $user){
            $projects = User::with("projects")->find($user->id);
        }
        return view("admin.projects.members.index", [
            "users" => $users,
            "project" => $project,
            "members" => $project->users,
            "projects" => $projects
        ]);
    }

    public function addMembersToGroup(Request $request, Projects $project)
    {
        $users = User::all();
        return view("admin.projects.members.addtogroup", [
            "users" => $users,
            "project" => $project
        ]);
    }

    public function storeMemberToGroup(Request $request, Projects $project)
    {
        
        $validated = $request->validate([
            "user_id" => "required"
        ]);

        $user = User::where('id', $request->user_id)->first();
        $project->users()->attach($user->id);
        //$project->users()->attach($request->user_id);

        return back()->with("message", "lid is toegevoegd");

        
        //$project->users()
        //->attach


    }

    public function createRole(){
        return view("admin.projects.roles.create");
    }

    public function storeRole(RoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        

        $role->save();
        return redirect()->route("admin.projects.roles.index")->with("message", "rol is gemaakt!");
    }

}