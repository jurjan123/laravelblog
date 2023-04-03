<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        
        return view("admin.categories.index", [
            "categories" => $categories,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->tag = $request->tag;
        
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $category->image = $image_name;
        }

        $category->save();
        return redirect()->route("admin.categories.index")->with("message", "Categorie is gemaakt!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Category::findOrFail($id)->posts;
        
        return view("categories.show", [
            "category" => Category::findOrFail($id),
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $value)
    {
        return view("admin.categories.edit", [
            "id" => $value->id,
            "name" => $value->name,
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $value)
    {
        $value->name = $request->name;
        
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $value->image = $image_name;
        }

        $value->save();
        
        return redirect()->route("admin.categories.index")->with("message", "Categories is succesvol bewerkt");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Category $value)
    {
        
        $value->delete();
        return redirect()->route("admin.categories.index")->with("message", "Categorie is verwijderd!");
    }

    public function search(Request $request)
    {
        $categories = Category::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.categories.index", compact("categories"));
    }

    
    
}
