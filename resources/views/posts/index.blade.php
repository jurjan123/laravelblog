<x-guest-layout>
  @if(!empty($message))
  <h1>{{$message}}</h1>

  @else
  <div class="row gy-4 w-100"> <div class="col-10">
    <h1 class="mt-3">Posts</h1>
  </div>
  <div class="col-2 mt-5">
    <select class="form-select " onchange="location = this.value"  aria-label="Default select example" name="category_id">
      <option  selected> sorteer op </option>
      <option value="/posts/sortbyname=ascending" selected> Naam A-Z </option>
      <option value="/posts/sortbyname=descending" selected> Naam Z-A </option>
      <option value="/post/sortbydate=descending" selected> Datum aflopend </option>
  </select>
  </div>
    
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
                  
                  <p class="card-text">Datum: {{date("d/m/Y", strtotime($post->created_at))}} <br> @if(!empty($post->category_id)) Categorie: {{$post->categories->name}}</p> @else @endif <br>
                  <a href="{{route("posts.show", $post->id)}}" class="btn btn-primary">Bekijk post</a>
                </div>
              </div>
        </div>
        @endforeach
        @endif
        
    </div>
    {{$posts->links()}}
   
</x-guest-layout>
