<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->with("User")->get();
        $roles = Role::latest()->paginate(15);
        
        return view("admin.roles.index", [
            "roles" => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->user_id = Auth::user()->id;

        $role->save();
        return redirect()->route("admin.roles.index")->with("succesmeesage", "rol is gemaakt!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $value)
    {
        return view("admin.roles.edit", [
            "id" => $value->id,
            "name" => $value->name,
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $value)
    {
        $value->name = $request->name;
       
        $value->save();
        
        return redirect()->route("admin.roles.index")->with("message", "rol is succesvol bewerkt");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Role $value)
    {
        
        $value->delete();
        return redirect()->route("admin.roles.index")->with("message", "rol is verwijderd!");
    }
}
