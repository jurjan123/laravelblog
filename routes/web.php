<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use League\CommonMark\Extension\Table\Table;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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
    $posts = Post::latest()->paginate(15);
    
    return view("posts.index", [
        "posts" => $posts
    ]);
})->name("posts.index");

Route::get("/projects", function(){
    return $projects = Projects::first()->users()->get();
    $projects = Projects::latest()->paginate(15);
    dd($projects);
    return view("projects.index", [
        "projects" => $projects
    ]);
})->name("projects.index");

Route::get("/categories", function(){
    $categories = Category::latest()->paginate(15);
    
    return view("categories.index", [
        "categories" => $categories
    ]);
})->name("projects.index");


Route::get("/posts/show/{id}", [PostController::class, "show"])->name("posts.show");
Route::get("/projects/show/{id}", [ProjectController::class, "show"])->name("projects.show");
Route::get("/categories/show/{id}", [CategoryController::class, "show"])->name("categories.show");


Route::group(["prefix" => "admin"], function(){
    
    Route::group(["prefix" => "categories"], function(){
        Route::get("/", [CategoryController::class, "index"])->name("admin.categories.index");
        Route::get("/search", [CategoryController::class, "search"])->name("admin.categories.search");
        Route::get("/create", [CategoryController::class, "create"])->name("admin.categories.create");
        Route::post("/store", [CategoryController::class, "store"])->name("admin.categories.store");
        Route::match(["post", "get"], "/{value}/edit", [CategoryController::class, "edit"])->name("admin.categories.edit");
        Route::put("/{value}", [CategoryController::class, "update"]);
        Route::post("/{value}/delete", [CategoryController::class, "delete"])->name("admin.categories.delete");
    });
    
    Route::group(["prefix" => "posts"], function(){
        Route::get("/", [PostController::class, "index"])->name("admin.posts.index");
        Route::get("/search", [PostController::class, "search"])->name("admin.posts.search");
        Route::get("/create", [PostController::class, "create"])->name("admin.posts.create");
        Route::post("/store", [PostController::class, "store"])->name("admin.posts.store");
        Route::match(["post","get"],"/{value}/edit", [PostController::class, "edit"])->name("admin.posts.edit");
        Route::put('/{value}', [Postcontroller::class, 'update']);
        Route::post('/{value}/delete', [PostController::class, 'delete'])->name('admin.posts.delete');
        Route::get("/show/{id}", [PostController::class, "show"]);
    });
    
    Route::group(["prefix" => "users"], function(){
        Route::get("/users", [UserController::class, "users"])->name("users.index");
        Route::get("/search", [UserController::class, "search"])->name("admin.users.search");
        Route::get("/create", [UserController::class, "create"])->name("admin.users.create");
        Route::post("/store", [UserController::class, "store"])->name("admin.users.store");
        Route::match(["get", "post"], "/{user}/edit", [UserController::class, "edit"])->name("admin.users.edit");
        Route::put("/{user}", [UserController::class, "update"]);
        Route::post("/{user}/delete", [UserController::class, "delete"])->name("users.delete");
        Route::get("/show", [UserController::class, "show"]);
    });
    
    Route::get("/", [PostController::class, "adminIndex"])->name("admin.index");

    Route::group(["prefix" => "projects"], function(){
        Route::get("/", [ProjectController::class, "index"])->name("admin.projects.index");
        Route::get("/search", [ProjectController::class, "search"])->name("admin.projects.search");
        Route::get("/create", [ProjectController::class, "create"])->name("admin.projects.create");
        Route::post("/store", [ProjectController::class, "store"])->name("admin.projects.store");
        Route::match(["post", "get"], "/{project}/edit", [ProjectController::class, "edit"])->name("admin.projects.edit");
        Route::match(["post", "get"], "/{project}/roles", [ProjectController::class, "addRoles"])->name("admin.projects.roles.create");
        Route::get("/{project}/roles", [ProjectController::class, "roleIndex"])->name("index");
        Route::get("/{project}/members", [ProjectController::class, "membersIndex"])->name("admin.projects.members.index");
        Route::post("/{project}/members/store", [ProjectController::class, "storeMemberToGroup"])->name("admin.projects.members.store");
        Route::put("/{project}", [ProjectController::class, "update"]);
        Route::post('/{project}/delete', [ProjectController::class, 'delete'])->name('admin.projects.delete');

        Route::group(["prefix" => "{project}"], function(){

        });
    
    });
    
    Route::group(["prefix" => "roles"], function(){
        Route::get("/", [RoleController::class, "index"])->name("admin.roles.index");
        Route::get("/search", [RoleController::class, "search"])->name("admin.roles.search");
        Route::get("/create", [RoleController::class, "create"])->name("admin.roles.create");
        Route::post("/store", [RoleController::class, "store"])->name("admin.roles.store");
        Route::match(["post", "get"], "/{value}/edit", [RoleController::class, "edit"])->name("admin.roles.edit");
        Route::put("/{id}", [RoleController::class, "update"]);
        Route::post("/{value}/delete", [RoleController::class, "delete"])->name("admin.roles.delete");
    });
    
    
    Route::group(["prefix" => "tasks"], function(){
        Route::get("/", [TaskController::class, "index"])->name("admin.tasks.index");
        Route::get("/search", [TaskController::class, "search"])->name("admin.tasks.search");
        Route::get("/create", [TaskController::class, "create"])->name("admin.tasks.create");
        Route::post("/store", [TaskController::class, "store"])->name("admin.tasks.store");
        Route::match(["post", "get"], "/{task}/edit", [TaskController::class, "edit"])->name("admin.tasks.edit");
        Route::put("/{task}", [TaskController::class, "update"]);
        Route::post("/{task}/delete", [TaskController::class, "delete"])->name("admin.tasks.delete");
    });
    

});
    
    
    
    
Route::get("/practice", function(){
    return  Projects::with("users")->get();
    
});

require __DIR__.'/auth.php';
