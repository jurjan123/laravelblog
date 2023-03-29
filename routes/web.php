<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

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

Route::get("/posts", function(){
    $posts = Post::latest()->with("User")->get();
    $posts = Post::latest()->paginate(15);
    
    return view("posts.index", [
        "posts" => $posts
    ]);
})->name("posts.index");

Route::get("/projects", function(){
    $projects = Projects::latest()->with("User")->get();
    $projects = Projects::latest()->paginate(15);
    
    return view("projects.index", [
        "projects" => $projects
    ]);
})->name("projects.index");

Route::get("/posts/show/{id}", [PostController::class, "show"])->name("posts.show");
Route::get("/projects/show/{id}", [ProjectController::class, "show"])->name("projects.show");



Route::group(["prefix" => "admin"], function(){


    Route::get("/users", [UserController::class, "users"])->name("users.index");
    Route::get("/users/create", [UserController::class, "create"])->name("admin.users.create");
    Route::post("/users/store", [UserController::class, "store"])->name("admin.users.store");
    Route::match(["get", "post"], "/users/{user}/edit", [UserController::class, "edit"])->name("admin.users.edit");
    Route::put("/users/{user}", [UserController::class, "update"]);
    Route::post("/users/{user}/delete", [UserController::class, "delete"])->name("users.delete");
    Route::get("/show", [UserController::class, "show"]);

    
    Route::get("/", [PostController::class, "adminIndex"])->name("admin.index");

    Route::get("/posts", [PostController::class, "index"])->name("admin.posts.index");
    Route::get("/posts/create", [PostController::class, "create"])->name("admin.posts.create");
    Route::post("/posts/store", [PostController::class, "store"])->name("admin.posts.store");
    Route::match(["post","get"],"/posts/{value}/edit", [PostController::class, "edit"])->name("admin.posts.edit");
    Route::put('/posts/{value}', [Postcontroller::class, 'update']);
    Route::post('/posts/{value}/delete', [PostController::class, 'delete'])->name('admin.posts.delete');
    Route::get("/posts/show/{id}", [PostController::class, "show"]);

    Route::get("/projects", [ProjectController::class, "index"])->name("admin.projects.index");
    Route::get("/projects/create", [ProjectController::class, "create"])->name("admin.projects.create");
    Route::post("/projects/store", [ProjectController::class, "store"])->name("admin.projects.store");
    Route::match(["post", "get"], "/projects/{value}/edit", [ProjectController::class, "edit"])->name("admin.projects.edit");
    Route::put("/projects/{value}", [ProjectController::class, "update"]);
    Route::post('/projects/{value}/delete', [ProjectController::class, 'delete'])->name('admin.projects.delete');
    
    Route::get("/roles", [RoleController::class, "index"])->name("admin.roles.index");
    Route::get("/roles/create", [RoleController::class, "create"])->name("admin.roles.create");
    Route::post("/roles/store", [RoleController::class, "store"])->name("admin.roles.store");
    Route::match(["post", "get"], "/roles/{value}/edit", [RoleController::class, "edit"])->name("admin.roles.edit");
    Route::put("/roles/{id}", [RoleController::class, "update"]);
    Route::post("/roles/{value}/delete", [RoleController::class, "delete"])->name("admin.roles.delete");
    
});
    
    
    
    
Route::view("/practice", "practice");

require __DIR__.'/auth.php';
