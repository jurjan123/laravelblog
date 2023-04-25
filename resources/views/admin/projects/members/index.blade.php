<x-app-layout>
    
<div class="row">
    <div class="col-md-5  d-column">
        <h1>Project Bewerken</h1>
        <ul class="nav nav-tabs">
            <li><a class="nav-link" href="{{route("admin.projects.edit", $project)}}">Project</a></li>
            <li><a class="nav-link active" href="{{route("admin.projects.members.index", $project)}}">Leden</a></li>
        </ul>
    </div>
    
    <div class="col-4 mt-5">
        <form action="{{route("admin.projects.members.search", $project)}}" method="GET" role="search">
    
            <div class="input-group">
                <a href="{{ route('admin.projects.members.index', $project) }}" class=" ">
                    <span class="input-group-btn">
                        </button>
                    </span>
                </a>
               
                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek gebruiker" id="term">
                <span class="input-group-btn ">
                    <button class="btn btn-info" type="submit" title="Zoek posts">
                        <i class="bi bi-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
        <td class=" d-flex px-3 border-b py-3 gy-5 ">
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Gebruiker toevoegen aan project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("admin.projects.members.store", $project)}}" method="post">@csrf
                    <div class="mb-3 mt-3">
                        <label for="formFile"  class="form-label">Kies gebruikers</label>
                       
                        <select class="form-select" aria-label="Default select example" name="user_id">
                        <option selected>Kies gebruiker</option>
                          @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                        </select>
                        @error("role_id")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="formFile" class="form-label">Kies gebruikersrol</label>
                       
                        <select class="form-select" aria-label="Default select example" name="role_id">
                        <option selected>Kies gebruikersrol</option>
                          @foreach($roles as $role)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                        </select>
                        @error("user_id")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                            
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Opslaan</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
            
            <div class="col-3  mt-5 ">
            <button type="submit" class="btn btn-primary offset-3" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Gebruiker toevoegen</button>
            </div>
</div>
    <div class="row">
        <div class="col">

       
        <div class=" card">
            <table class="table  ">
                <thead>
                <tr>
                        
                    <th class="py-2 px-3 border-b">Gebruikersnaam</th>
                    <th class="py-2 px-3 border-b">Rol</th>
                    <th class="py-2 px-3 border-b">opties</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($projectUsers as $user)
                   
                    <tr>
                        <td class="py-2 px-3 border-b">{{$user->name}} </td>
                        
                        @foreach($user->projects as $projectUser)
                        <td class="py-2 px-3 border-b">{{$projectUser->pivot->role->name}}</td>
                        @endforeach
                       
                       

                        <td class=" d-flex px-3 border-b py-3 gy-5 ">
                    
                                    <div class="col-6 d-flex">
                                    <form action="{{route("admin.projects.members.delete", [$project, $user])}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $user->name }} wilt verwijderen?')" ><i class="fa fa-trash"></i></button></form>
    
                                        
                                        
                                       
                                    <a class="nav-link offset-1" href="{{route("admin.projects.members.edit", [$project, $user])}}" method="get">@csrf<button type="submit" role="button"><i class="fa fa-pencil"></i></button></a>
                    
                                    </div>
                                  
    
                        
                        
                                  
                
                                  </div>
                                  
                            </td>
                            @endforeach
                           
                        
                            
                    </tbody>
                   
                </table>
                
            </div>
        </div>
    </div>


    
</x-app-layout>