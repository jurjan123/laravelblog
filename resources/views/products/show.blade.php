<x-guest-layout>
    <div class="row d-flex">

    
    <div class="col-6">
        @if($product->image != "Monkey-Puppet.png")
          <li class="list-group-item"><a class="nav-link active d-flex " @if(Route::is("products.show")) href="{{route("products.index")}}" @else href="{{url()->previous()}}" @endif><i class="bi bi-arrow-left"></i><p style="margin-left: 5px">Ga terug</p> </a></li>
          <img src="{{url("images/". $product->image)}}" alt="...">
          <br>{!!$product->description!!}
       
          @else
            <li class="list-group-item"><a class="nav-link active d-flex" @if(Route::is("products.show")) href="{{route("products.index")}}" @else href="{{url()->previous()}}"@endif><i class="bi bi-arrow-left"></i><p style="margin-left: 5px">Ga terug</p> </a></li>
            <img src="{{url("images/".$product->image)}}" alt="...">
            <br>{!!$product->description!!}
          @endif
    </div>

    <div class="col-6 mt-4">
        <div class="h-100  fs-5" >
          
          <div class="card-body lh-md">
              <h2 class="card-title">{{$product->name}}</h2>
              <p class="card-text mt-3"><i class="bi bi-currency-euro"></i>{{$product->price}}</p>
              <div class="form-outline mb-5" >
                <label class="form-label" for="typeNumber">Kies hoeveelheid</label>
                <input type="number" style="width:150px" value="1" min="1" max="50" id="typeNumber" class="form-control" />
              </div>
            
            </div>
            <form action="{{route("cart.add")}}" method="post">@csrf
              <input type="hidden" name="product" value="{{$product}}">
              <button type="submit" class="btn btn-primary">Aan winkelwagen toevoegen</button>
            </form>
              
            </div>
        </div>
      
    </div>
</div>
    
</x-guest-layout>