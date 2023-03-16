<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\AdminRoutes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Projects;
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
    $posts = Post::latest()->with("User")->get();
    $posts = Post::latest()->paginate(6);
    return view("posts.index", [
        "posts" => $posts
    ]);
    
})->name("posts.index");

Route::get("/projects", function(){
    $projects = Projects::latest()->with("User")->get();
    $projects = Projects::latest()->paginate(6);
    return view("projects.index", [
        "projects" => $projects
    ]);
})->name("projects.index");

    Route::middleware("auth")->group(function(){
    
    Route::get("/admin/users", [UserController::class, "users"])->name("admin.users.index");
    Route::match(["get", "post"], "/admin/users/{user}/edit", [UserController::class, "edit"])->name("admin.users.edit");
    Route::put("/users/{user}", [UserController::class, "update"]);
    Route::post("/users/{user}/delete", [UserController::class, "delete"])->name("admin.users.delete");
    Route::get("/show", [UserController::class, "show"]);

    
    Route::get("/admin/index", [PostController::class, "adminIndex"])->name("admin.index");

    Route::get("/admin/posts", [PostController::class, "index"])->name("admin.posts.index");
    Route::get("/admin/posts/create", [PostController::class, "create"])->name("admin.posts.create");
    Route::post("/posts/store", [PostController::class, "store"])->name("posts.store");
    Route::post("/admin/posts/{value}/edit", [PostController::class, "edit"])->name("admin.posts.edit");
    Route::put('/posts/{value}', [Postcontroller::class, 'update']);
    Route::post('/posts/{value}/delete', [PostController::class, 'delete'])->name('admin.posts.delete');
    Route::get("/admin/posts/show/{id}", [PostController::class, "show"]);

    Route::get("/admin/projects", [ProjectController::class, "index"])->name("admin.projects.index");
    Route::get("/admin/projects/create", [ProjectController::class, "create"])->name("admin.projects.create");
    Route::post("/admin/projects/{value}/edit", [ProjectController::class, "edit"])->name("admin.projects.edit");
    Route::put("/projects/{value}", [ProjectController::class, "update"]);
    Route::post("/admin/projects/store", [ProjectController::class, "store"])->name("projects.store");
    Route::post('/projects/{value}/delete', [ProjectController::class, 'delete'])->name('projects.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
   
Route::view("/practice", "practice");

require __DIR__.'/auth.php';
