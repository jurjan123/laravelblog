<x-app-layout>
    
    <div class="row  ">
        <div class="col-md-6 d-flex justify-content-between">
            <h1 >Projecten</h1>
            <form action="{{ route('admin.projects.search') }}" method="GET" role="search">

                <div class="input-group  ">
                    <a href="{{ route('admin.posts.index') }}" class=" ">
                        <span class="input-group-btn">
                            </button>
                        </span>
                    </a>
                   
                    <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek project" id="term">
                    <span class="input-group-btn ">
                        <button class="btn btn-info" type="submit" title="Zoek project">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        
      <div class="col-md-4">
            
        
               
                <select class="form-select" onchange="location = this.value" name="category"  aria-label="Default select example" name="category_id">
                    <option value="/admin/posts" selected> zoek een gebruiker  </option>
                    @foreach($users as $user)
                    <option value="/admin/projects/{{ $user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
      </div>
                <div class="col-2 ">
                    <a href="{{route("admin.projects.create")}}" class="btn btn-primary text-light text-left " role="button">Project toevoegen</a>
                </div>
                
                       
                  
                    
        
    </div>
    <div class="row">
        
        
        <div class="col">
            <div class=" card">
                <table class="table ">
                    @if(url()->current() == route("admin.projects.index") || Route::is("admin.projects.search"))
                    <thead>
                       
                    <tr>
                        <th class="py-2 px-3 border-b">Titel</th>
        
                        <th class="py-2 px-3 border-b">Datum</th>
                       
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($projects as $project)
                        <tr>
                            <td class="py-2 px-3 border-b">{{$project->title}} </td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($project->created_at))}}</td>
                            
                            <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                
                                  <div class="col-6 d-flex">
                                <form action="{{route("admin.projects.delete", $project)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $project->title }} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>
                                <form action="{{route("admin.projects.edit", $project)}}" class="offset-1" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>

                                  </div>
                                  
                            </td>

                        </tr>
                       @endforeach
                    </tbody>


                    @else

                    <thead>
                       <tr>
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">Lid</th>
                        <th class="py-2 px-3 border-b">Rol</th>
                        <th class="py-2 px-3 border-b">Datum</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                        </tr>
                        </thead>

                       @foreach($projectUsers as $user)
                        @foreach($user->projects as $projectUser)
                        <td class="py-2 px-3 border-b">{{$projectUser->title}}</td>
                        <td class="py-2 px-3 border-b">{{$user->name}}</td>
                        <td class="py-2 px-3 border-b">{{$projectUser->pivot->role->name}}</td>
                        <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($projectUser->created_at))}}</td>
                        <td class=" d-flex px-3 border-b py-3 gy-5 ">
                            <div class="col-6 d-flex">
                                <form action="" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $user->name }} wilt verwijderen?')" ><i class="fa fa-trash"></i></button></form>
                                <a class="nav-link offset-1" href="" method="get">@csrf<button type="submit" role="button"><i class="fa fa-pencil"></i></button></a>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach  
                    @endforeach
                    @endif

                    </tbody>
                    
                   
                </table>
                {{$projects->links()}}
                
            
            </div>
        </div>
    </div>
    
</x-app-layout>