
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
        @if(session("error"))
        <div class="alert alert-danger fade show ">
            
            <strong>er is iets fout gegaan</strong>
            
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        @endif
    
        @if($errors->any() && Route::is("cart.address"))
        <div class="alert alert-danger fade show ">
            
            <strong>Er is iets fout gegaan</strong>
            
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        @elseif($errors->hasbag("billing"))
        <div class="alert alert-danger fade show ">
            
            <strong>Er is iets fout gegaan</strong>
            
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        
        @endif
        @if($errors->any())
        @if(Route::is("admin.posts.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Post kon niet bewerkt worden</strong>
            
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        
        @elseif(Route::is("admin.projects.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Project kon niet bewerkt worden</strong>
            <button  type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

        @elseif(Route::is("admin.posts.create"))
        <div class="alert alert-danger fade show ">
            <strong>Post kon niet gemaakt worden</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.projects.create"))
        <div class="alert alert-danger fade show ">
            <strong>Project kon niet gemaakt worden</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.users.create"))
        <div class="alert alert-danger fade show ">
            <strong>Gebruiker kon niet gemaakt worden</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.users.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Gebruiker kon niet bewerkt worden</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.roles.edit"))
        <div class="alert alert-danger fade show ">
            <strong>rol kon niet bewerkt worden</strong>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.tasks.create"))
        <div class="alert alert-danger fade show ">
            <strong>Taak kon niet gemaakt worden</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.tasks.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Taak kon niet bewerkt worden</strong>
           
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>
        
        @elseif(Route::is("admin.project.members.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Taak kon niet bewerkt worden</strong>
            <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.products.edit"))
        <div class="alert alert-danger fade show ">
            <strong>Product kon niet bewerkt worden</strong>
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif(Route::is("admin.products.create"))
        <div class="alert alert-danger fade show ">
            <strong>Product kon niet aangemaakt worden</strong>
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
        </div>

        @elseif($errors->any())
       
        
       
        @endif
        @endif
    </div>
    




