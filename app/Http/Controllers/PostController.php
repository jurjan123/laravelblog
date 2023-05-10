<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $posts, $title, $description, $post_id;
    public $updateMode = false;

    //show index with posts
    public function index()
    {
      
        $category = Category::all();

        $posts = Post::with(["categories", "users"])->latest()->paginate(15);
    
        return view("admin.posts.index", [
            "posts" => $posts,
            "categories" => $category,
            
        ]);
    }

    public function category_search(Request $request)
    {
       $posts = Post::where('category_id', $request->id)->latest()->paginate(6);
    
        $categories = Category::all();
        return view('admin.posts.index', compact("posts", "categories"));
    }

    public function adminIndex(){
        return view("admin.index");
    }

    // show create post page
    public function create()
    {
        $categories = Category::latest()->get();
        return view("admin.posts.create",[
            "categories" => $categories
        ]);
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
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $post->image = $image_name;
        }
        $succesmessage = "Succes! Post: ". $request->title. " is gemaakt";
         
        $post->save();
        
       
        $this->resetInputField();
    
        return redirect()->route("admin.posts.index")->with("message", $succesmessage);
    }

    // edit existing post
    public function edit(Request $request, Post $value)
    {
        $categories = Category::latest()->get();
        $value->category_id != null ? $categoryname = $value->categories->name : $categoryname = "";  
        return view("admin.posts.edit", [
            "post" => $value,
            "categories" => $categories,
            "categoriename" => $categoryname
        ]);
    }
    

    public function update(PostRequest $request, Post $value)
    {   
        $value->title = $request->title;
        $value->description = strip_tags($request->description);
        $value->intro = $request->intro;
        $value->created_at = $request->created_at;
        
        $value->category_id = (int)$request->category_id;
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'.Auth::user()->id), $image_name);
            $value->image = $image_name;
        }

        $succesmessage = "Succes! Post: ". $value->title. " is bewerkt";
            
        $value->update();
            
        return redirect()->route("admin.posts.index")->with("message", $succesmessage);
        
    }

    public function delete(Request $request, Post $value)
    {
        $succesmessage = "Succes! Post: ". $value->title. " is verwijderd";
        $value->delete();
        return redirect()->route("admin.posts.index")->with("message", $succesmessage);
    }

    public function show(string $id):View
    {
        return view("posts.show", [
            "post" => Post::findOrFail($id)
        ]);
    }

    public function search(Request $request)
    {
        $posts = Post::where("title", "Like", "%".$request->search_data."%")->paginate(7);
        $categories = Category::all();
        return view("admin.posts.index", compact("posts", "categories"));
    }

}