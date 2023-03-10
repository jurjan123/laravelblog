<x-app-layout>
    <head><link rel="stylesheet" href="styles/style.css"></head>
    <div class="row pt-5 pb-4">
        <div class="col-md-6">
            <h1>Projecten</h1>
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
                            <td class=" d-flex px-3 border-b py-2">
                                <form action="{{route("projects.delete", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa-solid fa-users-medical" style="width:50px;height:50px;"></i></button></form>
                                <form action="{{route("projects.delete", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa fa-trash" style="width:50px;height:50px;"></i></button></form>
                                <form action="{{route("projects.edit", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" style="width:50px;height:50px;"></i></button></form>
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