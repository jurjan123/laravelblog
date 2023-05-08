<x-guest-layout>
    <div class="row  ">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Je Projecten</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="{{route("admin.tasks.search")}}" method="GET" role="search">
        
                            <div class="input-group">
                                <a href="{{ route('admin.tasks.index') }}" class=" ">
                                    <span class="input-group-btn">
                                        </button>
                                    </span>
                                </a>
                               
                                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek Project" id="term">
                                <span class="input-group-btn ">
                                    <button class="btn btn-info" type="submit" title="Zoek posts">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <td class=" d-flex px-3 border-b py-3 gy-5 ">
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Project toevoegen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("users.projects.store")}}" method="post">@csrf
                    <div class="mb-3 mt-3">
                        <label for="formFile"  class="form-label">Kies Project</label>
                       
                        <select class="form-select" aria-label="Default select example" name="project_id">
                        <option selected>Kies project</option>
                        @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->title}}</option>
                        @endforeach
                        </select>
                        @error("role_id")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                    </div>
                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Opslaan</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>


        <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-primary " role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Project toevoegen</button>
        </div> 
    </div>
    <div class="row">
        
        <div class="col">
            <div class=" card">
                <table class="table ">
                    <thead>
                    <tr>
                        <th class="py-2 px-3 border-b">Naam</th>
                        <th class="py-2 px-3 border-b">Datum</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($userProjects as $user)
                        @foreach($user->projects as $project)
                            <tr class="mx-auto " >
                           
                            <td class="py-2 px-3 border-b">{{$project->title}}</td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($project->created_at))}}</td>
                                <td class=" d-flex px-3 border-b py-3 gy-5 ">

                                
                                      <div class="col-6 d-flex">
                                        <form action="{{route("users.projects.delete", [$user,$project])}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{$project->title}} wilt verwijderen?')"><i class="fa fa-trash"></i></button></form>
                                        <button role="button" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"><i class="fa fa-pencil" ></i></button>
    
                                      </div>
                                      
                            </td>
                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Project bewerken</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route("users.projects.update", [$project, $user])}}" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}">
                                            @method("PUT")
                                    <div class="mb-3 mt-3">
                                        <label for="formFile"  class="form-label">Kies Project</label>
                                       
                                        <select class="form-select" aria-label="Default select example" name="project_id">
                                        <option value="" selected>{{$project->name}}</option>
                                        @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                        @endforeach
                                        </select>
                                        @error("role_id")
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    </div>
                                        <div class="modal-footer">
                                            <button type="submit"  class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Opslaan</button>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                    
                        </tr>
                        @endforeach
                        @endforeach
                  
                    
                    </tbody>
                    
                   
                </table>
                
            </div>
        </div>
    </div>   
</x-guest-layout>