<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Query\Builder;
use App\Providers\RouteServiceProvider;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Translation\Formatter\IntlFormatter;

class PostController extends Controller
{

    
    public $posts, $title, $description, $post_id;
    public $date;
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
            'title' => 'required|min:3',
            'description' => 'required',
            "intro" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "created_at" => "required"
        ]);
        
       
        //dd($validatedDate["created_at"] = $this->nlDate($validatedDate["created_at"]));
        
       
        
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
            "intro" => $value->intro,
            "image" => $value->image,
            "created_at" => $value->created_at
        ]);
    }
    

    public function update(Request $request, Post $value)
    { 
        $validatedDate = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            "intro" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "created_at" => "required"
        ]);


        if(request()->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
        
            $request->image->move(public_path('/images'), $image_name);
            $validatedDate["image"] = $image_name;
        }
        

        
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
        return view("posts.show", [
            "post" => Post::findOrFail($id)
        ]);
    }


    public function nlDate(){ 
        $months = [
            'January' => 'januari',
            'February' => 'februari',
            'March' => 'maart',
            'April' => 'april',
            'May' => 'mei',
            'June' => 'juni',
            'July' => 'juli',
            'August' => 'augustus',
            'September' => 'september',
            'October' => 'oktober',
            'November' => 'november',
            'December' => 'december'
        ];
        
        $weekdays = [
            'Monday' => 'maandag',
            'Tuesday' => 'dinsdag',
            'Wednesday' => 'woensdag',
            'Thursday' => 'donderdag',
            'Friday' => 'vrijdag',
            'Saturday' => 'zaterdag',
            'Sunday' => 'zondag'
        ];
        // Sunday 9 April 2017 17:40:09
        $datetime = date('l j F Y ');
        $datetime = str_replace(array_keys($months),   array_values($months),   $datetime);
        $datetime = str_replace(array_keys($weekdays), array_values($weekdays), $datetime);
        // zondag 9 april 2017 17:40:09
        echo $datetime;
    }

}