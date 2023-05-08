<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class GuestViewController extends Controller
{
    public function PostIndex(){
        $posts = Post::with("categories")->paginate(15);
        Post::exists() ? $message = "" : $message = "Hier is niks te zien";
        return view("posts.index", [
        "posts" => $posts,
        "message" => $message
    ]);
}

public function post_search(Request $request){
    $categoryName = Category::find($request->id)->first()->value("name");

    session()->regenerate(); 
    
    $categories = Category::all();
    return view('admin.posts.index', compact('posts', 'categories', "categoryName"));
}

    public function ProjectIndex(){
        $projects = Project::with("users")->latest()->paginate(15);
        Project::exists() ? $message = "" : $message = "Hier is niks te zien";
        return view("projects.index", [
        "projects" => $projects,
        "message" => $message
    ]);
    }

    public function CategoryIndex(){
        $categories = Category::latest()->paginate(15);
    
        return view("categories.index", [
        "categories" => $categories
    ]);
    }

    public function UserProjectPage(){
        $user = Auth::user()->id;
        $userProjects = User::with("projects")->where("id", $user)
        ->latest()->paginate(15);

        $projects = Project::all();
        return view("users.project", [
            "userProjects" => $userProjects,
            "projects" => $projects
        ]);
    }

    public function projectsView()
    {
        $user = Auth::user()->id;
        $userProjects = User::with("projects")->where("id", $user)
        ->latest()->paginate(15);

    
        return view("users.projectview", [
            "userProjects" => $userProjects,
        ]);
    }

    public function AddUserProject(Request $request){
        $user = Auth::user();
        $userProject = User::with("projects")->where("id", $user->id)->get();

        foreach($userProject as $project){
            $user->is_admin ? $project->projects()->attach($request->project_id, ["role_id" => 1]) : $project->projects()->attach($request->project_id, ["role_id" => 2]);
        }
        $message = "Succes! project ".$project->title." toegevoegd";
        return redirect()->route("users.projects.page")->with("message", $message);
    }

    public function updateUserProject(Request $request, Project $project, User $user )
    {
        
        return redirect()->route("users.projects.page")->with("message", "project is bewerkt");
    }

    public function UserProjectDelete(User $user, Project $project)
    {
        $user->projects()->detach($project->id);
        $message = "Succes! project: ". $project->title ." is verwijderd";
        return redirect()->route("users.projects.page")->with("message", $message);
    }
    
}
