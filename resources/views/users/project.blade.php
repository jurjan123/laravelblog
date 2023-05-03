<x-guest-layout>
    <div class="row mt-3 ">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Je projecten</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="" method="GET" role="search">
        
                            <div class="input-group">
                                <a href="" class=" ">
                                    <span class="input-group-btn">
                                        </button>
                                    </span>
                                </a>
                               
                                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek project" id="term">
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
            <a href="" class="btn btn-primary text-light " role="button">Project toevoegen</a>
        </div> 
    </div>
    <div class="row">
        
        <div class="col">
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
                        @foreach($user->projects as $project)
                            <tr class="mx-auto " >
                           
                            <td class="py-2 px-3 border-b">{{$project->title}}</td>
                            <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($project->created_at))}}</td>
                                <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                
                                      <div class="col-6 d-flex">
                                        <form action="" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je  wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>
                                        <form action="" class="offset-1" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>
    
                                      </div>
                                      
                                </td>
                                    
                        </tr>
                        @endforeach
                        
                  
                    
                    </tbody>
                    
                   
                </table>
                
            </div>
        </div>
    </div>   
</x-guest-layout>