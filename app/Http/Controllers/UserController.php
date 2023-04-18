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
       $users = User::latest()->paginate(15);

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
        $user->roles_id = $request->role;
        $user->password = Hash::make($request->password);
       
        if($request->hasFile("user_image")){
            $image_name = time() . '.' . $request->user_image->extension();
            $request->user_image->move(public_path("images/"), $image_name);
            $user->user_image = $image_name;
            //dd($user->user_image);
        }
        
        $user->save();
        
        return redirect()->route("users.index")->with("message", "Gebruiker is gemaakt!");

    }
    
    public function edit(Request $request, User $user){
        
        $roles = Role::latest()->get();
        $user_role_name = DB::table("roles")
        ->where("id", $user->roles_id)
        ->value("name");
        
        return view("admin.users.edit", [
            "id" => $user->id,
            "email" => $user->email,
            "user_image" => $user->user_image,
            "name" => $user->name,
            "user_role_name" => $user_role_name,
            "roles" => $roles,
        
        ]);
    }

    public function update(UpdateUserRequest $request, User $user){
          
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = $request->password;
        $user->roles_id = $request->role;

        if($request->hasFile("user_image")){
            $image_name = time().'.'.$request->user_image->extension();  
            $request->user_image->move(public_path('images/'), $image_name);
            $image_name = time().'.'.$request->user_image->getClientOriginalExtension(); #Pakt de naam van de image
            $user->user_image= $image_name;
            
        }
        
        if(password_verify($user->password, Auth::user()->password) && $request->new_password != $request->password){
           $user->password = Hash::make($request->new_password);
           $user->update();
            return redirect()->route("users.index")->with("message", "Gebruiker is bewerkt!");
        } 
    }

    public function show(Request $request)
    {
       
       return view("admin.users.show");
        
    }
    

    public function delete(Request $request, User $user){
        $user->delete();
        return redirect()->route("users.index")->with("message", "Gebruiker is verwijderd!");

    }

    public function search(Request $request){
        $users = User::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.users.index", compact("users"));
    }

}

