<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $posts, $title, $description, $post_id;
    public $date;
    public $updateMode = false;

    //show index with posts
    public function index()
    {
        $posts = Post::latest()->with("User")->get();
        $posts = Post::latest()->paginate(15);
        
        return view("admin.posts.index", [
            "posts" => $posts
        ]);
    }

    public function adminIndex(){
        return view("admin.index");
    }

    // show create post page
    public function create()
    {
        
        return view("admin.posts.create");

    }

    private function resetInputField(){
        $this->title = "";
        $this->description = "";
    }

    //store the post
    public function store(PostRequest $request)
    {
        
        $post = new Post;
        $post->title = $request->title;
        $post->description = strip_tags($request->description);
        $post->intro = $request->intro;
        $post->created_at = $request->created_at;
        $post->user_id = Auth::user()->id;
        
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images/". Auth::user()->id), $image_name);
            $post->image = $image_name;
        }
         
        $post->save();
        
       
        $this->resetInputField();
    
        return redirect()->route("admin.posts.index")->with("message", "Post is gemaakt!");
    }

    public function message()
    {
        return redirect()->route("admin.posts.edit")->with("errormessage", "post niet kunnen maken");
    }

    // edit existing post
    public function edit(Request $request, Post $value)
    {
        return view("admin.posts.edit", [
            "id" => $value->id,
            "title" => $value->title,
            "description" => $value->description,
            "intro" => $value->intro,
            "image" => $value->image,
            "created_at" => $value->created_at
        ]);
    }
    

    public function update(PostRequest $request, Post $value)
    {   
        $value->title = $request->title;
        $value->description = strip_tags($request->description);
        $value->intro = $request->intro;
        $value->created_at = $request->created_at;
        $value->user_id = Auth::user()->id;
       
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'.Auth::user()->id), $image_name);
            $value->image = $image_name;
        }
            
        $value->save();
            
        return redirect()->route("admin.posts.index")->with("message", "de Post is succesvol bewerkt!");
        
    }

    public function delete(Request $request, Post $value)
    {
        $value->delete();
        return redirect()->route("admin.posts.index")->with("message", "Post is verwijderd!");
    }

    public function show(string $id):View
    {
        return view("posts.show", [
            "post" => Post::findOrFail($id)
        ]);
    }

}