<x-guest-layout>
    <div class="offset-1 col-8">
        <div class="card h-100 w-80" >
          @if($post->image != "Monkey-Puppet.png")
          <img src="{{url("images/".$post->User->id. "/". $post->image)}}" class="card-img-top w-50" alt="...">
        @else
        <img src="{{url("images/".$post->image)}}" class="card-img-top w-50" alt="...">
        @endif
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->intro}}</p>
              <p class="card-text">{{$post->description}}</p>
              <p class="card-text">datum: {{substr($post->created_at, 0,10)}} <br>Auteur: {{$post->User->name}}</p>
              <a href="{{route("posts.index")}}"  class="btn btn-primary">ga terug</a>
            </div>
          </div>
    </div>
    
</x-guest-layout>