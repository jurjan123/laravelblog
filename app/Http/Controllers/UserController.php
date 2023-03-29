<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Requests\UserRequest;
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
        return view("admin.users.create");
    }

    public function store(Request $request, User $user){
        
        $validatedDate = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["max:255", "email", ],
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "is_admin" => "required",
            "password" => ["required", Rules\Password::defaults()],
            "password_confirmation" => 'required_with:password|same:password' 
        ]);

       

        $validatedDate["password"] = Hash::make($validatedDate["password"]);
        $image_name = time().'.'.$request->user_image->extension();  
        $request->user_image->move(public_path('images'), $image_name);
        $image_name = time().'.'.$request->user_image->getClientOriginalExtension(); #Pakt de naam van de image
        $validatedDate["user_image"]= $image_name;
        
        
        User::create($validatedDate);
        //$user->save($validatedDate);
        return redirect()->route("users.index")->with("message", "Gebruiker is gemaakt!");

        

    }
    
    public function edit(Request $request, User $user){
        return view("admin.users.edit", [
            "id" => $user->id,
            "email" => $user->email,
            "user_image" => $user->user_image,
            "name" => $user->name
            
        ]);
    }

    public function update(Request $request, User $user){
          
        $validatedDate = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["max:255", "email", Rule::unique(User::class)->ignore($user->id),/*'unique:'.User::class*/],
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "is_admin" => "required",
            "password" => ["required"],
            "new_password" => ["required", /*"min:6", "confirmed",*/ Rules\Password::defaults()],
            "password_confirmation" => 'required_with:new_password|same:new_password' 
        ]);

        if(password_verify($validatedDate["password"], Auth::user()->password) && $validatedDate["new_password"] != $validatedDate["password"] ){
            $image_name = time().'.'.$request->user_image->extension();  
            $request->user_image->move(public_path('images'), $image_name);
            $image_name = time().'.'.$request->user_image->getClientOriginalExtension(); #Pakt de naam van de image
            $user->user_image= $image_name;
            
            $validatedDate["password"] = Hash::make($validatedDate["new_password"]);

            $user->update($validatedDate);
            return redirect()->route("users.index")->with("message", "Gebruiker is gemaakt!");
        
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
}

