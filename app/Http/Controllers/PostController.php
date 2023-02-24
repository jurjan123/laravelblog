<?php

namespace App\Http\Controllers;
use ErrorException;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;

class PostController extends Controller
{

    public $posts, $title, $description, $post_id;
    public $updateMode = false;

    //show index with posts
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    // show create post page
    public function create()
    {
        return view("posts.create");

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
            'description' => 'required'
        ]);
        
        $this->title = $validatedDate["title"];
        $this->description = $validatedDate["description"];

        
        Post::create($validatedDate);
        
        $this->resetInputField();
        
        session()->flash("succes post created succesfully");
        
        return redirect("posts");
    }

    // edit existing post
    public function edit(Request $request, Post $value)
    {

        return view("posts.edit", [
            "id" => $value->id,
            "title" => $value->title,
            "description" => $value->description
        ]);
    }
    
    public function update(Request $request, Post $value)
    {
        $validatedDate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $value->update($validatedDate);

        return redirect()->route("posts.index");
    }

    public function delete(Request $request, Post $value)
    {
        $value->delete();
        return redirect()->route('posts.index');
    }
}