<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $userProjects = User::with("projects")->find(Auth::user()->id)->get();
        return view("users.project", [
            "userProjects" => $userProjects
        ]);
    }

    public function UserProjectDelete(User $user, Project $project)
    {
        $user->projects()->detach($project->id);
        
        return redirect()->route("users.projects.page")->with("message", "project is verwijderd");
    }
    
}
