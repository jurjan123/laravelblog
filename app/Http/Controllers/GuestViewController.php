<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProjectRequest;

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

    public function UserIndex()
    {
        $user = User::find(Auth::user()->id);
        
        return view("users.profiles.index",[
        "id" => $user->id,
        "email" => $user->email,
        "name" => $user->name,
    ]);
    }

    public function updateUser(StoreProfileRequest $request, User $user){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        if($request->hasFile("user_image")){
            $image_name = time().'.'.$request->user_image->extension();  
            $request->user_image->move(public_path('images/'), $image_name);
            $image_name = time().'.'.$request->user_image->getClientOriginalExtension(); #Pakt de naam van de image
            $user->user_image= $image_name;
            
        }
        
        if(password_verify($user->password, Auth::user()->password) && $request->new_password != $request->password){
           $user->password = Hash::make($request->new_password);
           $message = "Succes! De gebruiker: ". $user->name. " is bewerkt";
           $user->update();
           return redirect()->route("users.profile.index")->with("message", $message);
        } 
    }
    

    public function UserProjectIndex(){
        $user = Auth::user()->id;
        $userProjects = User::with("projects")->where("id", $user)
        ->latest()->paginate(15);

        $projects = Project::all();
        return view("users.projects.index", [
            "userProjects" => $userProjects,
            "projects" => $projects
        ]);
    }

    public function ProjectSearch(Request $request)
    {
        $user = Auth::user()->id;
        $userProjects = User::with("projects")
        ->latest()->paginate(15);
        
        foreach($userProjects->pivot->id as $id){
            echo $id;
        }

        return view("users.projects.index", compact("projects", "userProjects"));
    }

    public function ProjectEditIndex(Project $project,)
    {
        $this->authorize('update', $project);
        return view("users.projects.edit",[
           "projects" => Project::all(),
           "project" => $project
            
        ]);
    }

    public function updateUserProject(UpdateProjectRequest $request, Project $project, )
    {
        $project->title = $request->title;
        $project->update();
    
        return redirect()->route("users.projects.index")->with("message", "project is bewerkt");
    }

    public function UserProjectDelete(User $user, Project $project)
    {
        $user->projects()->detach($project->id);
        $message = "Succes! project: ". $project->title ." is verwijderd";
        return redirect()->route("users.projects.index")->with("message", $message);
    }

    public function UserPostIndex(){
       $posts = User::find(Auth::user()->id)->posts;
        return view("users.posts.index", [
            "posts" => $posts
        ]);
    }

    public function PostStoreIndex()
    {
        return view("users.posts.create", [
            "categories" => Category::all()
        ]);
    }

    public function PostStore(PostRequest $request)
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
        
        return redirect()->route("users.posts.index")->with("message", $succesmessage);
    }

    public function PostEditIndex(Request $request, Post $post)
    {
        $this->authorize("update", $post);
        $categories = Category::latest()->get();
        $post->category_id != null ? $categoryname = $post->categories->name : $categoryname = "";  
        return view("users.posts.edit", [
            "post" => $post,
            "categories" => $categories,
            "categoriename" => $categoryname
        ]);
    }

    public function UpdateUserPost(PostRequest $request, Post $post)
    {
        
        $post->title = $request->title;
        $post->description = strip_tags($request->description);
        $post->intro = $request->intro;
        $post->created_at = $request->created_at;
        $post->category_id = (int)$request->category_id;
        
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'.Auth::user()->id), $image_name);
            $post->image = $image_name;
        }

        $succesmessage = "Succes! Post: ". $post->title. " is bewerkt";
            
        $post->update();
            
        return redirect()->route("users.posts.index")->with("message", $succesmessage);
        
    }

    public function UserPostDelete(Post $post)
    {
        $message = "Succes! Post: ".$post->title."is verwijderd!";
        $post->delete();
        return redirect()->route("users.posts.index")->with("message", $message);
    }

    
}
