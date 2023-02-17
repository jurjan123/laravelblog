<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

    public function index(){
        $user = User::all();
        return $user->name;
    }
}
