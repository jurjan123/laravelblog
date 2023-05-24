<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\RunningLaravelDuskInProductionProvider;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $array = [];
    public function index()
    {
        
        $products = Product::with("categories")->latest()->paginate(15);
        $categories = Category::all();
        
        return view("admin.products.index", [
            "products" => $products,
            "categories" => $categories
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::with("categories")->where("name", "Like", "%".$request->search_data."%")->paginate(7);
        $categories = Category::all();
        return view("admin.products.index", compact("products", "categories"));
    }

    public function category_search(Request $request)
    {
        $products = Category::find($request->id)->products()->orderByRaw('quantity DESC')->latest()->paginate(15);
        
        $categories = Category::all();
        return view('admin.products.index', compact("products", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->vat = $request->vat;
        $product->discount =  $request->discount;
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'), $image_name);
            $product->image = $image_name;
            }

        $message = "Succes! product: ".$product->name. " is gemaakt";

        $product->save();

        if($request->categories){
        foreach($request->categories as $category){
            $product->categories()->attach($category);
        }
    }

    return redirect()->route("admin.products.index")->with("message", $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return view("products.show", [
            "product" => $product  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $productCategories = Product::find($product->id)->categories;
        //dd($products[3]["id"]);
        return view("admin.products.edit",[
            "product" => $product,
            "categories" => $categories,
           "productCategories" => $productCategories
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->vat = $request->vat;
        
        $product->discount =  $request->discount;
        if($request->hasFile("image")){
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'), $image_name);
            $product->image = $image_name;
        }

        if($request->categories){
            $product->categories()->detach();
            foreach($request->categories as $category){
                $product->categories()->attach($category);            
        }

        }
        
        $message = "Succes! product: ".$product->name. " is bewerkt";

        $product->update();

        return redirect()->route("admin.products.index")->with("message", $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        $message = "Succes! Product: ".$product->name. " is verwijderd";
        $product->delete();
        return redirect()->route("admin.products.index")->with("message", $message);
    }
}
