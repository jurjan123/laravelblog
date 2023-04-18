<x-app-layout>
    
    <div class="row  ">
        <div class="col-md-6  d-flex">
            <h1 >Projecten</h1>
            
        </div>
        
      <div class="col-md-6 ">
        <div class="">
            <div class="col d-flex">
                <form action="{{ route('admin.projects.search') }}" method="GET" role="search">

                    <div class="input-group">
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
                
                        <a href="{{route("admin.projects.create")}}" class="btn btn-primary text-light text-left offset-2" role="button">Project toevoegen</a>
                  
                    
                </div>
            
        </div> 
    </div>
    <div class="row">
        
        <div class="col">
            <div class=" card">
                <table class="table ">
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
                                <form action="{{route("admin.projects.edit", $project)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>

                                  </div>
                                  
                            </td>
                                
                        </tr>
                        
                    @endforeach
                    
                    </tbody>
                    
                   
                </table>
                {{$projects->links()}}
            </div>
        </div>
    </div>
    
</x-app-layout>