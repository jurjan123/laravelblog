<x-app-layout>
    
    <div class="row">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Gebruikers</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="{{ route('admin.users.search') }}" method="GET" role="search">
        
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
        <div class="col-md-6 text-right">
            <a href="{{route("admin.users.create")}}" class="btn btn-primary text-light " role="button">Gebruiker toevoegen</a>
        </div> 
    </div>
    <div class="row">
        <div class="col">

        
            <div class=" card">
                <table class="table  ">
                    <thead>
                    <tr>
                        
                        <th class="py-2 px-3 border-b">Gebruikersnaam</th>
                        <th class="py-2 px-3 border-b">Email</th>
                        <th class="py-2 px-3 border-b">Rol</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            
                            <td class="py-2 px-3 border-b">{{$user->name}} </td>
                            <td class="py-2 px-3 border-b">{{$user->email}} </td>
                            <td class="py-2 px-3 border-b">{{$user->is_admin}}</td>

                            <td class=" d-flex px-3 border-b py-3 gy-5 ">
                               
                                  <div class="col-6 d-flex">
                                    <form action="{{route("users.delete", $user)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $user->name }} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>
                                    <form action="{{route("admin.users.edit", $user)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>
                                  </div>
                                  
                            </td>
                        @endforeach
                            
                    </tbody>
                   
                </table>
                
            </div>
        </div>
    </div>


    
</x-app-layout>