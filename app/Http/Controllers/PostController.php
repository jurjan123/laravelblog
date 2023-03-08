<?php

namespace App\Http\Controllers;
use ErrorException;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Query\Builder;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Collection;

class PostController extends Controller
{

    
    public $posts, $title, $description, $post_id;
    public $updateMode = false;

    //show index with posts
    public function index()
    {

        
       
        $posts = Post::latest()->paginate(6);
       
        return view("posts.index", [
            "posts" => $posts
        ]);
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
            'description' => 'required',
        ]);
        
        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
        $validatedDate["title"] = htmlspecialchars_decode($validatedDate["title"]);
        $validatedDate["description"] = htmlspecialchars_decode($validatedDate["description"]);
        $validatedDate += array("user_id" => auth()->id());
        
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
            "description" => $value->description,
        ]);
    }
    

    public function update(Request $request, Post $value)
    {
    
        $validatedDate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            
        ]);

        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
        
        $value->update($validatedDate);

        return redirect()->route("posts.index");
    }

    public function delete(Request $request, Post $value)
    {
        $value->delete();
        return redirect()->route('posts.index');
    }
}