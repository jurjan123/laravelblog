
@if(session()->has("message"))
<div class="container-fluid text-center">

    <!-- Success Alert -->
    <div class="alert alert-success fade show">
        <strong>{{session()->get("message")}}</strong>
        <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
    </div>
</div>
    @endif

    <div class="container-fluid text-center">
    
        @if($errors->any())
        @if(Route::is("admin.posts.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Post niet kunnen bewerken</strong>
            
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        
        @elseif(Route::is("admin.projects.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Project niet kunnen bewerken</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.posts.create"))
        <div class="alert alert-danger fade show ">
            <strong>Post niet kunnen maken</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.projects.create"))
        <div class="alert alert-danger fade show ">
            <strong>Project niet kunnen maken</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.users.create"))
        <div class="alert alert-danger fade show ">
            <strong>Gebruiker niet kunnen maken</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.users.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Gebruiker niet kunnen bewerken</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.roles.edit"))
        <div class="alert alert-danger fade show ">
            <strong>rol niet kunnen bewerken</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.tasks.create"))
        <div class="alert alert-danger fade show ">
            <strong>Post niet kunnen bewerken</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        
        @elseif(Route::is("admin.project.members.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Post niet kunnen bewerken</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        
       
        @endif
        @endif
    </div>
    




