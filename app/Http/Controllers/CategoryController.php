<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(15);
        
        return view("admin.categories.index", [
            "categories" => $categories,
        ]);
    }

    public function create()
    {
        return view("admin.categories.create");
    }

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

        $succesmessage = "Succes! Categorie: ". $request->name. " is gemaakt";

        $category->save();
        return redirect()->route("admin.categories.index")->with("message", $succesmessage);
    }

  
    public function show($id)
    {
        $posts = Category::findOrFail($id)->posts;
        $products = Category::findOrFail($id)->products;
    
        return view("categories.show", [
            "products" => $products,
            "posts" => $posts
        ]);
    }

    public function edit(Category $value)
    {
        return view("admin.categories.edit", [
            "id" => $value->id,
            "name" => $value->name,
            "image" => $value->image
        ]);
    }

    public function update(CategoryRequest $request, Category $value)
    {
        $value->name = $request->name;
        $value->tag = $request->tag;
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $value->image = $image_name;
        }

        $succesmessage = "Succes! Categorie: ". $request->name. " is bewerkt";

        $value->update();
        
        return redirect()->route("admin.categories.index")->with("message", $succesmessage);
    }

    public function delete(Request $request, Category $value)
    {
        $succesmessage = "Succes! Categorie: ". $value->name. " is verwijderd";
        $value->delete();
        
        return redirect()->route("admin.categories.index")->with("message", $succesmessage);
    }

    public function search(Request $request)
    {
        $categories = Category::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.categories.index", compact("categories"));
    }
}
