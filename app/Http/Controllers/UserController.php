<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    
    public function users(){
       $users = User::latest()->paginate(6);

       return view("admin.users.index", compact("users")); 
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
            "role" => "required",
            "password" => ["required"],
            "new_password" => ["required", /*"min:6", "confirmed",*/ Rules\Password::defaults()],
            "password_confirmation" => 'required_with:new_password|same:new_password' 
        ]);

        switch($validatedDate["role"]){
            case "1":
                $validatedDate["role"] = 1;
            break;

            case "2":
                $validatedDate["role"] = 3;
            break;

            case "3":
                $validatedDate["role"] = 3;
            break;

        }

        if(password_verify($validatedDate["password"], Auth::user()->password) && $validatedDate["new_password"] != $validatedDate["password"] ){
            $image_name = time().'.'.$request->user_image->extension();  
            $request->user_image->move(public_path('images'), $image_name);
            $image_name = time().'.'.$request->user_image->getClientOriginalExtension(); #Pakt de naam van de image
            $user->user_image= $image_name;
            
            $validatedDate["password"] = Hash::make($validatedDate["new_password"]);

            $user->update($validatedDate);
            return redirect()->route("admin.users.index");
        
        } else{
            return redirect()->route("admin.users.edit", $user)->with('status', 'profile-updated');
        }
    }

    public function show(Request $request)
    {
       
       return view("admin.users.show");
        
    }
    

    public function delete(Request $request, User $user){
        $user->delete();
        return redirect("/users");
    }
}

