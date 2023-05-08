<x-guest-layout>
  {{url()->previous()}}
    <div class="offset-1 col-9">
        <div class="card h-100 w-80" >
          @if($post->image != "Monkey-Puppet.png")
          <img src="{{url("images/". $post->image)}}" class="card-img-top w-50" alt="...">
        @else
        <img src="{{url("images/".$post->image)}}" class="card-img-top w-50" alt="...">
        @endif
            <div class="card-body word-wrap p-4">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->intro}}</p>
              <p class="card-text pr-4 pl-4 ">{{$post->description}}</p>
              <p class="card-text">datum: {{date("d/m/Y", strtotime($post->created_at))}} <br> @if(!empty($post->category_id)) Categorie: {{$post->categories->name}}</p> @else @endif <br>
              
              @if(!url()->previous() == "/categories/show/{{$post->category_id}}")
              <a  href="/categories/show/{{$post->category_id}}" class="btn btn-primary">Ga terug</a>
              @else
              <a  href="{{route("posts.index")}}" class="btn btn-primary">Ga terug</a>
              @endif
            </div>
          </div>
    </div>
    
</x-guest-layout>