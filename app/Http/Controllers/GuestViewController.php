<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class GuestViewController extends Controller
{
    public function PostIndex(){
        $posts = Post::with("categories")->paginate(15);
        return view("posts.index", [
        "posts" => $posts
    ]);
}

public function post_search(Request $request){
    $categoryName = Category::find($request->id)->first()->value("name");

    session()->regenerate(); 
    
    $categories = Category::all();
    return view('admin.posts.index', compact('posts', 'categories', "categoryName"));
}

    public function ProjectIndex(){
        $projects = Project::with("users")->get();
        $projects = Project::latest()->paginate(15);

        return view("projects.index", [
        "projects" => $projects
    ]);
    }

    public function CategoryIndex(){
        $categories = Category::latest()->paginate(15);
    
        return view("categories.index", [
        "categories" => $categories
    ]);
    }
    
}
