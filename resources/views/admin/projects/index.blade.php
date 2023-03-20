<x-app-layout>
    <head><link rel="stylesheet" href="styles/style.css"></head>
    <div class="row pt-5 pb-4">
        <div class="col-md-3">
            <h1>Projecten</h1>
            
        </div>
        <div class="col-md-3">
            <ul class="nav  position-absolute " style="font-size:25px">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">Participanten</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Rollen</a>
                </li>
                
            </ul>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route("admin.projects.create")}}" class="btn btn-primary text-light " role="button">Project toevoegen</a>
        </div> 
    </div>
    <div class="row">
        
        <div class="col-md-12">
            <div class="col-md-12 sm-6 card">
                <table class="table ">
                    <thead>
                    <tr>
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">Beschrijving</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $value)
                        <tr>
                            <td class="py-2 px-3 border-b">{{$value->title}} </td>
                            <td class="py-2 px-3 border-b">{{$value->description}}</td>
                            
                            <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bevestiging</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         Weet u zeker dat u dit project wilt verwijderen?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("projects.delete", $value)}}" method="post">@csrf<button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">toch verwijderen</button></form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-6 d-flex">
                                    <button type="submit" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button>
                                <form action="{{route("admin.projects.edit", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>

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