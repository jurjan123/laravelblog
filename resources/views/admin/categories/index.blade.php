<x-app-layout>
    <div class="row ">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Categorieen</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="{{ route('admin.categories.search') }}" method="GET" role="search">
        
                            <div class="input-group">
                                <a href="{{ route('admin.categories.index') }}" class=" ">
                                    <span class="input-group-btn">
                                        </button>
                                    </span>
                                </a>
                               
                                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek categorie" id="term">
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
            <a href="{{route("admin.categories.create")}}" class="btn btn-primary text-light " role="button">Categorie toevoegen</a>
        </div> 
    </div>
    <div class="row">
        
        <div class="col">
            <div class=" card">
                <table class="table ">
                    <thead>
                    <tr>
                        <th class="py-2 px-3 border-b">Naam</th>
                        <th class="py-2 px-3 border-b">Korte beschrijving</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($categories as $value)
                            <tr class="mx-auto " >
                            
                            <td class="py-2 px-3 border-b">{{$value->name}} </td>
                            <td class="py-2 px-3 border-b">{{$value->tag}} </td>

                                <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                      <div class="col-6 d-flex">
                                      <form action="{{route("admin.categories.delete", $value)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $value->name }} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>
                                      <form action="{{route("admin.categories.edit", $value)}}" class="offset-1" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>
    
                                      </div>
                                      
                                </td>
                                    
                        </tr>
                        
                    @endforeach
                    
                    </tbody>
                    
                   
                </table>
                <div class="p-2">
                    {{$categories->links()}}
                
                </div>
               
            </div>
        </div>
    </div>   
</x-app-layout>