<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    
    public function users(){
       $users = User::with("role")->latest()->paginate(15);
        
       foreach($users as $user){
        if($user->is_admin == 0){
            $user->is_admin = "nee";
        } else{
            $user->is_admin = "ja";
        }
    }
       return view("admin.users.index", compact("users")); 
    }

    public function create(){
        $roles = Role::latest()->get();
        return view("admin.users.create", [
            "roles" => $roles
        ] );
    }

    public function store(StoreUserRequest $request, User $user){
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
       
        if($request->hasFile("user_image")){
            $image_name = time() . '.' . $request->user_image->extension();
            $request->user_image->move(public_path("images/"), $image_name);
            $user->user_image = $image_name;
        }
        
        $message = "Succes! De gebruiker: ". $user->name. " is verwijderd";
        $user->save();
        
        return redirect()->route("users.index")->with("message", $message);

    }
    
    public function edit(User $user){

        $roles = Role::all();
        if($user->role_id != null){
            $rolename = Role::find($user->role_id);
            $editDataArray = [
                "id" => $user->id,
                "email" => $user->email,
                "name" => $user->name,
                "rolename" => $user->role->name,
                "roles" => $roles,
            ];
        } 
        else{
            $editDataArray = [
                "id" => $user->id,
                "email" => $user->email,
                "name" => $user->name,
                "roles" => $roles,
            ];
        }
        
        return view("admin.users.edit", $editDataArray);
    }

    public function update(UpdateUserRequest $request, User $user){
        //dd($request);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = $request->password;
        $user->role_id = $request->role;
        
        if($request->hasFile("user_image")){
            $image_name = time().'.'.$request->user_image->extension();  
            $request->user_image->move(public_path('images/'), $image_name);
            $image_name = time().'.'.$request->user_image->getClientOriginalExtension(); #Pakt de naam van de image
            $user->user_image= $image_name;
            
        }
        
        if(password_verify($user->password, Auth::user()->password) && $request->new_password != $request->password){
           $user->password = Hash::make($request->new_password);
           $message = "Succes! De gebruiker: ". $user->name. " is verwijderd";
           $user->update();
           return redirect()->route("users.index")->with("message", $message);
        } 
    }

    public function show(Request $request)
    {
       
       return view("admin.users.show");
        
    }
    

    public function delete(Request $request, User $user){
        $message = "Succes! De gebruiker: ". $user->name. " is verwijderd";
        $user->delete();
        return redirect()->route("users.index")->with("message", $message);

    }

    public function search(Request $request){
        $users = User::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.users.index", compact("users"));
    }

}

