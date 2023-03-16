<x-app-layout>
    
    <div class="row pt-5 pb-4">
        <div class="col-md-6">
            <h1>Posts</h1>
           
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route("admin.posts.create")}}" class="btn btn-primary text-light  text-center" role="button">Post toevoegen</a>
        </div> 
    </div>
    <div class="row">
        @include("includes.messages")
        <div class="col-md-12">
           
            <div class="col-md-12 sm-6 card">
                <table class="table ">
                    <thead>
                    <tr >
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">Beschrijving</th>
                        <th class="py-2 px-3 border-b">Datum</th>
                        <th class="py-2 px-3 border-b">Auteur</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $value)
                        <tr class="mx-auto " >
                           
                            <td class="py-2 px-3 border-b">{{$value->title}} </td>
                            <td class="py-2 px-3 border-b" style="white-space:nowrap;" >{{$value->description}}</td>
                            <th class="py-2 px-3 border-b">{{substr($value->created_at, 0,10)}}</th>
                            <th class="py-2 px-3 border-b">{{$value->User->name}}</th>

                            <td class=" d-flex px-3 border-b py-1" >
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bevestiging</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         Weet u zeker dat u deze post wilt verwijderen?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route("admin.posts.delete", $value)}}" method="post">@csrf<button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Toch verwijderen</button></form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                 
                                  <button type="submit" role="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash" ></i></button>
                                <form action="{{route("admin.posts.edit", $value)}}" method="post">@csrf<button class="" type="submit" role="button"><i class="fa fa-pencil" style="width:50px;height:50px;"></i></button></form>
                            </td>
                        </tr>
                        
                    @endforeach
                    
                    </tbody>
                   
                </table>
                {{$posts->links()}}
               
        </div>
    </div>
    
</x-app-layout>










