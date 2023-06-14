<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;

class CartController extends Controller
{
   
    public function index(Request $request)
    {
        $products = session()->get('cart');
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        $subtotal_incl = session()->get('subtotal_incl');
        $articles = session()->get('articles');
        
        return view('cart', compact("products", "subtotal", "articles", "btw", "subtotal_incl"));
    }

    public function addressIndex()
    {
        $products = session()->get('cart');
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        $customer = session()->get("customer", []);
        
        $subtotal_incl = session()->get("subtotal_incl");
        $articles = session()->get('articles');
        return view("products.address", compact("products", "subtotal", "articles", "btw", "subtotal_incl", "customer"));
    }

    public function summaryIndex()
    {
        $products = session()->get('cart');
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        $subtotal_incl = session()->get("subtotal_incl");
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

        return view("products.summary", compact("products", "subtotal", "articles", "btw", "subtotal_incl","address", "billingaddress"));
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
                "total_exc" => $product->price * $quantity,
                "product_btw" => $product->vat/100 * ($product->price * $quantity),
                "total_inc" => ($product->price * $quantity) + $product->vat/100 * ($product->price * $quantity),
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
        //dd($request->all());
       if($request->billingInput == "true"){
       
        $validator = $request->validateWithBag("billing",
        [
            'billing_first_name' => ['required', "string", "max:255"],
            'billing_last_name' => ['required', "string", "max:255"],
            "billing_street" => ["required", "max:50"],
            "billing_house_number" => ["required", "max_digits:5"],
            "billing_postal_code" => ["required", "max:10"],
            "billing_city" => ["required", "string", "max:100"],
            'billing_phone_number' => ['required', "dutch-phone-number"],
            'billing_email' => ['required', 'email', ],
        ],
        [
            "billing_first_name.required" => "Voornaam is verplicht",
            "billing_first_name.string" => "Voornaam mag alleen karakters bevatten",
            "billing_last_name.required" => "Achternaam is verplicht",
            "billing_last_name.string" => "Achternaam mag alleen karakters bevatten",
            "billing_street.required" => "Straat is verplicht",
            "billing_house_number.required" => "Huisnummer is verplicht",
            "billing_postal_code.required" => "Postcode is verplicht",
            "billing_postal_code.max" => "Postcode mag niet meer dan 10 cijfers bevatten",
            "billing_city.required" => "Plaats is verplicht",
            "billing_city.string" => "Plaats mag alleen karakters bevatten",
            "billing_phone_number.required" => "Telefoonnummer is verplicht",
            "billing_phone_number.dutch-phone-number" => "Telefoonnummer moet een Nederlands telefoonnummer zijn",
            "billing_email.required" => "Email is verplicht",
            "billing_email.unique" => "Email is al in gebruik"
        ]
    );

    session()->put("customer", [
        $address = [
            "type" => "bezorgadres",
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
            "type" => "factuuradres",
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
                "type" => "bezorgadres",
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
                "type" => "factuuradres",
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

    //$request->session()->flush();

    return redirect()->route("cart.summary")->withInput();
    
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

public function updateFromCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart');

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            $request->session()->put('cart', $cart);
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
            $request->session()->put('cart', $cart);

            return redirect()->route("cart")->with("message", "aantal aangepast");
        } 

    }

    public function storeOrderData(Request $request)
    {
        $customer = $request->session()->get("customer", []);
       
        $cart = session()->get('cart', []);
        $subtotal = session()->get('subtotal');
        $btw = session()->get('btw');
        $subtotal_incl = session()->get('subtotal_incl');
        $articles = session()->get('articles');
        $ldate = date('Y-m-d H:i:s');

        foreach($cart as $id => $details){
            $product = Product::find($id);
            if ($product->stock <= 0) {
                return back()->with('message', "$product->name is niet op voorraad.");
            } 
            else{
                $product->stock = $product->stock - $details["quantity"];
                $product->save();
            }
        }   
    
        $order = Order::create([
            "user_id" => Auth::user()->id,
            "total_exc" => $subtotal,
            "vat" => $btw,
            "total_inc" => $subtotal_incl,
            "created_at" => $ldate,
            "updated_at" => $ldate   
        ]);

        $order->save();
        
        foreach($customer as $id => $details){
            Customer::create([
                "order_id" => $order->id,
                "type" => $details["type"],
                "first_name" => $details["first_name"],
                "last_name" => $details["last_name"],
                "street" => $details["street"],
                "house_number" => $details["house_number"],
                "postal_code" => $details["postal_code"],
                "city" => $details["city"],
                "phone_number" => $details["phone_number"],
                "email_adress" => $details["email"]
            ]);
        }
       
        foreach($cart as $id => $details){
            DB::table("order_details")->insert([
                "order_id" => $order->id,
                "product_id" => $id,
                "product_name" => $details["name"],
                "product_price" => $details["price"],
                "quantity" => $details["quantity"],
                "total_exc" => $details["total_exc"],
                "vat" => $details["product_btw"],
                "total_inc" => $details["total_inc"],
                "created_at" => $ldate,
                "updated_at" => $ldate   
            ]);
        
        }

        $request->session()->forget(["cart",'subtotal','btw','articles','subtotal_incl']);
        $request->session()->regenerate();

        return redirect()->route("products.index")->with("message", "opgeslagen");

    }

}

