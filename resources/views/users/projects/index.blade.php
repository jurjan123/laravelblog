
<x-user-layout>
   
    <div class="row  ">
    
        <div class="col">
            <div class="row">
                    <div class="col-md-6 d-flex justify-content-between">
                        <h1 >Projecten</h1>
                        <form action="{{ route('users.projects.search') }}" method="GET" role="search">
            
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
            </div>
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
                        <tr>
                           
                            <td class="py-2 px-3 border-b">{{$project->title}}</td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($project->created_at))}}</td>
                                <td class=" d-flex px-3 border-b py-3 gy-5 ">

                                
                                  
                                        <form action="{{route("users.projects.edit", $project)}}" method="post">@csrf<button role="button"><i class="fa fa-pencil" ></i></button></form>
                                    
                                      
                            </td>
                        </tr>
            </div>
        </div>
    </div>
                                    
                       
                        @endforeach
                        @endforeach
                  
                    
                    </tbody>
                    
                   
                </table>
                
            </div>
        </div>
    </div>   
</x-user-layout>