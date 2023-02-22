<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Livewire\ProductsSearch;

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

Route::get("/welcome", function(){
    return view("welcome");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get("/posts/show/{id}", [PostController::class, "show"])->name("posts");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get("/posts", [PostController::class, "index"])->name("posts");
    Route::get("/posts/create", [PostController::class, "create"])->name("create");
    Route::post("/posts/store", [PostController::class, "store"])->name("store");
    Route::get("/posts/edit", [PostController::class, "edit"])->name("edit");
    Route::delete('/posts/delete', [App\Http\Controllers\PostController::class, 'delete'])->name('delete');
   
    Route::get("/users", [PostController::class, "index"])->name("users");
    Route::get("/projects", [PostController::class, "index"])->name("projects");

    Route::get("/practice", function(){
        return view("practice");
    });
});
   
   
 


Route::view("/practice", "practice");





require __DIR__.'/auth.php';
