<x-guest-layout>

   <h1>Posts</h1>
    <div class="row gy-4">
        @foreach($posts as $post)
        <div class="col-4">
            <div class="card h-100">
                <img src="{{url("images/". $post->image)}}" class="card-img-top w-100" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->description}}</p>
                  
                  <p class="card-text">datum: {{substr($post->created_at, 0,10)}} <br>Auteur: {{$post->User->name}}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    {{$posts->links()}}
   
</x-guest-layout>
