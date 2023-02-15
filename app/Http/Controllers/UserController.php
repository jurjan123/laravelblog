<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Seeder;

use hash;
use Session;
use App\Models\User;
use ErrorException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function store(Request $request){
        global $formfields;
        $formfields = $request->validate([
            "voornaam" => ["required", "min:3"],
            "achternaam" => ["required", "min:3"],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'wachtwoord' => 'required|confirmed|min:6',
            "wachtwoord_confirmation" => 'required_with:wachtwoord|same:wachtwoord|min:6'
        ]);
        
        $formfields["wachtwoord"] = bcrypt($formfields["wachtwoord"]);
    
        try{
        $user = User::create($formfields);
        } catch(ErrorException $e){
            echo $e->getMessage();
            echo $e->getFile();
        }
        auth()->login($user);

        return redirect("/")->with("message", "user created and logged in");

    }
    
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with("you are logged out");

    }


    public function create(){
        return view("login");
    }

    public function customLogin(Request $request){
       
        $formfields = $request->validate([
            "email" => "required",
            "wachtwoord" => "required"
        ]);
        
        if(auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        
    }

};
