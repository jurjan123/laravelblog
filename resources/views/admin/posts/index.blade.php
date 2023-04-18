<x-app-layout>
    
    <div class="row ">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Posts</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="{{ route('admin.posts.search') }}" method="GET" role="search">
        
                            <div class="input-group">
                                <a href="{{ route('admin.posts.index') }}" class=" ">
                                    <span class="input-group-btn">
                                        </button>
                                    </span>
                                </a>
                               
                                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek post" id="term">
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
            <a href="{{route("admin.posts.create")}}" class="btn btn-primary text-light  text-center" role="button">Post toevoegen</a>
        </div> 
    </div>
    <div class="row">
        <div class="col-12">
           
            <div class="card ">
                <table class="table ">
                    <thead>
                    <tr >
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">Datum</th>
                        <th class="py-2 px-3 border-b">Categorie</th>
                        
                        <th class="py-2 px-3 border-b">Opties</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($posts as $post)
                        <tr class="mx-auto " >
                           
                            <td class="py-2 px-3 border-b">{{$post->title}} </td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($post->created_at))}}</th>
                            <td class="py-2 px-3 border-b">@if(!empty($post->category_id)) {{$post->categories->name}} @else @endif </td>

                                <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                      <div class="col-6 d-flex">
                                        <form action="{{route("admin.posts.delete", $post)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $post->title }} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>
                                    <form action="{{route("admin.posts.edit", $post)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>
    
                                      </div>
                                      
                                </td>
                                    
                        </tr>
                        
                    @endforeach
                    
                    </tbody>
                   
                </table>
                {{$posts->links()}}
               
        </div>
    </div>
    
</x-app-layout>










