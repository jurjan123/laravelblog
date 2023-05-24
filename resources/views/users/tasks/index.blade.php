<x-user-layout>
   
    <div class="row  ">
    
        <div class="col">
            <div class="row">
                    <div class="col-md-6 d-flex justify-content-between">
                        <h1 >Je taken</h1>
                        <form action="{{ route('users.projects.search') }}" method="GET" role="search">
            
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
                    </div>
            </div>
            <div class=" card">
                <table class="table ">
                    <thead>
                    <tr>
                        <th class="py-2 px-3 border-b">Naam</th>
                        <!--<th class="py-2 px-3 border-b">Rol</th>-->
                        <th class="py-2 px-3 border-b">Datum</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                       
                        <tr>

                            @foreach($tasks as $task)
                            <td class="py-2 px-3 border-b">{{$task->name}}</td>
                            <td class="py-2 px-3 border-b">{{$task->created_at}}</td>
                            <!--<td class="py-2 px-3 border-b"></td>-->
                                
                                
                                  
                                       
                                    
                                      
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
    </div>   
</x-user-layout>