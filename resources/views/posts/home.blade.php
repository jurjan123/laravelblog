<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight " >
            {{ __('Dashboard') }}
            
        </h2>
    </x-slot>
    <head><link rel="stylesheet" href="{{url("styles/navbar.css")}}"></head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="height:90px;">
                   create a post
                    <form action="/posts/create" method="GET">
                        <button class="btn btn-outline-success" type="submit" id="btn" href="{{route("create")}}">create</button>
                    </form>
                   
                
                
            </div>
            </div>
        </div>
        <div class="postarea">
            <div class="container text-center">
            
            <div class="container text-left">
                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                @foreach($posts as $post)
                <div class="row">
                <div class="col-md-2">title <button type="submit" id="editbutton" href="/posts/edit">edit</button></div>
                <div class="col-6 col-md-4">{{$post["title"]}}</div>
                <br><br>
                <div class="col-md-2">description</div>
                <div class="col-6 col-md-4">{{$post["description"]}} </div>
                <hr>
                
                <br>
                @endforeach
            </div>
              
            
        
        <br>
        <hr>

    </div>
        

        
    </div>

</x-app-layout>










