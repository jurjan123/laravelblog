<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = session()->get('cart');
        return view('cart', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        
        if(!$request->session()->has("cart")){
            $request->session()->put("cart", []);
        }


        $cart = $request->session()->get('cart');
        //dd($cart[$id]);
        
        if(!isset($cart[$id])){
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $product->quantity,
                "description" => $product->description,
                "vat" => $product->vat,
                "discount" => $product->discount,
                "stock" => $product->stock,
                "image" => $product->image
            ];
        } 
        else{
            $cart[$id]["quantity"]++;
        }
       
        $request->session()->put('cart', $cart);
        
        return back()->with("message", "product toegevoegd");
       
        /*if(in_array($product->id, $cart)){
            $product->quantity += 1;
        } else{
            $cart[] = $product->id;
        }*/
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
