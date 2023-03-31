<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $categories = Category::latest()->paginate(15);
        
        return view("admin.categories.index", [
            "categories" => $categories
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

        $category->save();
        return redirect()->route("admin.categories.index")->with("succesmessage", "Categorie is gemaakt!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
