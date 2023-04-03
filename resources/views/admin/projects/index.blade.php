<x-app-layout>
    
    <div class="row  ">
        <div class="col-md-6 justify-content-around d-flex">
            <h1>Projecten</h1>
            <ul class="nav ">
                <li class="nav-item">
                  <a class="nav-link text-black active fs-4" aria-current="page" href="#">Rollen</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-black fs-4" href="#">Leden</a>
                </li>
                
              </ul>
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
                        <th class="py-2 px-3 border-b">Auteur</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $value)
                        <tr>
                            <td class="py-2 px-3 border-b">{{$value->title}} </td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($value->created_at))}}</td>
                            <td class="py-2 px-3 border-b"></td>
                            <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bevestiging</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         Weet je zeker dat je dit project wilt verwijderen?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("admin.projects.delete", $value)}}" method="post">@csrf<button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">toch verwijderen</button></form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-6 d-flex">
                                    <button type="submit" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button>
                                <form action="{{route("admin.projects.edit", $value)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>

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