<x-app-layout>
    
    <div class="row  ">
        <div class="col-md-6">
            <h1>Projecten</h1>
            
        </div>
       
        <div class="col-md-6 text-right">
            <a href="{{route("admin.projects.create")}}" class="btn btn-primary text-light " role="button">Project toevoegen</a>
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
                            <td class="py-2 px-3 border-b">{{$value->User->name}}</td>
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