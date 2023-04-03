<x-guest-layout>
  @if(!$posts)
    <div class="container-fluid text-center"></div>
    <h1>hier is niks te zien</h1>
    @else
   <h1>Posts</h1>
    <div class="row gy-4">
        @foreach($posts as $post)
        <div class="col-4">
            <div class="card h-100">
              @if($post->image != "Monkey-Puppet.png")
                <img src="{{url("images/".$post->image)}}" class="card-img-top w-100" alt="...">
              @else
              <img src="{{url("images/".$post->image)}}" class="card-img-top w-100" alt="...">
              @endif
                
              <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->intro}}</p>
                  
                  <p class="card-text">Datum: {{date("d/m/Y", strtotime($post->created_at))}}</p>
                  <a href="{{route("posts.show", $post->id)}}" class="btn btn-primary">Bekijk post</a>
                </div>
              </div>
        </div>
        @endforeach
        @endif
    </div>
    {{$posts->links()}}
   
</x-guest-layout>
