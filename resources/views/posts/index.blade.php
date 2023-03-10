<x-app-layout>
    
    <div class="row pt-5 pb-4">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route("posts.create")}}" class="btn btn-primary  text-center" role="button">post toevoegen</a>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 sm-6 card">
                <table class="table ">
                    <thead>
                    <tr >
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">beschrijving</th>
                        <th class="py-2 px-3 border-b">datum</th>
                        <th class="py-2 px-3 border-b">Auteur</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $value)
                        <tr class="mx-auto">
                           
                            <td class="py-2 px-3 border-b">{{$value->title}} </td>
                            <td class="py-2 px-3 border-b">{{$value->description}}</td>
                            <th class="py-2 px-3 border-b">{{$value->created_at}}</th>
                            <td class="py-2 px-3 border-b">{{$value->User->name}}</td>
                            
                            
                            <td class=" d-flex px-3 border-b py-2" >
                                <form action="{{route("posts.delete", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa-solid fa-users-medical" style="width:50px;height:50px;"></i></button></form>
                                <form action="{{route("posts.delete", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa fa-trash" style="width:50px;height:50px;"></i></button></form>
                                <form action="{{route("posts.edit", $value)}}" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" style="width:50px;height:50px;"></i></button></form>
                                
                                
                            </td>
                        </tr>
                   
                    @endforeach
                    
                    </tbody>
                   
                </table>
                {{$posts->links()}}
                

                
            </div>
        </div>
    </div>
    
</x-app-layout>










