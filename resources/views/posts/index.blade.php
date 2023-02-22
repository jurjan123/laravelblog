<x-app-layout>
    
    <div class="row pt-5 pb-4">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-4 text-center">
            <button type="button" class="btn btn-primary" href="{{route("create")}}">Nieuwe post</button>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class="">Title</th>
                        <th class="">Description</th>
                        <th>Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td class="py-2 px-3 border-b">{{$post->id}} </td>
                            <td class="py-2 px-3 border-b">{{$post->title}} </td>
                            <td class="py-2 px-3 border-b">{{$post->description}}</td>
                            
                            
                        
                            <td ><form action="{{route("delete")}}" method="post">@method("delete")@csrf 
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <button id="deletebutton" >delete</button>
                                
                            
                            </form>
                                <button id="editbutton" onclick="{{route("edit")}}" onchange="event.Preventdefault()">edit 
                            </td>
                               
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</x-app-layout>










