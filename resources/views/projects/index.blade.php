<x-app-layout>
    
    <div class="row pt-5 pb-4">
        <div class="col-md-6">
            <h1>Projects</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route("projects.create")}}" class="btn btn-primary" role="button">create post</a>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 sm-6 card">
                <table class="table ">
                    <thead>
                    <tr >
                        <th class="py-2 px-3 border-b">ID</th>
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">beschrijving</th>
                        <th class="py-2 px-3 border-b">opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $value)
                        <tr>
                            <td class="py-2 px-3 border-b">{{$value->id}} </td>
                            <td class="py-2 px-3 border-b">{{$value->title}} </td>
                            <td class="py-2 px-3 border-b">{{$value->description}}</td>
                           
                            
                            
                            <td class=" d-flex px-3 border-b py-2" style="gap:5px"><form action="{{route("projects.delete", $value)}}" method="post">@csrf<button type="submit" class="btn btn-danger" role="button">delete</button></form>
                                <form action="{{route("projects.edit", $value)}}" method="post">@csrf<button type="submit" class="btn btn-info" role="button">edit</button></form>
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