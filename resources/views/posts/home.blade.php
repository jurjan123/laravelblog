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
                
                  
                    <form action="/posts/create" method="GET">
                        <button class="btn btn-outline-success" type="submit" id="btn" href="{{route("create")}}">create post</button>
                    </form>
            </div>

            
        </div>

        <div id="sidebar" class="align-middle"> 
            <div id="posts" class="text-center">posts</div>
            <div id="projects">projects</div>
            <div id="users">users</div>
        
        </div>
        
        @php
         if($_SERVER["REQUEST_URI"] === "/posts/projects"){
             echo "<div>";
             echo "<button id='savebutton'>save</button>";
             echo "<button id='cancelbutton'>cancel</button>";
             echo "</div>";
            }
        @endphp

        @php
          if($_SERVER["REQUEST_URI"] === "/posts/users"){
              echo "<div>";
              echo "<button id='savebutton'>save</button>";
              echo "<button id='cancelbutton'>cancel</button>";
              echo "</div>";
          }
        @endphp
        
        <div class="postarea">
          <div class="container mx-auto py-16 px-8">
            <div class="mb-4">
                <input type="text" wire:model.lazy="search" placeholder="Search for Products">
            </div>
            <table class="table-auto w-full text-center">
                <thead>
                <tr>
                    <th class="py-2 px-3 bg-gray-100 border-b-2 text-center">ID</th>
                    <th class="py-2 px-3 bg-gray-100 border-b-2 text-center">Title</th>
                    <th class="py-2 px-3 bg-gray-100 border-b-2 text-center">description</th>
                    <th class="py-2 px-3 bg-gray-100 border-b-2 text-center">description</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="py-2 px-3 border-b">{{$post->id}} </td>
                        <td class="py-2 px-3 border-b">{{$post->title}} </td>
                        <td class="py-2 px-3 border-b">{{$post->description}}</td>
                        <td > <button id="editbutton">edit</button> <button id="deletebutton">delete</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            
        

        
        </div>
      
          
          
           
             
            
        </div>
        
         
        
        <br>
        <hr>

    </div>
        
    
        
    </div>
    
</x-app-layout>










