<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
   
    public function index()
    {

        $roles = Role::latest()->paginate(15);
        
        return view("admin.roles.index", [
            "roles" => $roles
        ]);
    }

  
    public function create()
    {
        return view("admin.roles.create");
    }

   
    public function store(RoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;

        $succesmessage = "Succes! Rol: ". $request->name. " is gemaakt";
    
        $role->save();
        return redirect()->route("admin.roles.index")->with("message", $succesmessage);
    }

    public function edit(Role $value)
    {
       
        return view("admin.roles.edit", [
            
            "value" => $value
        ]);
    }

    public function update(RoleRequest $request, Role $value)
    {
        $value->name = $request->name;
        $value->update();
        $succesmessage = "Succes! Rol: ". $value->name. " is bewerkt";
        return redirect()->route("admin.roles.index")->with("message", $succesmessage);
    }

    public function delete(Role $value)
    {
        $message = "Succes! rol: ".$value->name. " is verwijderd";
        $value->delete();
        return redirect()->route("admin.roles.index")->with("message", $message);
    }

    public function search(Request $request){
        $roles = Role::where("name", "Like", "%".$request->search_data."%")->paginate(7);
        return view("admin.roles.index", compact("roles"));
    }
}
