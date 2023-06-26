<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Policies\OrderDetailsPolicy;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where("user_id", Auth::user()->id)->latest()->paginate(20);
    
       return view("admin.users.ordersoverview", compact("orders"));
    }

    public function orderDetailsIndex(Order $order,)
    {
       
        $customers = Customer::get()->where("order_id", $order->id);
        $products = DB::table("order_details")->where("order_id", $order->id)->get();
        return view("admin.users.orderdetailsoverview", compact("customers", "products", "order" ));
    }

    public function show(Request $request, User $user){
        //$this->authorize('checkId', [OrderDetailsPolicy::class, (int)$request->input('user_id')]);
        
        $order = Order::find($request->search_data);
        if(empty($request->search_data)){
            $message = "Vul een ID in!";
            return back();
        } elseif(!is_numeric($request->search_data)){
            $message = "Vul een ID in!";
            return back()->with("message", $message);
        }
        elseif($order->user_id !== Auth::user()->id){
            abort(403);
        } else{
            return view("admin.users.ordersoverview", compact("order"));
        }
        

    }
        
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
