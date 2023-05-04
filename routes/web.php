<?php

use App\Models\Project;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\http\Controllers\GuestViewController;



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
});

Route::get("/posts", [GuestViewController::class, "PostIndex"])->name("posts.index");
Route::get("/projects", [GuestViewController::class, "ProjectIndex"])->name("projects.index");
Route::get("/categories", [GuestViewController::class, "CategoryIndex"])->name("categories.index");

Route::get("/users/projects", [GuestViewController::class, "UserProjectPage"])->name("users.projects.page");
Route::delete("/users/{user}/projects/{project}/delete", [GuestViewController::class, "UserProjectDelete"])->name("users.projects.delete");

Route::get("/posts/show/{id}", [PostController::class, "show"])->name("posts.show");
Route::get("/projects/show/{id}", [ProjectController::class, "show"])->name("projects.show");
Route::get("/categories/show/{id}", [CategoryController::class, "show"])->name("categories.show");


Route::middleware("auth")->group(function(){
    
    Route::group(["prefix" => "admin"], function(){
    
        Route::get("/", [PostController::class, "adminIndex"])->name("admin.index");
    
        Route::group(["prefix" => "categories"], function(){
            Route::get("/", [CategoryController::class, "index"])->name("admin.categories.index");
            Route::get("/search", [CategoryController::class, "search"])->name("admin.categories.search");
            Route::get("/create", [CategoryController::class, "create"])->name("admin.categories.create");
            Route::post("/store", [CategoryController::class, "store"])->name("admin.categories.store");
    
            Route::group(["prefix" => "{value}"], function(){
                Route::match(["post", "get"], "/edit", [CategoryController::class, "edit"])->name("admin.categories.edit");
                Route::put("/", [CategoryController::class, "update"]);
                Route::delete("/delete", [CategoryController::class, "delete"])->name("admin.categories.delete");
            });
           
        });
        
        Route::group(["prefix" => "posts"], function(){
            Route::get("/", [PostController::class, "index"])->name("admin.posts.index");
            Route::get("/search", [PostController::class, "search"])->name("admin.posts.search");
            Route::get("/create", [PostController::class, "create"])->name("admin.posts.create");
            Route::post("/store", [PostController::class, "store"])->name("admin.posts.store");
            Route::get("/show/{id}", [PostController::class, "show"]);
            Route::get('category/{id}', [PostController::class, 'category_search'])->name('category');
            
            Route::group(["prefix" => "{value}"], function(){
                Route::match(["post","get"],"/edit", [PostController::class, "edit"])->name("admin.posts.edit");
                Route::put('/', [Postcontroller::class, 'update']);
                Route::delete('/delete', [PostController::class, 'delete'])->name('admin.posts.delete');
            });
        });
        
        Route::group(["prefix" => "users"], function(){
            Route::get("/", [UserController::class, "users"])->name("users.index");
            Route::get("/search", [UserController::class, "search"])->name("admin.users.search");
            Route::get("/create", [UserController::class, "create"])->name("admin.users.create");
            Route::post("/store", [UserController::class, "store"])->name("admin.users.store");
            Route::get("/show", [UserController::class, "show"]);
            
            Route::group(["prefix" => "{user}"], function(){
                Route::match(["get", "post"], "/edit", [UserController::class, "edit"])->name("admin.users.edit");
                Route::put("/", [UserController::class, "update"]);
                Route::delete("/delete", [UserController::class, "delete"])->name("users.delete");
            });
        });
        
        Route::group(["prefix" => "projects"], function(){
            Route::get("/", [ProjectController::class, "index"])->name("admin.projects.index");
            Route::get("/search", [ProjectController::class, "search"])->name("admin.projects.search");
            Route::get("/create", [ProjectController::class, "create"])->name("admin.projects.create");
            Route::post("/store", [ProjectController::class, "store"])->name("admin.projects.store");
            Route::get('{id}', [ProjectController::class, 'memberProjectSearch'])->name('admin.projects.members.search');
           
            Route::group(["prefix" => "{project}"], function(){
                Route::match(["post", "get"], "/edit", [ProjectController::class, "edit"])->name("admin.projects.edit");
                Route::put("/", [ProjectController::class, "update"])->name("projects.update");
                Route::delete('/delete', [ProjectController::class, 'delete'])->name('admin.projects.delete');
                Route::match(["get", "post"], "/members", [ProjectController::class, "membersIndex"])->name("admin.projects.members.index");
                Route::get("/members/search", [ProjectController::class, "ProjectMemberSearch"])->name("admin.projects.members.search");
                Route::post("/members/store", [ProjectController::class, "storeMemberToGroup"])->name("admin.projects.members.store");
                Route::delete("/members/{user}/delete", [ProjectController::class, "deleteMemberFromGroup"])->name("admin.projects.members.delete");
                Route::get("/members/{user}/edit", [ProjectController::class, "editMemberFromGroup"])->name("admin.projects.members.edit");
                Route::post( "/members/{user}/update", [ProjectController::class, "updateMemberFromGroup"])->name("admin.projects.members.update");
            });
        
        });
        
        Route::group(["prefix" => "roles"], function(){
            Route::get("/", [RoleController::class, "index"])->name("admin.roles.index");
            Route::get("/search", [RoleController::class, "search"])->name("admin.roles.search");
            Route::get("/create", [RoleController::class, "create"])->name("admin.roles.create");
            Route::post("/store", [RoleController::class, "store"])->name("admin.roles.store");
    
            Route::group(["prefix" => "{value}"], function(){
                Route::match(["post", "get"], "/edit", [RoleController::class, "edit"])->name("admin.roles.edit");
                Route::put("/", [RoleController::class, "update"])->name("admin.roles.update");
                Route::delete('/delete', [RoleController::class, 'delete'])->name('admin.roles.delete');
            });
        });
        
        
        Route::group(["prefix" => "tasks"], function(){
            Route::get("/", [TaskController::class, "index"])->name("admin.tasks.index");
            Route::get("/search", [TaskController::class, "search"])->name("admin.tasks.search");
            Route::get("/create", [TaskController::class, "create"])->name("admin.tasks.create");
            Route::post("/store", [TaskController::class, "store"])->name("admin.tasks.store");
            
            Route::group(["prefix" => "{task}"], function(){
                Route::match(["post", "get"], "/edit", [TaskController::class, "edit"])->name("admin.tasks.edit");
                Route::put("/", [TaskController::class, "update"]);
                Route::delete("/delete", [TaskController::class, "delete"])->name("admin.tasks.delete");
            });
        });

        Route::group(["prefix" => "statuses"], function(){
            Route::get("/", [StatusController::class, "index"])->name("admin.statuses.index");
            Route::get("/create", [StatusController::class, "create"])->name("admin.statuses.create");
            Route::post("/store", [StatusController::class, "store"])->name("admin.statuses.store");



            Route::group(["prefix" => "{status}"], function(){
                Route::delete("/delete", [StatusController::class, "delete"])->name("admin.statuses.delete");
                Route::match(["post", "get"], "edit", [StatusController::class, "edit"])->name("admin.statuses.edit");
                Route::put("/", [StatusController::class, "update"])->name("admin.statuses.update");
            });
            
        });
    });
});

    
Route::get("/practice", function(){
    return  Project::with("users")->get();
    
});

require __DIR__.'/auth.php';
