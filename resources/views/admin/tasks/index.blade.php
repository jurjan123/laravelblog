<x-app-layout>
    
    <div class="row ">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Taken</h1>
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
                               
                                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek taak" id="term">
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
            <a href="{{route("admin.tasks.create")}}" class="btn btn-primary text-light  text-center" role="button">Taak toevoegen</a>
        </div> 
    </div>
    <div class="row">
        <div class="col-12">
           
            <div class="card ">
                <table class="table ">
                    <thead>
                    <tr>
                        <th class="py-2 px-3 border-b">naam</th>
                        <th class="py-2 px-3 border-b">beschrijving</th>
                        <th class="py-2 px-3 border-b">Datum</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="mx-auto " >
                           
                            <td class="py-2 px-3 border-b">{{$task->name}}</td>
                            <td class="py-2 px-3 border-b">{{$task->description}}</th>
                            <td class="py-2 px-3 border-b">{{$task->created_at}}</td>

                                <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bevestiging</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                             Weet je zeker dat je deze taak wilt verwijderen?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route("admin.tasks.delete", $task)}}" method="post">@csrf<button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">toch verwijderen</button></form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="col-6 d-flex">
                                        <button type="submit" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button>
                                    <form action="{{route("admin.tasks.edit", $task)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>
    
                                      </div>
                                      
                                </td>
                                    
                        </tr>
                        @endforeach
                   
                    
                    </tbody>
                   
                </table>
                {{$tasks->links()}}
               
               
        </div>
    </div>
    
</x-app-layout>
