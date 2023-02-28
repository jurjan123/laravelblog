<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Hashing\BcryptHasher;

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
       $users = User::latest()->paginate(6);
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
            "name" => "nullable|min:6",
            "email" => "nullable",
            'password' => 'required|confirmed|min:6',
            "password_repeat" => 'required_with:password|same:password|min:6'
            
        ]);

        $user->update($validatedDate);

        return redirect()->route("users.index");
    }
    

    public function delete(Request $request, User $user){
        $user->delete();
        return redirect("/users");
    }
}

