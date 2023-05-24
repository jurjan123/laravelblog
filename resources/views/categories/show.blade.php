<x-guest-layout>
    
   
   
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

        @foreach($products as $product)
        <div class="col-4">
          <div class="card h-100">
            @if($product->image != "Monkey-Puppet.png")
              <img src="{{url("images/".$product->image)}}" class="card-img-top w-100" alt="...">
            @else
            <img src="{{url("images/".$product->image)}}" class="card-img-top w-100" alt="...">
            @endif
              
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->intro}}</p>
                
                <p class="card-text">Datum: {{date("d/m/Y", strtotime($product->created_at))}}</p>
                <div class="d-flex justify-content-between">
                  <a href="{{route("products.show", $product->id)}}" class="btn btn-primary">Bekijk product</a>
                <form action="{{route("cart.add")}}" method="post">@csrf
                  <input type="hidden" name="product" value="{{$product}}">
                  <button type="submit" class="btn btn-warning">+ <i class="bi bi-cart3 fa-lg"></i></button>
                </form>
                </div>
              </div>
            </div>
      </div>

        @endforeach
     
    </div>
    
</x-guest-layout> 
    
    
    
    
    
    
    
    
    
   