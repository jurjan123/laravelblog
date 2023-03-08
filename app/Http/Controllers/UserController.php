<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
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

class UserController extends Controller
{
    /*public function index(): JsonResponse
    {
      return response()->json(
            User::query()
                ->select('id', 'name', 'email', 'avatar', 'role')
                ->latest()
                ->withCount('posts')
                ->paginate(), 200
        );

    }
    */

    public function users(){
       $users = User::with("posts")->paginate(6);
       return view("users.index", compact("users")); 
    }

    public function edit(Request $request, User $user){
        return view("users.edit", [
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
            return redirect()->route("users.index");
        
        } else{
            return redirect()->route("admin.edit", $user)->with('status', 'profile-updated');
        }
    }
    

    public function delete(Request $request, User $user){
        $user->delete();
        return redirect("/users");
    }
}

