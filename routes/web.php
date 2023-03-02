<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ProductsSearch;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\AdminRoutes;
use Illuminate\Support\Facades\Date;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware("guest");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get("/posts/show/{id}", [PostController::class, "show"])->name("posts");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    
    Route::get("/posts", [PostController::class, "index"])->name("posts.index"); 
    Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
    Route::post("/posts/store", [PostController::class, "store"])->name("posts.store");
    Route::post("posts/{value}/edit", [PostController::class, "edit"])->name("posts.edit");
    Route::put('/posts/{value}', [Postcontroller::class, 'update']);
    Route::post('/posts/{value}/delete', [PostController::class, 'delete'])->name('posts.delete');
    


    Route::middleware(AdminRoutes::class)->group(function(){
        Route::get("users", [UserController::class, "users"])->name("users.index");
        Route::match(["get", "post"], "/users/{user}/edit", [UserController::class, "edit"])->name("admin.edit");
        Route::put("/users/{user}", [UserController::class, "update"]);
        Route::post("/users/{user}/delete", [UserController::class, "delete"])->name("admin.delete");
    
    });
    
    //Route::get("/users/create", [UserController::class, "create"])->name("admin.create");
   
   
    Route::get("/projects", [ProjectController::class, "index"])->name("projects");

    Route::get("/show", function(){
        $created = Auth::user()->created_at;
        return $created;
    });
});
    

Route::view("/practice", "practice");

require __DIR__.'/auth.php';
