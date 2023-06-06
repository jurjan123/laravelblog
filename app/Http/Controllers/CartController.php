<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CartController extends Controller
{
   
    public function index(Request $request)
    {
        $products = session()->get('cart');
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        return $subtotal_inc = session()->get('subtotal_inc');
        $articles = session()->get('articles');
        dd($btw);
        return view('cart', compact("products", "subtotal", "articles", "btw", "subtotal_inc"));
    }

    public function addressIndex()
    {
        $products = session()->get('cart');
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        $subtotal_inc = session()->get("subtotal_inc");
        $articles = session()->get('articles');
        return view("products.address", compact("products", "subtotal", "articles", "btw", "subtotal_inc"));
    }

    public function summaryIndex()
    {
        $products = session()->get('cart');
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        $articles = session()->get('articles');
        $customer  = session()->get("customer", []);
        
        $address = [
            "full_name" => $customer[0]["first_name"]. " ". $customer[0]["last_name"],
            "full_address" => $customer[0]["street"]. " ". $customer[0]["house_number"],
            "postalcode_city" => $customer[0]["postal_code"]. " ". $customer[0]["city"],
            "phone_number" => $customer[0]["phone_number"],
            "email" => $customer[0]["email"],
        ];

        $billingaddress = [
            "full_name" => $customer[1]["first_name"]. " ". $customer[1]["last_name"],
            "full_address" => $customer[1]["street"]. " ". $customer[1]["house_number"],
            "postalcode_city" => $customer[1]["postal_code"]. " ". $customer[1]["city"],
            "phone_number" => $customer[1]["phone_number"],
            "email" => $customer[1]["email"],
        ];

        return view("products.summary", compact("products", "subtotal", "articles", "btw", "address", "billingaddress"));
    }

   
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        
        if(url()->previous() == route("products.show", $id)){
            $quantity =  $request->input("quantity");
        } 
        else{
            $quantity = 1;
        }


        if(!$request->session()->has("cart")){
            $request->session()->put("cart", []);
        }
        
        $cart = $request->session()->get('cart');
        
        if(!isset($cart[$id])){
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $quantity,
                "vat" => $product->vat,
                "image" => $product->image
            ];
        } 
        else{
            $cart[$id]["quantity"] = $quantity;
        }
        
        $btw = 0;
        $articles = 0;
        $product_total = 0;
        $product_btw = 0;
        $subtotal = 0;
        $subtotal_incl = 0;
        
        foreach($cart as $item => $details){
            $product_total = $details["quantity"] * $details["price"]; 
            $product_btw = $details["vat"]/100 * $product_total;
            $btw += $product_btw;
            $subtotal += $product_total;
            $subtotal_incl += $product_total + $product_btw;
            $articles += $details["quantity"];
            
        }
        $request->session()->put("btw", $btw);
        $request->session()->put("articles", $articles);
        $request->session()->put("subtotal", $subtotal);
        $request->session()->put("subtotal_incl", $subtotal_incl);
        $request->session()->put('cart', $cart);
        
        return redirect()->route("cart")->with("message", "product toegevoegd");
       
    }

    
    public function storeCustomer(CustomerRequest $request)
    {
        
       if($request->billingInput == "true"){
        $request->validate([
            "billing_first_name" => "required",
            "billing_last_name" => "required",
            "billing_street" => "required",
            "billing_house_number" => "required",
            "billing_postal_code" => "required",
            "billing_city" => "required",
            "billing_phone_number" => "required",
            "billing_email" => "required",
        ],
        [
            "billing_first_name.required" => "Voornaam is verplicht",
            "billing_last_name.required" => "Achternaam is verplicht",
            "billing_street.required" => "Straat is verplicht",
            "billing_house_number.required" => "Huisnummer is verplicht",
            "billing_postal_code.required" => "Postcode is verplicht",
            "billing_city.required" => "Plaats is verplicht",
            "billing_phone_number.required" => "Telefoonnummer is verplicht",
            "billing_email.required" => "Email is verplicht",
        ]
    
    );

        session()->put("customer", [
            $address = [
                'first_name' => $request->input("first_name"),
                'last_name' => $request->input("last_name"),
                "street" => $request->input("street"),
                "house_number" => $request->input("house_number"),
                "postal_code" => $request->input("postal_code"),
                "city" => $request->input("city"),
                'phone_number' => $request->input("phone_number"),
                'email' => $request->input("email"),
            ],
            $billingadress = [
                'first_name' => $request->input("billing_first_name"),
                'last_name' => $request->input("billing_last_name"),
                "street" => $request->input("billing_street"),
                "house_number" => $request->input("billing_house_number"),
                "postal_code" => $request->input("billing_postal_code"),
                "city" => $request->input("billing_city"),
                'phone_number' => $request->input("billing_phone_number"),
                'email' => $request->input("billing_email"),
            ]
        ]);
    } 
        
        else{
            session()->put("customer", [
                $address = [
                    'first_name' => $request->input("first_name"),
                    'last_name' => $request->input("last_name"),
                    "street" => $request->input("street"),
                    "house_number" => $request->input("house_number"),
                    "postal_code" => $request->input("postal_code"),
                    "city" => $request->input("city"),
                    'phone_number' => $request->input("phone_number"),
                    'email' => $request->input("email"),
                ],
                
                $billingaddress = [
                    'first_name' => $request->input("first_name"),
                    'last_name' => $request->input("last_name"),
                    "street" => $request->input("street"),
                    "house_number" => $request->input("house_number"),
                    "postal_code" => $request->input("postal_code"),
                    "city" => $request->input("city"),
                    'phone_number' => $request->input("phone_number"),
                    'email' => $request->input("email"),
                
                ]
                ]);
          
        }
        
        return redirect()->route("cart.summary");
    }

    
    public function deleteFromCart(Request $request, $id)
    {
              
        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            $btw = 0;
            $articles = 0;
            $product_total = 0;
            $product_btw = 0;
            $subtotal = 0;
            $subtotal_incl = 0;
                
        foreach($cart as $id => $details){
            $product_total = $details["quantity"] * $details["price"]; 
            $product_btw = $details["vat"]/100 * $product_total;
            $btw += $product_btw;
            $subtotal += $product_total;
            $subtotal_incl += $product_total + $product_btw;
            $articles += $details["quantity"];
        }
                
        $request->session()->put("btw", $btw);
        $request->session()->put("articles", $articles);
        $request->session()->put("subtotal", $subtotal);
        $request->session()->put("subtotal_incl", $subtotal_incl);
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product verwijderd uit winkelwagen!');
    }
}

};

