<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
   
    public function index()
    {
        $statuses = Status::latest()->paginate(15);
        return view("admin.statuses.index", [
            "statuses" => $statuses
        ]);
    }

    public function create()
    {
        return view("admin.statuses.create");
    }

    public function store(StatusRequest $request)
    {
        $status = new Status;
        $status->name = $request->name;

        $succesmessage = "Succes! Status: ". $request->name. " is gemaakt";
    
        $status->save();
        return redirect()->route("admin.statuses.index")->with("message", $succesmessage);
    }


    public function show(Status $status)
    {
        //
    }

    public function edit(Status $status)
    {
        return view("admin.statuses.edit", [
            "status" => $status
        ]);
    }

    
    public function update(StatusRequest $request, Status $status)
    {
        $status->name = $request->name;
        $status->update();
        $succesmessage = "Succes! Rol: ". $status->name. " is bewerkt";
        return redirect()->route("admin.statuses.index")->with("message", $succesmessage);
    }


    public function delete(Request $request, Status $status)
    {
        $succesmessage = "Succes! Status: ". $status->name. " is verwijderd";
        $status->delete();
        return redirect()->route("admin.statuses.index")->with("message", $succesmessage);
    }
}
