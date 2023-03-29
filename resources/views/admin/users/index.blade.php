<x-app-layout>
    
    <div class="row">
        <div class="col-md-6">
            <h1>Gebruikers</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route("admin.users.create")}}" class="btn btn-primary text-light " role="button">gebruiker toevoegen</a>
        </div> 
    </div>
    <div class="row">
            <div class="col-md-12 card">
                <table class="table  ">
                    <thead>
                    <tr>
                        
                        <th class="py-2 px-3 border-b">Gebruikersnaam</th>
                        <th class="py-2 px-3 border-b">Email</th>
                        <th class="py-2 px-3 border-b">Wachtwoord</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            
                            <td class="py-2 px-3 border-b">{{$user->name}} </td>
                            <td class="py-2 px-3 border-b">{{$user->email}} </td>
                            <td class="py-2 px-3 border-b">{{$user->password}}</td>

                            <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bevestiging</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         Weet u zeker dat u deze gebruiker wilt verwijderen?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("users.delete", $user)}}" method="post">@csrf<button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">toch verwijderen</button></form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-6 d-flex">
                                    <button type="submit" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button>
                                <form action="{{route("admin.users.edit", $user)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>

                                  </div>
                                  
                            </td>
                        @endforeach
                            
                    </tbody>
                   
                </table>
                
            </div>
    
    </div>


    
</x-app-layout>