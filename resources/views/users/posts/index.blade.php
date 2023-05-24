<x-user-layout>
   
    
    
        
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between">
            <h1>Je posts</h1>
            <form action="" method="GET" role="search">

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

            <div class="g-0">
                <a href="{{route("users.posts.create")}}" class="btn btn-primary text-light  text-center" role="button">Post toevoegen</a>
            </div>

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
                        @foreach($posts as $post)
                        
                        <tr>
                            
                            <td class="py-2 px-3 border-b">{{$post->title}}</td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($post->created_at))}}</td>
                                <td class=" d-flex px-3 border-b py-3 gy-5 ">

                                
                                <form action="{{route("users.posts.delete", $post)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $post->title }} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>  
                                <form action="{{route("users.posts.edit", $post)}}" method="post">@csrf<button role="button"><i class="fa fa-pencil" ></i></button></form>
                                    
                                      
                            </td>
                        </tr>
            </div>
        </div>
    </div>
                                    
                       
                        
                 
                    @endforeach
                    </tbody>
                    
                   
                </table>
                
            </div>
        </div>
     
</x-user-layout>