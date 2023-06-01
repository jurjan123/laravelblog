<x-guest-layout>
    <div class="row d-flex">

    
    <div class="col-6">
        @if($product->image != "Monkey-Puppet.png")
          <li class="list-group-item"><a class="nav-link active d-flex " @if(Route::is("products.show")) href="{{route("products.index")}}" @else href="{{url()->previous()}}" @endif><i class="bi bi-arrow-left"></i><p style="margin-left: 5px">Ga terug</p> </a></li>
          <img src="{{url("images/". $product->image)}}" class="float-start" alt="...">
          <br>{!!$product->description!!}
       
          @else
            <li class="list-group-item"><a class="nav-link active d-flex" @if(Route::is("products.show")) href="{{route("products.index")}}" @else href="{{url()->previous()}}"@endif><i class="bi bi-arrow-left"></i><p style="margin-left: 5px">Ga terug</p> </a></li>
            <img src="{{url("images/".$product->image)}}"  alt="...">
            <br>{!!$product->description!!}
          @endif
    </div>

    <div class="col-6 mt-4">
        <div class="h-100  fs-5" >
          
          <div class="card-body lh-md">
              <h2 class="card-title">{{$product->name}}</h2>
              <p class="card-text mt-3"><i class="bi bi-currency-euro"></i>{{$product->price}}</p>
              
              <form class="" action="{{route("cart.add", $product->id)}}" method="post">@csrf
                <label for="formFile" id="user"  class="form-label">Kies Hoeveelheid</label>
              <div class="col-2 mb-3 d-column">
                
              
                <select class="form-select" id="amount" id="user" value="" aria-label="Default select example" name="quantity">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option  value="3" >3</option>
                    <option  value="4" >4</option>
                    <option  value="5" >5</option>
                    <option  value="6" >6</option>
                    <option  value="7" >7</option>
                    <option  value="8" >8</option>
                    <option value="9" >9</option>
                    <option id="more">meer</option>
                </select>
        </div>
            </div>
            
              
              <button type="submit" class="btn btn-primary mt-5">Aan winkelwagen toevoegen</button>
            </form>
              
            </div>
        </div>
      
    </div>
</div>
    <script src="{{url("script.js")}}"></script>
</x-guest-layout>

<!--<div class="form-outline mb-5" >
  <label class="form-label" for="typeNumber">Kies hoeveelheid</label>
  <input type="number" style="width:150px" value="1" min="1" max="50" id="typeNumber" class="form-control" />
</div>-->
