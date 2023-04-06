<x-app-layout>
    
    <div class="row">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Gebruikers</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="" method="GET" role="search">
        
                            <div class="input-group">
                                <a href="{{ route('users.index') }}" class=" ">
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
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
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
                        <label for="formFile"  class="form-label">Kies gebruiker</label>
                       
                        <select class="form-select" aria-label="Default select example" name="user_id">
                        <option selected></option>
                          @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                        </select>
                    </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Opslaan</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-6 d-flex offset-7">
                    
            <button type="submit" class="btn btn-primary text-light " role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Gebruiker toevoegen</button>
        </div> 
    </div>
    <div class="row">
        <div class="col">

        
            <div class=" card">
                <table class="table  ">
                    <thead>
                    <tr>
                        
                        <th class="py-2 px-3 border-b">Gebruikersnaam</th>
                        <th class="py-2 px-3 border-b">Gebruikersprojecten</th>
                        <th class="py-2 px-3 border-b">Rol</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        
                 
                        <tr>
                            
                            <td class="py-2 px-3 border-b">{{$member->name}} </td>
                            <td class="py-2 px-3 border-b">{{$user->role_id}}</td>

                            @foreach($projects as $project)
                            <td class="py-2 px-3 border-b">{{$project}}</td>
                            @endforeach
                            <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bevestiging</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         Weet je zeker dat je deze gebruiker wilt verwijderen?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">@csrf<button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">toch verwijderen</button></form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-6 d-flex">
                                    <button type="submit" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button>
                                <form action="" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>

                                  </div>
                                  
                            </td>
                            @endforeach
                        
                            
                    </tbody>
                  
                </table>
                
            </div>
        </div>
    </div>


    
</x-app-layout>