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
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class PostController extends Controller
{

    
    public $posts, $title, $description, $post_id;
    public $updateMode = false;

    //show index with posts
    public function index()
    {
        $posts = Post::latest()->with("User")->get();
        $posts = Post::latest()->paginate(6);
        
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
    public function store(Request $request)
    {
       
        $validatedDate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "created_at" => "required"
        ]);

        
        if($request->image){
        $image_name = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $image_name);
        $image_name = time().'.'.$request->image->getClientOriginalExtension(); #Pakt de naam van de image
        
        $validatedDate["image"] = $image_name;
        }

        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
        $validatedDate["title"] = htmlspecialchars_decode($validatedDate["title"]);
        $validatedDate["description"] = htmlspecialchars_decode($validatedDate["description"]);
        $validatedDate += array("user_id" => auth()->id());
        
        Post::create($validatedDate);
       
        
        $this->resetInputField();
    
        return redirect()->route("admin.posts.index")->with("message", "Post is gemaakt!");
    }

    // edit existing post
    public function edit(Request $request, Post $value)
    {

        return view("admin.posts.edit", [
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

        $validatedDate["title"] = htmlspecialchars_decode($validatedDate["title"]);
        $validatedDate["description"] = htmlspecialchars_decode($validatedDate["description"]);
        $validatedDate["title"] = strip_tags($validatedDate["title"]);
        $validatedDate["description"] = strip_tags($validatedDate["description"]);
       
        
        $value->update($validatedDate);
        return redirect()->route("admin.posts.index")->with("editmessage", "de Post is succesvol bewerkt!");
        
    }

    public function delete(Request $request, Post $value)
    {
        $value->delete();
        return redirect()->route("admin.posts.index")->with("deletemessage", "Post is verwijderd!");
    }

    public function show(string $id):View
    {
        return view("admin.users.show", [
            "posts" => Post::all()
        ]);
    }

    
}

